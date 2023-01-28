<!DOCTYPE html>
<html style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">

<head style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
    <title style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">Réinitialisation de votre mot de passe</title>
    <link href="{{asset('css/emails/reset-password.css')}}" rel="stylesheet" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">

    <style style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">

    </style>
</head>

<body style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;display:flex;justify-content:center;align-items:center;flex-direction:column;width:100vw;">
    <h1 style="margin-top:0;margin-right:0;margin-left:0;background-attachment:scroll;background-color:#eec643;background-image:none;background-repeat:repeat;background-position:top left;padding-top:10px;padding-bottom:10px;padding-right:0;padding-left:0;margin-bottom:45px;width:100%;text-align:center;font-family:CarterOne;font-size:1.6em;color:#011638;border-top-left-radius:15px;border-top-right-radius:15px;">MonLogement</h1>

    <article id="emailTextContent" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
        <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'FiraSansRegular';font-size:1em;width:500px;margin-bottom:20px;">Bonjour,</p>
        <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'FiraSansRegular';font-size:1em;width:500px;margin-bottom:20px;">Suite à votre demande, vous trouverez ci-dessous un bouton vous permettant de réinitialiser votre mot de passe.</p>
        <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'FiraSansRegular';font-size:1em;width:500px;margin-bottom:20px;">Ce bouton sera actif pendant 24h. Passé ce délai, il vous faudra refaire une nouvelle demande.</p>
    </article>

    <div id="emailLinkContainer" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:60px;margin-bottom:60px;margin-right:auto;margin-left:auto;">
        <a href="{{ url('password/reset', $token) }}" id="emailLinkReset" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:15px;padding-bottom:15px;padding-right:35px;padding-left:35px;background-color:#eec643;border-style:none;border-radius:5px;color:#141414;cursor:pointer;font-family:FiraSansSemiBold;font-size:1.2em;text-decoration:none;">Réinitialiser mon mot de passe</a>
    </div>

    <p id="emailTextAvertissement" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'FiraSansRegular';font-size:1em;width:500px;">Si vous n'êtes pas à l'origine de cette demande, veuillez ne pas tenir compte de ce message.</p>

    <div id="emailBottomLine" style="margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-attachment:scroll;height:30px;width:100%;background-color:#011638;background-image:none;background-repeat:repeat;background-position:top left;margin-top:45px;border-bottom-left-radius:15px;border-bottom-right-radius:15px;"></div>
</body>

</html>