@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{ asset('css/accountDashboard.css') }}" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Mon compte
@endsection

<!-- content -->
@section('pagecontainerid')
id="accountDashboardPage"
@endsection

@section('content')
<div class="account_title">
    <h2 class="semiBold">Mon compte</h2>

    <?php
    $account_email_decrypt = decrypt(session('account_email'));
    $accountEmail = $account_email_decrypt['account_email'];
    echo '<p>' . $accountEmail . '</p>';
    ?>
</div>
<section id="account__dashboard">
    <div id="account__dashboard__firstline">
        <a href="">
            <img src="{{ asset('assets/icons/heart_premium.png') }}" alt="Icône favoris">
            <div>
                <p class="semiBold">Favoris</p>
                <p class="textButton">Biens immobiliers enregistrés</p>
            </div>
        </a>
        <a href="">
            <img src="{{ asset('assets/icons/bell_premium.png') }}" alt="Icône alertes">
            <div>
                <p class="semiBold">Alertes</p>
                <p class="textButton">Recherche immobilièress</p>
            </div>
        </a>
        <a href="">
            <img src="{{ asset('assets/icons/setting_premium.png') }}" alt="Icône gérer compte">
            <div>
                <p class="semiBold">Gérer mon compte</p>
                <p class="textButton">E-mail, mot de passe, ...</p>
            </div>
        </a>
    </div>
    <div id="account__dashboard__secondline">
        <a href="">
            <img src="{{ asset('assets/icons/folder_premium.png') }}" alt="Icône espace locataire">
            <div>
                <p class="semiBold">Espace locataire</p>
                <p class="textButton">Historique, candidatures</p>
            </div>
        </a>
        <a href="">
            <img src="{{ asset('assets/icons/key_premium.png') }}" alt="Icône espace propriétaire">
            <div>
                <p class="semiBold">Espace propriétaire</p>
                <p class="textButton">Annonces déposés et candidatures</p>
            </div>
        </a>
        <a href="{{ route( 'logout') }}">
            <img src="{{ asset('assets/icons/rocket_premium.png') }}" alt="Icône déconnexion">
            <div>
                <p class="semiBold">Se déconnecter</p>
            </div>
        </a>
    </div>
</section>
@endsection

<!-- js file -->
@section('javascript')
@endsection