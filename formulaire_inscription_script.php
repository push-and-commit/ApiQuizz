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
		#spanError{ color : #f00; }
		input{ background-color : #fdffcf; width : 100%; }
	</style>
</head>
<body style="background-color : #fdffcf;">
	<?php
		require("config_bdd.php");
	?>

	<div id="divMain"><h2 style ="text-align:center;">Inscription</h2></br></br>

	<?php
		$pseudo = $_POST["pseudo"];
		$password = ($_POST["password"]);
		$vpass = ($_POST["vpass"]);
		$email = $_POST["email"];
		$inscrit = "";
		$checkmail = "";

		$verif_pseudo = "SELECT pseudo FROM utilisateurs WHERE pseudo = '".strtoupper($pseudo)."'";
		$result_verif_pseudo = mysqli_query($link, $verif_pseudo);
		if(!$result_verif_pseudo){
			echo("Il y a un problème dans l'éxecution de la requête </br>");
			echo(mysqli_error($link));
		} else if(mysqli_num_rows($result_verif_pseudo) > 0){
			$erreur_pseudo = "Ce pseudo est déjà utilisé";
		} else{
			$erreur_pseudo = "";
		}

		$verif_email = "SELECT email FROM utilisateurs WHERE email = '".$email."'";
		$result_verif_email = mysqli_query($link, $verif_email);
		if(!$result_verif_email){
			echo("Il y a un problème dans l'éxecution de la requête");
			echo(mysqli_error($link));
		} else if(mysqli_num_rows($result_verif_email) > 0){
			$erreur_email = "Cet e-mail est déjà utilisé";
		} else{
			$erreur_email = "";
		}

		if(strlen($password) < 4 || strlen($password) > 15){
			$erreur_password = "Le mot de passe doit être compris entre 4 et 15 caractères.";
			
		}else{
			$password = sha1($_POST["password"]);
			$vpass = sha1($_POST["vpass"]);
			if($_POST["password"] != $_POST["vpass"]){ 
				$erreur_password = "Les mots de passes doivent être identiques."; $inscrit = ""; $checkmail ="";
			} else{
				$erreur_password = "";					
			} 
		} 

		if($erreur_pseudo == "" && $erreur_password == "" && $erreur_email == ""){
			$insert_user = "INSERT INTO utilisateurs (pseudo, password, email) VALUES ('".strtoupper($pseudo)."', '".$password."', '".$email."')";
			$query_insert_user = mysqli_query($link, $insert_user);
			if($query_insert_user){
				$inscrit = "Bravo ! Vous êtes maintenant inscrit sur ApiQuizz !";
				$checkmail = "";
			} else{
				echo $query_insert_user;
			}
			$max_id_user = "SELECT MAX(id) FROM utilisateurs";
			$query_max_id_user = mysqli_query($link, $max_id_user);
			$result_max_id_user = mysqli_fetch_array($query_max_id_user);
			$insert_user_fgame = "INSERT INTO partie (id_utilisateur, score) VALUES (".$result_max_id_user[0].",0)";
			$query_insert_user_fgame = mysqli_query($link, $insert_user_fgame);
		}
	?>

	<form method="post" action="formulaire_inscription_script.php" id="formulaire_inscription">
		Pseudo :</br><input required = "required" class="input" id="inputPseudo" 
							type="text" name="pseudo" autocomplete="off" value="<?php echo $pseudo ?>" /></br>
							<span id="spanError"><?php echo $erreur_pseudo ?></span></br>

		Mot de Passe (entre 4 et 15 caractères) :</br><input required="required" class="input" type="password" name="password"/></br>
							<span id="spanError"><?php echo $erreur_password ?></span></br>

		Confirmation du mot de passe :</br><input required="required" class="input" type="password" name="vpass"/></br>
							<span id="spanError"><?php echo $erreur_password ?></span></br>

		Adresse email :</br><input required="required" autocomplete ="off" class="input" type="email" 
								   value="<?php echo $email ?>" name="email"/></br>
							<span id="spanError"><?php echo $erreur_email ?></span></br></br>

		

	</form>

	<?php 	
			if($inscrit != "" && $checkmail != ""){
				echo('<center><button type="submit" form="formulaire_inscription" value="Submit" >
										<span>S\'inscrire !</span></button></center><h1 style="text-align:center;">'.$inscrit.'</h1>
				<h3 style="text-align:center;">'.$checkmail.'</h3>');
			} else{
				echo('<h1 style="text-align:center;">'.$inscrit.'</h1>
				<h3 style="text-align:center;">'.$checkmail.'</h3><center><button onclick="window.location.href=\'site_quizz.php\'"><span>Jouer maintenant !</span></button></center>');
			}
	?>

		
	</div>

</body>
</html>