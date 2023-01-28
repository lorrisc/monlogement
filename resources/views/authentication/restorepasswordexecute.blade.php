@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{asset('css/authentication/authentication.css')}}" rel="stylesheet">
<link href="{{asset('css/authentication/authenticationSignup.css')}}" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Restaurer mot de passe
@endsection

<!-- content -->
@section('pagecontainerid')
connectionPage
@endsection

@section('content')
<section id="restorePasswordContainer">
    <form action="{{route('restoreconfirmauth', ['email' => $email, 'token' => $token])}}" method="post" class="formBoxAuth" id="restorePasswordForm">
        @csrf

        @if(Session::has('statusResetPassword'))
        <div class="successMessage">{{ Session::get('statusResetPassword') }}</div>
        @endif
        <?php
        if ($errors->first('error')) {
            echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('error') . "</p>";
        }
        ?>


        <h2>Réinitialiser votre mot de passe</h2>
        <p class="formBoxAuth__explainText">Choisissez un mot de passe que vous n’utilisez nulle part ailleurs.</p>

        <div id="restoreContainer__password" class="inputContainer">
            <div class="inputContainer__topline">
                <label for="password">Mot de passe</label>
                <p class="additionalText">champ requis</p>
            </div>
            <input type="password" name="password" id="password" class="normalInput <?php if ($errors->first('password')) {
                                                                                        echo 'errorInput';
                                                                                    } ?>" value="{{old('password')}}">
            <?php
            if ($errors->first('password')) {
                echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('password') . "</p>";
            }
            ?>
        </div>

        <div id="restoreContainer__password_regex" class="password_regex_indication">
            <div id="minchar">
                <i class="fa-solid fa-check"></i>
                <p>8 caractères minimum</p>
            </div>
            <div id="chiffre">
                <i class="fa-solid fa-check"></i>
                <p>1 chiffre minimum</p>
            </div>
            <div id="lowercase">
                <i class="fa-solid fa-check"></i>
                <p>1 lettre minuscule minimum</p>
            </div>
            <div id="uppercase">
                <i class="fa-solid fa-check"></i>
                <p>1 lettre majuscule minimum</p>
            </div>
            <div id="maxchar">
                <i class="fa-solid fa-check"></i>
                <p>50 caractères maximum</p>
            </div>
        </div>

        <div class="submitButtonContainer">
            <button type="button" class="button submitButton blockSubmit" id="restorePassword__button">Confirmer</button>
        </div>

    </form>
</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="{{asset('js/authentication/authentication.js')}}"></script>
<script src="{{asset('js/authentication/checkpasswordRestore.js')}}"></script>
@endsection