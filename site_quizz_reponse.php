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
			height : 62%;
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
		#inputSkip{
			width : 15%;
			height : 8%;
			left : 70%;
			top : 77%;
			font-size : 150%;
			color : #fff;
			background-color : #aaa;
			position : fixed;
		}
	</style>
</head>
<body style="background-color : #eee">

	<?php

		session_start();

		require("config_bdd.php");

		if(!isset($_SESSION["newTheme"]) || $_SESSION["newTheme"] == 0){
			// On choisit un thème :
				// - On calcul le nombre de thèmes possibles
			$max_id_theme = "SELECT COUNT(*) AS maxThemes FROM theme";
			$query_max_id_theme = mysqli_query($link, $max_id_theme);
			$result_max_id_theme = mysqli_fetch_assoc($query_max_id_theme);
			$num_max_id_theme = $result_max_id_theme["maxThemes"];

				// - On en prend un au hasard
			$randomThemes = rand(1, $num_max_id_theme);

				// - Et on ressort son id et son nom
			$random_id_theme = "SELECT id, nom FROM theme";
			$query_random_id_theme = mysqli_query($link, $random_id_theme);
			for($i = 0; $i < $randomThemes; $i++){
				$row = mysqli_fetch_assoc($query_random_id_theme);
			}
			$id_theme = $row["id"];
			$theme = $row["nom"];


			$_SESSION["id_theme"] = $id_theme;
			$_SESSION["theme"] = $theme;
			$_SESSION["newTheme"] = 1;
			$_SESSION["pointsUser"] = 0;
			$_SESSION["nbImages"] = 0;
			$_SESSION["newImage"] = 1;

			$_SESSION["arrayImages"] = [];
		}

		if(!isset($_SESSION["newImage"]) || $_SESSION["newImage"] == 1){
			// On choisit un image du thème voulu de la même façon qu'on a choisit un thème en ressortant l'image et la réponse
			$max_id_image = "SELECT COUNT(*) AS maxImages FROM question WHERE id_theme = ".$_SESSION["id_theme"]."";
			$query_max_id_image = mysqli_query($link, $max_id_image);
			$result_max_id_image = mysqli_fetch_assoc($query_max_id_image);
			$num_max_id_image = $result_max_id_image["maxImages"];

			$randomImages = rand(1, $num_max_id_image);

			$random_id_image = "SELECT question, reponse FROM question WHERE id_theme = ".$_SESSION["id_theme"]."";
			$query_random_id_image = mysqli_query($link, $random_id_image);
			/*$randomImage = array();
			$reponseImage = array();*/
			for($i = 0; $i < $randomImages; $i++){
				$row = mysqli_fetch_array($query_random_id_image);
				/*$randomImage[] = $row["question"];
				$reponseImage[] = $row["reponse"];*/
			}

			/*-$tIs = range(0, count($randomImage)-1);
			shuffle($tIs);
			$newRandomImage = array();
			$newReponseImage = array();
			for($i=0;$i<count($tIs);$i++) {
				$newRandomImage[] = $randomImage[$tIs[$i]];
				$newReponseImage[] = $reponseImage[$tIs[$i]];
			}*/

			$image = $row["question"];
			$reponse = $row["reponse"];
			$_SESSION["newImage"] = 0;


			$_SESSION["answer"] = "Répondre";
			$_SESSION["disabled"] = "";
			$_SESSION["value"] = "";

			for($cmt = 0; $cmt < count($_SESSION["arrayImages"]) && $_SESSION["newImage"] == 0; $cmt++){
				if($image == $_SESSION["arrayImages"][$cmt]){
					$_SESSION["newImage"] = 1;
					$_SESSION["nbImages"] = $_SESSION["nbImages"] - 1;
					$_SESSION["answer"] = "Suivant";
					$_SESSION["disabled"] = "disabled ='disabled'";
					$_SESSION["value"] = 'Vous avez déjà répondu à cette image ! Cliquez sur suivant';
				}
			}


			$_SESSION["nbImages"] = $_SESSION["nbImages"] + 1;

			array_push($_SESSION["arrayImages"], $image);

			$_SESSION["question"] = $image;
			$_SESSION["reponse"] = $reponse;

			$_SESSION["nbTentatives"] = 5;
			$_SESSION["nbPoints"] = 10;

			if($_SESSION["nbImages"] > 5){
				$insert_score = "INSERT INTO partie (id_utilisateur, score, id_theme) 
								 VALUES (".$_SESSION["id_user"].",".$_SESSION["pointsUser"].",".$_SESSION["id_theme"].")";
				$query_score = mysqli_query($link, $insert_score);
				header("location:site_quizz_script.php");
			}
		}

		if(isset($_POST["reponseUser"]) && $_SESSION["newImage"] == 0){
			$_SESSION["nbTentatives"]--;
			if(strtoupper($_POST["reponseUser"]) != $_SESSION["reponse"]){
				if($_POST["reponseUser"] == ""){
					$_SESSION["newImage"] = 1;
					$_SESSION["value"] = "Vous avez passé ! Cliquez sur suivant";
					$_SESSION["nbTentatives"]++;
					$_SESSION["answer"] = "Suivant";
				} 
				if($_SESSION["nbTentatives"] == 1){
					$_SESSION["nbPoints"] = 0;
					$_SESSION["newImage"] = 1;
					$_SESSION["pointsUser"] = $_SESSION["pointsUser"] + $_SESSION["nbPoints"];
					$_SESSION["answer"] = "Suivant";
				} else if($_SESSION["nbTentatives"] == 2){
					$_SESSION["nbPoints"] = 1;
				} else if($_SESSION["nbTentatives"] == 3){
					$_SESSION["nbPoints"] = 3;
				} else if($_SESSION["nbTentatives"] == 4){
					$_SESSION["nbPoints"] = 6;
				}
			} else{
				$_SESSION["newImage"] = 1;
				$_SESSION["pointsUser"] = $_SESSION["pointsUser"] + $_SESSION["nbPoints"];
				$_SESSION["answer"] = "Suivant";
				$_SESSION["disabled"] = "disabled = 'disabled'";
				if($_SESSION["nbPoints"] != 1){
					$_SESSION["value"] = 'Bravo, +'.$_SESSION["nbPoints"].' points ! Cliquez sur suivant';
				} else{
					$_SESSION["value"] = 'Bravo, +'.$_SESSION["nbPoints"].' point ! Cliquez sur suivant';
				}
			}
		}
			
	?>
	<div id="divBonjour"></br></br>
		<a href="site_quizz_script.php" id="linkEndGame" style="text-decoration:underline; cursor:pointer; color:#933">Quitter la partie</a></br></br>
		<h3>Bonne chance sur le thème <?php echo $_SESSION["theme"] ?> !</h3>
	</div>

	<form method="post" action="site_quizz_reponse.php" id="site_quizz_script">
		<input  id="inputReponse" type="text"; <?php echo $_SESSION["disabled"]; ?> 
				value="<?php echo $_SESSION["value"]; ?>" autofocus autocomplete="off" name="reponseUser">
		<input  id="inputDiscussion" type="submit" form="site_quizz_script" name="discussion" 
				value="<?php echo $_SESSION["answer"] ?>">
		<input  id="inputSkip" type="submit" form="site_quizz_script" name="skip" value="Passer">
	</form>

	<div id="divPseudo"><h1><?php echo $_SESSION["login"]; ?></h1></div>
	<div id="divChat">
		</br> 
		<h2>Score :</br><?php echo $_SESSION["pointsUser"] ?></h2></br>
		<h2>Essais restants :</br><?php echo $_SESSION["nbTentatives"] ?></h2></br>
		<h2>Images restantes :</br><?php echo(5 - $_SESSION["nbImages"]) ?></h2></br>
	</div>
		<div id="divApiQuizz"><div id="divApiQuizzH1"><?php echo $_SESSION["theme"]; ?></div></div>
	<img id="imageQuizz" src="<?php echo $_SESSION["question"]; ?>">

</body>
</html>