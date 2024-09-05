<html>
<head><meta charset="UTF8">
	<title>ApiRécupération</title>
	<style>
		#divMain{
			width : 50%;
			margin-left : 25%;
			height : 94%;
			margin-top : 1%;
			background-color : #fbdfaf;
			padding : 1%;
		}
		input{ background-color : #fdffcf; width : 100%; }
	</style>
</head>
<body style="background-color : #fdffcf;">

	<div id="divMain"><h2 style ="text-align:center;">Récupération de votre mot de passe</h2></br></br>
		Pour récupérer votre mot de passe, nous avons besoin soit de votre pseudo, soit de votre adresse email.</br></br>
		<form>
			Pseudo :</br><input required = "required" class="input" id="inputPseudo" type="text" name="pseudo"/></br></br>
			Adresse email :</br><input required="required" class="input" type="email" name="email"/></br></br></br>

			<center><button type="submit" form="formulaire_inscription" value="Submit" >
											<span>Récupérer mon mot de passe !</span></button></center>
		</form>
	</div>

</body>