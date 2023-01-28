<!-- WEBSITE HEADER -->
<header>
    <nav id="navbar">
        <a href="/" id="navbar__title">
            <h1>MonLogement</h1>
        </a>
        <div id="navbar__button_container">
            <a href="#">Mes alertes</a>
            <a href="#">Mes favoris</a>

            <!-- if connect redirect on dashboard account page -->
            @if (!session()->has('account_id'))
            <a href="{{ route( 'signin') }}">Mon compte</a>
            @else
            <a href="{{ route( 'dpaccountdashboard') }}">Mon compte</a>
            @endif

        </div>
    </nav>
</header>