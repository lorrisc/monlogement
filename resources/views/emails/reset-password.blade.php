<!DOCTYPE html>
<html>

<head>
    <title>Réinitialisation de votre mot de passe MonLogement</title>
</head>

<body>
    <article id="emailTextContent">
        <p>Bonjour,</p>
        <p>Suite à votre demande, vous trouverez ci-dessous un bouton vous permettant de réinitialiser votre mot de passe MonLogement.</p>
        <p>Ce bouton sera actif pendant 1h. Passé ce délai, il vous faudra refaire une nouvelle demande.</p>
    </article>
    <div id="emailLinkContainer">
        <a href="{{route('restoreexecuteauth', ['email' => $email, 'token' => $token])}}" id="emailLinkReset">Réinitialiser mon mot de passe</a>
    </div>

    <p id="emailTextAvertissement">Si vous n'êtes pas à l'origine de cette demande, veuillez ne pas tenir compte de ce message.</p>

    <div id="emailBottomLine"></div>
</body>

</html>