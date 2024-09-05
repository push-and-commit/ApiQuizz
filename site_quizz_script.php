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
		#divBonjour{
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
		#inputReponse{
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
		#inputDiscussion{
			width : 15%;
			height : 8%;
			left : 70%;
			top : 85%;
			font-size : 150%;
			color : #fff;
			background-color : #aaa;
			position : fixed;
		}
	</style>
</head>
<body style="background-color : #eee">

	<?php

		require("config_bdd.php");

		session_start();
		$_SESSION["newTheme"] = 0;

		$highscore = "SELECT MAX(score) FROM partie WHERE id_utilisateur = ".$_SESSION["id_user"]."";
		$query_highscore = mysqli_query($link, $highscore);
		$result_highscore = mysqli_fetch_assoc($query_highscore);
		$_SESSION["Highscore"] = $result_highscore["MAX(score)"];

		$id_lastscore = "SELECT MAX(id) FROM partie WHERE id_utilisateur = ".$_SESSION["id_user"]."";
		$query_id_lastscore = mysqli_query($link, $id_lastscore);
		$result_id_lastscore = mysqli_fetch_array($query_id_lastscore);

		$lastscore = "SELECT score FROM partie WHERE id_utilisateur = ".$_SESSION["id_user"]." AND id = ".$result_id_lastscore[0]."";
		$query_lastscore = mysqli_query($link, $lastscore);
		$result_lastscore = mysqli_fetch_array($query_lastscore);
		$_SESSION["Lastscore"] = $result_lastscore[0];

		$id_last_theme = "SELECT MAX(id) AS id FROM partie";
		$query_id_last_theme = mysqli_query($link, $id_last_theme);
		$result_id_last_theme = mysqli_fetch_array($query_id_last_theme);

		$last_theme = "SELECT nom FROM partie, theme WHERE partie.id = ".$result_id_last_theme[0]." AND id_theme = theme.id";
		$query_last_theme = mysqli_query($link, $last_theme);
		$result_last_theme = mysqli_fetch_assoc($query_last_theme);
		$_SESSION["LastTheme"] = $result_last_theme["nom"];
		if($_SESSION["LastTheme"] == null){
			$_SESSION["LastTheme"] = "Aucun";
		}

	?>
	<div id="divBonjour"></br></br>
		<a href="site_quizz.php" id="linkLogOut" style="text-decoration:underline; cursor:pointer; color:#933">
			Déconnexion</a></br></br>
		<h3>Bonjour</br><?php echo $_SESSION["login"]; ?> ! </br></br>Vous êtes maintenant connecté au site ApiQuizz !
			</br></br>Commencer une nouvelle partie en cliquant sur "Nouveau"
		</h3>
	</div>

	<form method="post" action="site_quizz_reponse.php" id="site_quizz_script">
		<input id="inputReponse" type="text" disabled="disabled" name="reponse" value="ApiQuizz">
		<input id="inputDiscussion" type="submit" form="site_quizz_script" name="discussion" value="Nouveau">
	</form>

	<div id="divPseudo"><h1><?php echo $_SESSION["login"]; ?></h1></div>
	<div id="divChat">
		</br> 
		<h2>Meilleur score :</br><?php echo $_SESSION["Highscore"] ?>/50</h2></br>
		<h2>Dernier score :</br><?php echo $_SESSION["Lastscore"] ?>/50</h2></br>
		<h2>Dernier theme :</br><?php echo $_SESSION["LastTheme"] ?></h2></br>
	</div>
	<div id="divApiQuizz"><div id="divApiQuizzH1">Accueil</div></div>
	<img src="Images/Logo_site.jpg" id ="imageQuizz">

</body>
</html>