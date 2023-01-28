<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Account;
use App\Models\AccountType;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class AccountAuthenticationController extends Controller
{

    public function connection(Request $request)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];

        $messages = [
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.email' => 'L\'adresse e-mail n\'est pas valide',
            'password.required' => 'Le mot de passe est obligatoire',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $account = Account::where('email', $request->email)->first();

            if ($account) {
                if (Hash::check($request->password, $account->password)) { //compare hash password

                    session(['account_id' => $account->id]);
                    session(['account_email' => $account->email]);

                    return redirect()->route('home');
                } else {
                    return redirect()->back()->withErrors(['password' => 'Le mot de passe est incorrect'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['email' => 'L\'adresse e-mail n\'existe pas'])->withInput();
            }
        }
    }


    public function creation(Request $request)
    {
        $rules = [
            'email' => ['required', 'email', Rule::unique('accounts')],
            'firstname' => ['required'],
            'name' => 'required',
            'password' => ['required', 'min:8', 'max:50', 'regex:/[a-z]/',  'regex:/[A-Z]/',  'regex:/[0-9]/'],
        ];

        $messages = [
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.email' => 'L\'adresse e-mail n\'est pas valide',
            'email.unique' => 'L\'adresse e-mail est déjà utilisée',
            'firstname.required' => 'Le prénom est obligatoire',
            'name.required' => 'Le nom est obligatoire',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'password.max' => 'Le mot de passe doit contenir au maximum 50 caractères',
            'password.regex' => 'Le mot de passe doit contenir au moins 1 majuscule, 1 minuscule et 1 chiffre',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            //create account

            $account = new Account();
            $account->account_type_id = AccountType::where('lib_account_type', 'particulier')->first()->id;
            $account->email = $request->email;
            $account->firstname = $request->firstname;
            $account->surname = $request->name;
            $account->password = Hash::make($request->password);
            $account->save();

            return redirect()->route('home');
        }
    }


    // reset password first step
    public function restore(Request $request)
    {
        if (Auth::check()) {
            dd('utilisateur connecté');
        } else {
            dd('utilisateur non connecté');
        }

        $rules = [
            'email' => ['required', 'email', 'exists:accounts,email'],
        ];

        $messages = [
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.email' => 'L\'adresse e-mail n\'est pas valide',
            'email.exists' => 'L\'adresse e-mail n\'existe pas',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            //token
            $token = Str::random(60);

            //token expiration date (1 hour)
            $expiration_date = Carbon::now()->addHour();

            try {
                //set token and expiration date in database
                Account::where('email', $request->email)->update(['reset_password_token' => $token, 'expiration_token_date' => $expiration_date]);

                // send mail
                Mail::to($request->email)->send(new ResetPasswordMail($request->email, $token));

                return redirect()->route('signin')->with(['statusResetPassword' => 'Le lien de réinitialisation de mot de passe a été envoyé avec succès.']);
            } catch (\Exception $e) {
                return redirect()->back()->with(['errorMessage' => "Une erreur s'est produite lors de l'enregistrement du token."]);
            }
        }
    }

    // test token
    public function restoreexecute($email, $token)
    {
        $storedToken = Account::select('reset_password_token', 'expiration_token_date')->where('email', $email)->first();
        if ($storedToken) {
            // token expiration verification
            if (Carbon::now() < $storedToken->expiration_token_date) {
                if ($storedToken->reset_password_token == $token) {
                    // the token are equal
                    // user have access to reset popup
                    return view('authentication.restorepasswordexecute', compact('email', 'token'));
                } else {
                    return redirect()->route('signin')->with(['errorMessage' => 'Le lien est invalide.']);
                }
            } else {
                // the token is expired
                return redirect()->route('signin')->with(['errorMessage' => 'Le lien a expiré.']);
            }
        }
        return redirect()->route('signin')->with(['errorMessage' => 'Le lien est invalide.']);
    }

    // reset password
    public function restoreconfirm(Request $request, $email, $token)
    {
        $rules = [
            'password' => ['required', 'min:8', 'max:50', 'regex:/[a-z]/',  'regex:/[A-Z]/',  'regex:/[0-9]/'],
        ];

        $messages = [
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'password.max' => 'Le mot de passe doit contenir au maximum 50 caractères',
            'password.regex' => 'Le mot de passe doit contenir au moins 1 majuscule, 1 minuscule et 1 chiffre',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // re verify token/email
            $storedToken = Account::select('reset_password_token')->where('email', $email)->first();

            if ($storedToken) {
                if ($storedToken->reset_password_token == $token) {
                    // the token are equal
                    try {
                        //change password account
                        Account::where('email', $email)->update(['password' => Hash::make($request->password)]);
                    } catch (\Exception $e) {
                        return redirect()->back()->withErrors(['errorMessage' => "Une erreur s'est produite lors de l'enregistrement du mot de passe."]);
                    }
                    return redirect()->route('signin')->with(['statusResetPassword' => 'Le mot de passe à été modifié avec succès.']);
                } else {
                    return redirect()->route('signin')->with(['errorMessage' => 'Le lien est invalide.']);
                }
            }
            return redirect()->route('signin')->with(['errorMessage' => 'Le lien est invalide.']);
        }
    }
}
