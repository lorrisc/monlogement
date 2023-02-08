@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{ asset('css/publishAd.css') }}" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Déposer une annonce
@endsection

<!-- content -->
@section('pagecontainerid')
id="publishAdPage"
@endsection

@section('content')
<form action="" method="post">
    <article id="adType">
        <div class="title">
            <h2>Je souhaite</h2>
            <button type="button" class="info_popup_icon">
                <i class="fa-solid fa-circle-info  fa-sm"></i>
            </button>
            <div class="info_popup">
                <div class="triangle"></div>
                <div class="info_popup__text_container">
                    <p>Ce champ ne sera plus modifiable après validation de l’annonce.</p>
                </div>
            </div>
        </div>

        <div class="inputContainer">
            <input type="radio" name="adTypeValue" id="adTypeValue__Rent">
            <input type="radio" name="adTypeValue" id="adTypeValue__Sell">
        </div>
        <div class="content contentTwoButton">
            <button type="button" id="adTypeButton__Rent"><label for="adTypeValue__Rent" id="adTypeLabel__Rent" class="buttonContent">Louer</label></button>
            <button type="button" id="adTypeButton__Sell"><label for="adTypeValue__Sell" id="adTypeLabel__Sell" class="buttonContent">Vendre</label></button>
        </div>
    </article>

    <article id=" propertieType">
        <div class="title">
            <h2>Quel type de bien souhaitez-vous louer ?</h2>
            <button type="button" class="info_popup_icon">
                <i class="fa-solid fa-circle-info  fa-sm"></i>
            </button>
            <div class="info_popup">
                <div class="triangle"></div>
                <div class="info_popup__text_container">
                    <p>Ce champ ne sera plus modifiable après validation de l’annonce.</p>
                </div>
            </div>
        </div>

        <div>
            <input type="radio" name="propertieTypeValue" id="propertieTypeValue__House">
            <input type="radio" name="propertieTypeValue" id="propertieTypeValue__Appartment">
        </div>

        <div class="content contentOneLineButton">

            <button type="button" id="propertieTypeButton__House">
                <label for="propertieTypeValue__House" class="buttonContent">
                    <img src="{{ asset('assets/icons/home.svg') }}" alt="icone maison">
                    Maison
                </label>
            </button>
            <button type="button" id="propertieTypeButton__Appartment">
                <label for="propertieTypeValue__Appartment" class="buttonContent">
                    <img src="{{ asset('assets/icons/building.svg') }}" alt="icone immeuble">
                    Appartement
                </label>
            </button>
            <button type="button"><label for="" class="buttonContent">Autre</label></button>
        </div>
    </article>

    <article id="surface">
        <div class="title">
            <h2>Quelle est la surface de votre bien ?</h2>
        </div>

        <div class="content">
            <div class="normalInputManyElements">
                <input type="number" name="surfaceValue" id="surfaceValue">
                <p>m<sup>2</sup></p>
            </div>
        </div>

        <button type="button" class="button submitButton blockSubmit" id="submitSurface">Continuer</button>
    </article>

    <article id="room">
        <div class="title">
            <h2>Quelles sont les pièces composant votre bien ?</h2>
        </div>



        <div class="content">

            <div id="room__number">
                <div class="top_aditionnal_information">
                    <p>Combien y a-t-il de pièces ? (Total)</p>
                </div>
                <div class="normalInputManyElements">
                    <button type="button" class="button actionOnInputButton disabled">-</button>
                    <input type="number" name="roomNumberValue" id="roomNumberValue" value="0">
                    <button type="button" class="button actionOnInputButton">+</button>
                </div>
            </div>
            <div id="bedroom__number">
                <div class="top_aditionnal_information">
                    <p>Combien y a-t-il de chambres ?</p>
                </div>
                <div class="normalInputManyElements">
                    <button type="button" class="button actionOnInputButton disabled">-</button>
                    <input type="number" name="bedroomNumberValue" id="bedroomNumberValue" value="0">
                    <button type="button" class="button actionOnInputButton disabled">+</button>
                </div>
            </div>
            <div id="bathroom__number">
                <div class="top_aditionnal_information">
                    <p>Combien y a-t-il de salle de bain ?</p>
                </div>
                <div class="normalInputManyElements">
                    <button type="button" class="button actionOnInputButton disabled">-</button>
                    <input type="number" name="bathroomNumberValue" id="bathroomNumberValue" value="0">
                    <button type="button" class="button actionOnInputButton disabled">+</button>
                </div>
            </div>
            <div id="toilet__number">
                <div class="top_aditionnal_information">
                    <p>Combien y a-t-il de WC ?</p>
                </div>
                <div class="normalInputManyElements">
                    <button type="button" class="button actionOnInputButton disabled">-</button>
                    <input type="number" name="toiletNumberValue" id="toiletNumberValue" value="0">
                    <button type="button" class="button actionOnInputButton disabled">+</button>
                </div>
            </div>
        </div>

        <button type="button" id="submitRoom" class="button submitButton  blockSubmit">Continuer</button>
    </article>

    <article id="furniture">
        <div class="title">
            <h2>Quel type de bien souhaitez-vous louer ?</h2>
        </div>

        <div>
            <input type="radio" name="furnitureValue" id="furnitureValue__furniture">
            <input type="radio" name="furnitureValue" id="furnitureValue__unfurniture">
        </div>

        <div class="content contentTwoButton">
            <button type="button" id="furnitureButton__furniture"><label for="furnitureValue__furniture" class="buttonContent">Meublé</label></button>
            <button type="button" id="furnitureButton__unfurniture"><label for="furnitureValue__unfurniture" class="buttonContent">Non meublé</label></button>
        </div>

        <div class="bottom_aditionnal_information">
            <p>Une location est considérée meublée si un locataire peut y vivre, manger et dormir convenablement en n’apportant que ses affaires personnelles sans mobilier.</p>
        </div>
    </article>

    <article id="surfaceField">
        <div class="title">
            <h2>Quelle est la superficie de votre terrain ?</h2>
        </div>

        <div class="content">
            <div class="normalInputManyElements">
                <input type="number" name="surfaceFieldValue" id="surfaceFieldValue">
                <p>m<sup>2</sup></p>
            </div>
        </div>

        <button type="button" id="submitSurfaceField" class="button submitButton  blockSubmit">Continuer</button>
    </article>

    <article id="price">
        <div class="title">
            <h2>A combien voulez vous louer votre bien ?</h2>
        </div>

        <div class="top_aditionnal_information">
            <p>Indiquer le loyer (toutes charges comprise)</p>
        </div>

        <div class="content">
            <div class="normalInputManyElements">
                <input type="number" name="priceValue" id="priceValue">
                <i class="fa-solid fa-euro-sign"></i>
            </div>
        </div>

        <div class="bottom_aditionnal_information">
            <p>N’hésitez pas à ajouter plus de détail sur le loyer dans la description du bien. Exemple : montant des charges, montant des éventuel complément de loyer, ...</p>
        </div>

        <button type="button" id="submitPrice" class="button submitButton  blockSubmit">Continuer</button>
    </article>

    <article id="description">
        <div class="title">
            <h2>Comment décrivez-vous votre bien ?</h2>
        </div>

        <div class="top_aditionnal_information">
            <p>Évitez de répéter des informations déjà précisées et ne pas oublier de parler des atouts du bien, de l'ambiance du quartier, des commerces aux alentours et des transports en commun.</p>
        </div>

        <div class="content">
            <textarea name="descriptionValue" id="descriptionValue" placeholder="Ajouter votre description ici"></textarea>
        </div>

        <button type="button" id="submitDescription" class="button submitButton  blockSubmit">Continuer</button>
    </article>

    <article id="photo">
        <div class="title">
            <h2>Avez-vous quelques photos ?</h2>
        </div>
    </article>

    <article id="energyConsumption">
        <div class="title">
            <h2>Quel est le diagnostic de performance énergétique ?</h2>
        </div>

        <div class="content">
            <div class="normalInputManyElements">
                <input type="number" name="energyConsumptionValue" id="energyConsumptionValue">
                <p>KWh ep./m<sup>2</sup>/an</p>
            </div>
        </div>

        <button type="button" id="submitEnergy" class="button submitButton  blockSubmit">Continuer</button>
    </article>

    <article id="adresse">
        <div class="title">
            <h2>Quelle est l’adresse du votre bien ?</h2>

            <button type="button" class="info_popup_icon">
                <i class="fa-solid fa-circle-info  fa-sm"></i>
            </button>
            <div class="info_popup">
                <div class="triangle"></div>
                <div class="info_popup__text_container">
                    <p>Ce champ ne sera plus modifiable après validation de l’annonce.</p>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="normalInputManyElements normalInputManyElementsLeft">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" name="adresseValue" id="adresseValue">
            </div>

            <div class="contentDropDown">
                <ul>
                </ul>
            </div>

            <div class="hide">
                <input type="text" name="adress_housenumber" id="adress_housenumber">
                <input type="text" name="adress_street" id="adress_street">
                <input type="text" name="adress_postcode" id="adress_postcode">
                <input type="text" name="adress_city" id="adress_city">
            </div>
        </div>

        <button type="button" id="submitAdress" class="button submitButton  blockSubmit">Continuer</button>
    </article>

    <article id="attrSupp">
        <div class="title">
            <h2>Pour finir cochez les attributs correspondant à votre bien</h2>
        </div>

        <div>
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__balcony">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__terrace">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__cellar">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__parking">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__garden">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__digicode">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__intercom">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__guardian">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__lift">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__pool">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__separate_toilet">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__expanded_fiber">
            <input type="checkbox" name="attrSuppValue" id="attrSuppValue__electric_vehicle_charging">
        </div>
        <div class="content">


            <button type="button"><label for="attrSuppValue__balcony" class="buttonContent">Balcon</label> </button>
            <button type="button"><label for="attrSuppValue__terrace" class="buttonContent">Terrasse</label> </button>
            <button type="button"><label for="attrSuppValue__cellar" class="buttonContent">Cave</label> </button>
            <button type="button"><label for="attrSuppValue__parking" class="buttonContent">Parking</label> </button>
            <button type="button"><label for="attrSuppValue__garden" class="buttonContent">Jardin</label> </button>
            <button type="button"><label for="attrSuppValue__digicode" class="buttonContent">Digicode</label> </button>
            <button type="button"><label for="attrSuppValue__intercom" class="buttonContent">Interphone</label> </button>
            <button type="button"><label for="attrSuppValue__guardian" class="buttonContent">Gardien</label> </button>
            <button type="button"><label for="attrSuppValue__lift" class="buttonContent">Ascenseur</label> </button>
            <button type="button"><label for="attrSuppValue__chimney" class="buttonContent">Cheminée</label> </button>
            <button type="button"><label for="attrSuppValue__pool" class="buttonContent">Piscine</label> </button>
            <button type="button"><label for="attrSuppValue__separate_toilet" class="buttonContent">Toilette separré</label> </button>
            <button type="button"><label for="attrSuppValue__expanded_fiber" class="buttonContent">Fibre</label> </button>
            <button type="button"><label for="attrSuppValue__electric_vehicle_charging" class="buttonContent">Chargeur véhicule électrique</label> </button>
        </div>
    </article>

    <article class="submitForm">
        <p>Vous vous appreté à publier votre bien immobiliers, en cliquant sur le bouton ci-dessous, vous accepter que votre bien soit visible sur notre plateforme. Vos coordonnées (courriel et téléphone seront visible de tous)</p>
        <button type="button" class="button submitButton">Publier mon bien</button>
    </article>
</form>

<section id="userIndicationFormStatus">

    <p><span>Louer</span> mon bien</p>

    <!-- LL = life line -->
    <article id="adTypeLL" class="inprogress">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Type d'annonce</p>
    </article>

    <article id="propertieTypeLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Type de bien</p>
    </article>

    <article id="surfaceLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Surface</p>
    </article>

    <article id="roomLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Pièces</p>
    </article>

    <article id="furnitureLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Location meublé</p>
    </article>

    <article id="surfaceFieldLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Surface terrain</p>
    </article>

    <article id="priceLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Loyer</p>
    </article>

    <article id="descriptionLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Description du bien</p>
    </article>

    <article id="photoLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Photos</p>
    </article>

    <article id="energyConsumptionLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Diagnostic énergétique</p>
    </article>

    <article id="adresseLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Adresse du bien</p>
    </article>

    <article id="attrSuppLL">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Attributs supplémentaires</p>
    </article>

</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="{{asset('js/publishAd.js')}}"></script>
@endsection