
<?php
//à inclure dans toutes les pages de backend aprés include bddCo.php sauf login.php et traitementlog.php
if (isset($_COOKIE['foo']) && $_COOKIE['foo'] == 'bar') {
	$userId = $_COOKIE['userId'];
	$userNom = $_COOKIE['userNom'];
	$userPrenom = $_COOKIE['userPrenom'];
} else {
	if (isset($_SESSION['foo']) && $_SESSION['foo'] == 'bar') {
		$userId = $_SESSION['userId'];
		$userNom = $_SESSION['userNom'];
		$userPrenom = $_SESSION['userPrenom'];
	} else {
		header('Location: ../login.php?connexion=deconnexion');
		exit();
	}
}

?>