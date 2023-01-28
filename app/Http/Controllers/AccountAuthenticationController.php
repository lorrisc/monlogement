<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'email.regex' => 'L\'adresse e-mail n\'est pas valide',
            'password.required' => 'Le mot de passe est obligatoire',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $account = Account::where('email', $request->email)->first();

            if ($account) {
                if (Hash::check($request->password, $account->password)) { //compare hash password

                    Auth::login($account); //remember connection

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
            'email.regex' => 'L\'adresse e-mail n\'est pas valide',
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


    public function restore()
    {
    }
}
