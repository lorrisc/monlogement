@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{asset('css/authentication/authentication.css')}}" rel="stylesheet">
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
    <form action="{{ route('restoreauth') }}" method="post" class="formBoxAuth
        @if(Session::has('errorMessage'))
            sucessMessageTrue
        @endif
        
        ">
        @csrf

        @if(Session::has('errorMessage'))
        <div class="errorMessage">{{ Session::get('errorMessage') }}</div>
        @endif

        <h2>Mot de passe oublié</h2>
        <p class="formBoxAuth__explainText">Saisir l’adresse e-mail associée à votre compte.</p>

        <div id="restorePasswordContainer__email" class="inputContainer">
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
            if ($errors->first('error')) {
                echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('error') . "</p>";
            }
            ?>
        </div>

        <div class="submitButtonContainer">
            <button type="submit" class="button submitButton">Continuer</button>
        </div>

        <a href="{{ route('signin') }}" class="blackLink noUnderline authBottomLink">Vous souhaitez vous connecter ? <span class="blueLink" id="createaccountlink">Me connecter</span></a>
    </form>
</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="{{asset('js/authentication/authentication.js')}}"></script>
@endsection