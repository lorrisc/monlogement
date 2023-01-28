@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{asset('css/authentication/authentication.css')}}" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Connexion
@endsection

<!-- content -->
@section('pagecontainerid')
connectionPage
@endsection

@section('content')
<section id="signinContainer">
    <form action="{{ route('signinauth') }}" method="post" class="formBoxAuth 
        @if(Session::has('statusResetPassword'))
            sucessMessageTrue
        @endif
        @if(Session::has('errorMessage'))
            sucessMessageTrue
        @endif
        ">
        @csrf

        @if(Session::has('statusResetPassword'))
        <div class="successMessage">{{ Session::get('statusResetPassword') }}</div>
        @endif
        @if(Session::has('errorMessage'))
        <div class="errorMessage">{{ Session::get('errorMessage') }}</div>
        @endif

        <h2>Bonjour !</h2>
        <p class="formBoxAuth__explainText">Connectez-vous pour découvrir toutes nos fonctionnalités.</p>


        <div id="signinContainer__email" class="inputContainer">
            <div class="inputContainer__topline">
                <label for="email">E-mail</label>
                <p class="additionalText">champ requis</p>
            </div>
            <input type="email" name="email" id="email" class="normalInput <?php if ($errors->first('email')) {
                                                                                echo 'errorInput';
                                                                            } ?>">
            <?php
            if ($errors->first('email')) {
                echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('email') . "</p>";
            }
            ?>
        </div>

        <div id="signinContainer__password" class="inputContainer">
            <div class="inputContainer__topline">
                <label for="password">Mot de passe</label>
                <p class="additionalText">champ requis</p>
            </div>
            <input type="password" name="password" id="password" class="normalInput <?php if ($errors->first('password')) {
                                                                                        echo 'errorInput';
                                                                                    } ?>">
            <?php
            if ($errors->first('password')) {
                echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('password') . "</p>";
            }
            ?>
            <a href="{{ route('restorepassword') }}" class="blueLink">Mot de passe oublié</a>
        </div>

        <div class="submitButtonContainer">
            <button type="submit" class="button submitButton">Se connecter</button>
        </div>

        <a href="{{ route('signup') }}" class="blackLink noUnderline authBottomLink">Envie de nous rejoindre ? <span class="blueLink" id="createaccountlink">Créer un compte</span></a>
    </form>
</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="{{asset('js/authentication/authentication.js')}}"></script>
@endsection