@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<link href="{{ asset('css/accountDashboard.css') }}" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Mes annonces
@endsection

<!-- content -->
@section('pagecontainerid')
id="accountDashboardPage"
@endsection

@section('content')
<a href="{{ route( 'dpaccountdashboard') }}" class="returnButton">
    <img src="{{asset('assets/icons/return.svg')}}" alt="icône bouton retour">
    <p>Retour</p>
</a>

<div class="account_title">
    <h2 class="semiBold">Mes annonces</h2>

    <?php
    $account_email_decrypt = decrypt(session('account_email'));
    $accountEmail = $account_email_decrypt['account_email'];
    echo '<p>' . $accountEmail . '</p>';
    ?>
</div>
<section id="account__dashboard">
    <div id="account__dashboard__firstline">
        <a href="">
            <img src="{{ asset('assets/icons/copy-dynamic-premium.png') }}" alt="Icône favoris">
            <div>
                <p class="semiBold">Mes annonces</p>
                <p class="textButton">Gérer vos biens immobiliers</p>
            </div>
        </a>
        <a href="{{ route( 'dppublishad') }}">
            <img src="{{ asset('assets/icons/chess-dynamic-premium.png') }}" alt="Icône alertes">
            <div>
                <p class="semiBold">Publier mon annonce</p>
                <p class="textButton">Ajouter un bien immobilier</p>
            </div>
        </a>
        <a href="{{ route( 'dpaccountdashboard') }}">
            <img src="{{ asset('assets/icons/rocket-dynamic-premium.png') }}" alt="Icône retour">
            <div>
                <p class="semiBold">Retour</p>
            </div>
        </a>
    </div>
</section>
@endsection

<!-- js file -->
@section('javascript')
@endsection