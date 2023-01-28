<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountAuthenticationController extends Controller
{
    public function connection()
    {
    }


    public function creation(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'firstname' => ['required'],
            'name' => 'required',
            'password' => ['required', 'min:8', 'max:50', 'regex:/[a-z]/',  'regex:/[A-Z]/',  'regex:/[0-9]/'],
        ];

        $messages = [
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.regex' => 'L\'adresse e-mail n\'est pas valide',
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
            dd('ok');
        }
    }


    public function restore()
    {
    }
}
