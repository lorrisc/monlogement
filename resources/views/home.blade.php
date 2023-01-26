@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="css/home.css" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Petites annonces immobilières
@endsection

<!-- content -->
@section('pagecontainerclass')
homePage
@endsection

@section('content')
<section id="homeContainer">
    <form action="" method="post" id="homeContainer__searchBox">
        @csrf
        <div id="homeContainer__searchBox__types">
            <input type="radio" name="searchtypes" id="buy" checked>
            <label for="buy" class="selected" id="buylabel"><button type="button">Acheter</button></label>
            <input type="radio" name="searchtypes" id="rent">
            <label for="rent" id="rentlabel"><button type="button">Louer</button></label>
        </div>

        <div id="homeContainer__searchBox__inputs">
            <div id="homeContainer__searchBox__inputs__location">
                <input type="text" name="searchlocation" id="searchlocation" placeholder="Dans quelle ville ? Département ?">
            </div>
            <div id="homeContainer__searchBox__inputs__budget">
                <input type="number" name="searchbudget" id="searchbudget" placeholder="Votre budget max ?">
                <i class="fa-solid fa-euro-sign "></i>
            </div>
        </div>

        <a href="#" id="advancedsearch">Recherche avancée</a>
        <a href="#" id="ownerlink">Propriétaire ? Déposer votre annonce</a>

        <button type="submit" class="button">Rechercher</button>
    </form>
</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="/js/homePage.js"></script>
@endsection