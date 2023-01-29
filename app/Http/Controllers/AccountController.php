<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class AccountController extends Controller
{
    public function index()
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            return view('accountdashboard');
        }
    }

    public function logout()
    {
        session()->forget('account_id');
        return redirect()->route('home');
    }


    public function manageaccount()
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            $account_id_decrypt = decrypt(session('account_id'));
            $accountId = $account_id_decrypt['account_id'];

            //get account information
            $account = Account::where('id', $accountId)->first();

            //store account information
            $account_email = $account->email;
            $account_firstname = $account->firstname;
            $account_surname = $account->surname;
            $account_phone = $account->phone;

            return view('manageaccount')->with([
                'account_email' => $account_email,
                'account_firstname' => $account_firstname,
                'account_surname' => $account_surname,
                'account_phone' => $account_phone
            ]);;
        }
    }


    public function editaccountinformation(Request $request)
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            $account_id_decrypt = decrypt(session('account_id'));
            $accountId = $account_id_decrypt['account_id'];


            $rules = [
                'email' => ['required', 'email', Rule::unique('accounts')->ignore($accountId, 'id')],
                'firstname' => ['required'],
                'name' => 'required',
            ];
            $messages = [
                'email.required' => 'L\'adresse e-mail est obligatoire',
                'email.email' => 'L\'adresse e-mail n\'est pas valide',
                'email.unique' => 'L\'adresse e-mail est déjà utilisée',
                'firstname.required' => 'Le prénom est obligatoire',
                'name.required' => 'Le nom est obligatoire',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {

                $account = Account::where('id', $accountId)->first();

                try {
                    Account::where('id', $accountId)->update(['email' => $request->email, 'firstname' => $request->firstname, 'surname' => $request->name, 'phone' => $request->telephone]);
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['errorMessage' => "Une erreur s'est produite lors de la modification de vos informations personnels."])->withInput();
                }

                //remplace email session value
                $new_account_email_crypt = encrypt(['account_email' => $request->email]);
                session(['account_email' => $new_account_email_crypt]);

                return redirect()->back()->with(['statusEditAccount' => 'Vos informations personnels ont été modifié avec succès.']);
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function editpassword(Request $request)
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            $rules = [
                'actualpassword' => ['required'],
                'password' => ['required', 'min:8', 'max:50', 'regex:/[a-z]/',  'regex:/[A-Z]/',  'regex:/[0-9]/'],
            ];

            $messages = [
                'actualpassword.required' => 'Veuillez saisir votre mot de passe actuel',

                'password.required' => 'Le mot de passe est obligatoire',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
                'password.max' => 'Le mot de passe doit contenir au maximum 50 caractères',
                'password.regex' => 'Le mot de passe doit contenir au moins 1 majuscule, 1 minuscule et 1 chiffre',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {

                $account_id_decrypt = decrypt(session('account_id'));
                $accountId = $account_id_decrypt['account_id'];

                $account = Account::where('id', $accountId)->first();


                if (Hash::check($request->actualpassword, $account->password)) { //compare hash password
                    try {
                        Account::where('id', $accountId)->update(['password' => Hash::make($request->password)]);
                    } catch (\Exception $e) {
                        return redirect()->back()->withErrors(['errorMessage' => "Une erreur s'est produite lors de l'enregistrement du mot de passe."]);
                    }
                } else {
                    return redirect()->back()->withErrors(['actualpassword' => 'Le mot de passe actuel est incorrect'])->withInput();
                }

                return redirect()->back()->with(['statusEditPassword' => 'Le mot de passe à été modifié avec succès.']);
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function editcontactpreferences(Request $request)
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            return view('manageaccount');
        }
    }
}
