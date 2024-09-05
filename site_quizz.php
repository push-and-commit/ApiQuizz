<html>
<head><meta charset = "UTF8">
	<title>ApiQuizz</title>
	<style>
		.img{
			width : 100%;
		}
		#imageQuizz{
			width : 60%;
			height : 70%;
			left : 10%;
			top : 15%;
			position : fixed;
		}
		#spanError{ color : #f00; }
		#divIdentifiant{
			width : 10%;
			margin-left : 87.5%;
			text-align : center;
		}
		#divApiQuizz{
			width : 60%;
			height : 12%;
			line-height : 12%;
			left : 10%;
			top : 3%;
			position : fixed;
			background-color : #ddd;
		}
		#divApiQuizzH1{
			top : 50%;
			width : 100%;
			position : absolute;
			text-align: center;
			font-weight: bold;
			font-size : 200%;
		}
		#divHistorique{
			left : 1%;
			margin-top : -43%;
			width : 8%;
			height : 15%;
			text-align : center;
			vertical-align : middle;
			text-decoration : underline;
		}
		#divPseudo{
			text-align : center;
			font-weight : bold;
			color : #aaa;
			width : 15%;
			height : 12%;
			left : 70%;
			top : 3%;
			background-color : #ddd;
			position : fixed;
		}
		#divChat{
			text-align : center;
			font-weight : bold;
			color : #aaa;
			width : 15%;
			height : 70%;
			left : 70%;
			top : 15%;
			background-color : #ddd;
			position : fixed;
		}
		#divReponse{
			width : 60%;
			height : 8%;
			left : 10%;
			top : 85%;
			font-size : 150%;
			text-align : center;
			color : #fff;
			background-color : #aaa;
			position : fixed;
		}
		#divDiscussion{
			width : 15%;
			height : 8%;
			left : 70%;
			top : 85%;
			font-size : 150%;
			color : #fff;
			background-color : #aaa;
			position : fixed;
		}
		#tableH{
			left : 1%;
			margin-top : -10%;
			width : 8%;
			text-align : center;
			vertical-align : middle;
			text-decoration : underline;
			height : 80%;
			table-layout : fixed;
			border-collapse : nowrap;
		}
	</style>
</head>
<body style="background-color : #eee">

	<?php

		$erreur = null;
		if(isset($_POST["pseudo"]) && $_POST["button"] == "Connexion"){
			if( (isset($_POST["pseudo"]) && !empty($_POST["pseudo"])) 
				&& 
				(isset($_POST['pass']) && !empty($_POST['pass'])) 
			  ){
				require("config_bdd.php");

				$connexion_pseudo = "SELECT pseudo FROM utilisateurs WHERE pseudo = '".strtoupper($_POST["pseudo"])."'";
				$query_connxeion_pseudo = mysqli_query($link, $connexion_pseudo);
				$result_connxeion_pseudo = mysqli_fetch_assoc($query_connxeion_pseudo);
				if(sizeof($result_connxeion_pseudo) > 0){
					$connexion_pass = "SELECT password FROM utilisateurs WHERE pseudo = '".strtoupper($_POST["pseudo"])."'";
					$query_connexion_pass = mysqli_query($link, $connexion_pass);
					$result_connexion_pass = mysqli_fetch_array($query_connexion_pass);

					if(sha1($_POST["pass"]) == $result_connexion_pass[0]){
						session_start();
						$connexion_id_pseudo = "SELECT id FROM utilisateurs WHERE pseudo = '".strtoupper($_POST["pseudo"])."'";
						$query_id_connexion_pseudo = mysqli_query($link, $connexion_id_pseudo);
						$result_id_connexion_pseudo = mysqli_fetch_array($query_id_connexion_pseudo);
						$_SESSION["id_user"] = $result_id_connexion_pseudo[0];
						$_SESSION["login"] = $_POST["pseudo"];
						header("location:site_quizz_script.php");
						exit();
					} else{
						$erreur = "Mot de passe invalide";
					}
				} else{
					$erreur = "Pseudo invalide";
				}
			} 
		}

	?>
	
	<div id="divIdentifiant"></br></br>
		<form method="post" action="site_quizz.php" id="site_quizz">
			Pseudo : </br><input style="width:100%" type="text" autocomplete="off" name="pseudo" required="required"><br>
		  	Mot de passe : </br><input style="width:100%" type="password" name="pass" required="required"></br>
		  		<span id="spanError"><?php if(isset($erreur)){ echo $erreur; } ?>
		  		</span></br>
			<input type="submit" form="site_quizz" name ="button" value="Connexion"></br></br>
		</form>

		<?php
			require("config_bdd.php");
		?>

		<a href="formulaire_inscription.php" id="linkInscription" style="text-decoration:underline;
		 		 color:#933; cursor:pointer;">Pas encore inscrit ?</a></br>
		<!--<a href="forgot_password.php" target="_blank" id="linkTwo" style="text-decoration:underline;
		 		 color:#933; cursor:pointer;">Mot de passe oublié ?</a>-->
	</div>

	<script>

		linkInscription.onclick = function(){
			linkInscription.style.color = "333";
		};
		/*linkTwo.onclick = function(){
			linkTwo.style.color = "333";
		};*/

	</script>

	<input id="divReponse" type="text" disabled="disabled" name="reponse" value="ApiQuizz">
	<div id="divPseudo"><h1></h1></div>
	<div id="divChat">  
		</br> 
		<h2>Points :</br>0</h2></br>
		<h2>Essais restants : 0/50</h2></br>
		<h2>Images restantes : 0/50</h2>
	</div>
	<input id="divDiscussion" type="submit" disabled="disabled" name="discussion" value="Répondre">
	<div id="divApiQuizz"><div id="divApiQuizzH1">ApiQuizz</div></div>
	<img src="Images/Logo_site.jpg" id ="imageQuizz">


</body>
</html>