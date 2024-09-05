<html>
<head><meta charset="UTF8">
	<title>ApiInscription</title>
	<style>
		#divMain{
			width : 50%;
			margin-left : 25%;
			height : 94%;
			margin-top : 1%;
			background-color : #fbdfaf;
			padding : 1%;
		}
		input{
			background-color : #fdffcf;
			width : 100%;
		}
	</style>
</head>
<body style="background-color : #fdffcf;">

	<div id="divMain"><h2 style ="text-align:center;">Inscription</h2></br></br>
		<form method="post" action="formulaire_inscription_script.php" id="formulaire_inscription">
			Pseudo :</br><input required = "required" class="input" id="inputPseudo" type="text" name="pseudo"/></br></br>

			Mot de Passe (entre 4 et 15 caractères) :</br><input required="required" class="input" 
																 type="password" name="password"/></span></br></br>

			Confirmation du mot de passe :</br><input required="required" class="input" type="password" name="vpass"/></br></br>

			Adresse email :</br><input required="required" class="input" type="email" name="email"/></br></br></br>

			<center><button type="submit" form="formulaire_inscription" value="Submit">
											<span>S'enregistrer</span></button></center></br>
			<a href="site_quizz.php" id="linkAccueil" style="text-decoration:underline;
		 		 color:#933; cursor:pointer; float:right;">Retour à la page d'acceuil</a>

		</form>
	</div>

</body>
</html>