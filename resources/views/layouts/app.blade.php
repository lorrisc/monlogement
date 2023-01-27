<!-- WEBSITE SKELETON -->

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="bien immobilier, acheter, louer, location immobilière, immobilier">
    <meta name="description" content="Trouvez un appartement ou une maison en vente ou en location. Découvrez de nombreuses annonces immobilières francaise actualisée en temps réel.">
    <meta name="author" content="Lorris Crappier">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    @yield('style')

    <title>@yield('title') | MonLogement</title>

    <script src="https://kit.fontawesome.com/facfbfe3cd.js" crossorigin="anonymous"></script>

</head>

<body>

    @include('partials.header')

    <section class="pagecontainer" id="@yield('pagecontainerid')">
        @yield('content')
    </section>

    @include('partials.footer')

    <script src="{{ asset('js/main.js') }}"></script>
    @yield('javascript')

</body>

</html>