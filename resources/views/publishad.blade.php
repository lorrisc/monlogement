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
</form>

<section id="userIndicationFormStatus">

    <p><span>Louer</span> mon bien</p>

    <article id="adType" class="validate">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Type d'annonce</p>
    </article>

    <article id="propertieType" class="inprogress">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Type de bien</p>
    </article>

    <article id="surfaceType">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Surface</p>
    </article>

    <article id="room">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Pièces</p>
    </article>

    <article id="furniture">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Location meublé</p>
    </article>

    <article id="surfaceField">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Surface terrain</p>
    </article>

    <article id="price">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Loyer</p>
    </article>

    <article id="description">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Description du bien</p>
    </article>

    <article id="photo">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Photos</p>
    </article>

    <article id="energyConsumption">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Diagnostic énergétique</p>
    </article>

    <article id="adresse">
        <div class="verticalLine"></div>
        <div class="circle"></div>
        <p class="content">Adresse du bien</p>
    </article>

    <article id="attrSupp">
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