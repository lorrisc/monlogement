@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{asset('css/authentication/authentication.css')}}" rel="stylesheet">
<link href="{{asset('css/authentication/authenticationSignup.css')}}" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Création
@endsection

<!-- content -->
@section('pagecontainerid')
connectionPage
@endsection

@section('content')
<section id="signupContainer">
    <form action="{{ route('signupauth') }}" method="post" id="createAccountForm">
        @csrf
        <section id="signupStep1" class="formBoxAuth">
            <h2>Créez un compte</h2>
            <p class="formBoxAuth__explainText">Sauvegardez vos recherches, retrouvez vos favoris. Propriétaire ? Publiez vos annonces.</p>

            <div id="signupContainer__email" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="email">E-mail</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="email" name="email" id="email" class="normalInput">
            </div>

            <div id="signupContainer__firstname" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="firstname">Prénom</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="text" name="firstname" id="firstname" class="normalInput">
            </div>

            <div id="signupContainer__name" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="name">Nom</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="text" name="name" id="name" class="normalInput">
            </div>

            <div class="submitButtonContainer">
                <button type="button" id="signupStep1__button" class="button submitButton blockSubmit">Suivant</button>
            </div>

            <a href="{{ route('signin') }}" class="blackLink noUnderline authBottomLink" >Vous avez déjà un compte ? <span class="blueLink" id="signinRedirection1">Se connecter</span></a>

        </section>

        <section class="formBoxAuth popupDesactivate" id="signupStep2">
            <h2>Définissez votre mot de passe</h2>
            <p class="formBoxAuth__explainText">Choisissez un mot de passe que vous n’utilisez nulle part ailleurs.</p>

            <button type="button" class="returnButton" id="returnToStep1">
                <img src="{{asset('assets/icons/return.svg')}}" alt="icône bouton retour">
                <p>Retour</p>
            </button>

            <div id="signupContainer__password" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="password">Mot de passe</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="password" name="password" id="password" class="normalInput">
            </div>

            <div id="signupContainer__password_regex">
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
                <button type="button" class="button submitButton blockSubmit" id="signupStep2__button">Créer mon compte</button>
            </div>

            <a href="{{ route('signin') }}" class="blackLink noUnderline authBottomLink">Vous avez déjà un compte ? <span class="blueLink" id="signinRedirection2">Se connecter</span></a>

        </section>
    </form>
</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="{{asset('js/authentication/authentication.js')}}"></script>
<script src="{{asset('js/authentication/authenticationSignup.js')}}"></script>
@endsection