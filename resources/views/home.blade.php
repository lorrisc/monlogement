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
@section('pagecontainerid')
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

<section id="adviceContainer" class="classicSection">
    <h2 class="underlineTitle">Les conseils MonLogement pour <span class="semiBold">votre projet de location</span></h2>

    <section id="adviceContainer__content">
        <a href="#">
            <article class="adviceContainer__article">
                <h3>Préparer votre dossier de location</h3>
                <p>À revenus équivalents, il suffit parfois de peu de chose pour qu’un(e) candidat(e) à la location soit préféré(e) à un(e) autre.</p>
                <p class="adviceContainer__article__fakelink">En savoir plus</p>
            </article>
        </a>
        <a href="#">
            <article class="adviceContainer__article">
                <h3>Plomberie : qui paie les réparations entre le locataire et le propriétaire ?</h3>
                <p>Pendant la location d’un logement, des soucis peuvent survenir au niveau de la plomberie.</p>
                <p class="adviceContainer__article__fakelink">En savoir plus</p>
            </article>
        </a>
        <a href="#">
            <article class="adviceContainer__article">
                <h3>Votre propriétaire a-t-il le droit d’augmenter votre loyer ?</h3>
                <p>Une fois le bail de location conclu, un propriétaire ne peut pas majorer le loyer à sa guise.</p>
                <p class="adviceContainer__article__fakelink">En savoir plus</p>
            </article>
        </a>
    </section>
</section>

<section id="listingadvertisementContainer" class="classicSection">
    <h2 class="underlineTitle">Annonces immobilières <span class="semiBold">en France</span></h2>

    <div id="listingadvertisementContainer__content">
        <div>
            <h3>Location d'appartements et de maisons</h3>
            <div class="listingContainerBox listingadvertisementContainer__location">
                <div class="listingContainer listingadvertisementContainer__location__cities">
                    <a href="#">Location Angers</a>
                    <a href="#">Location Clermont-Ferrand</a>
                    <a href="#">Location Paris</a>
                    <a href="#">Location Saint-Etienne</a>
                    <a href="#">Location La Rochelle</a>
                </div>
                <div class="listingContainer listingadvertisementContainer__location__departments">
                    <a href="#">Location Puy-de-Dôme</a>
                    <a href="#">Location Île-de-France</a>
                    <a href="#">Location Cantal</a>
                    <a href="#">Location Seine et Marne</a>
                    <a href="#">Location Savoie</a>
                </div>
            </div>
        </div>

        <div>
            <h3>Ventes d’appartements et de maisons</h3>
            <div class="listingContainerBox listingadvertisementContainer__sale">
                <div class="listingContainer listingadvertisementContainer__sale__cities">
                    <a href="#">Vente Angers</a>
                    <a href="#">Vente Clermont-Ferrand</a>
                    <a href="#">Vente Paris</a>
                    <a href="#">Vente Saint-Etienne</a>
                    <a href="#">Vente La Rochelle</a>
                </div>
                <div class="listingContainer listingadvertisementContainer__sale__departments">
                    <a href="#">Vente Puy-de-Dôme</a>
                    <a href="#">Vente Île-de-France</a>
                    <a href="#">Vente Cantal</a>
                    <a href="#">Vente Seine et Marne</a>
                    <a href="#">Vente Savoie</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="/js/homePage.js"></script>
@endsection