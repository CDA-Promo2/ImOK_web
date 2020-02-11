<p>
	Bonjour <b><?=$user->firstname.' '.$user->lastname ?></b>
<br>
	Vous avez perdu votre mot de passe et demandé sa remise à zéro.
<br>
	Voici votre code temporaire de récupération :
<br>
	<b><?= $token ?></b>
<br>
	Attention: si vous n'êtes pas à l'origine de cette demande, quelqu'un essaye probablement de se connecter à votre place.
</p>
