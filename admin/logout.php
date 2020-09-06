<?php session_start(); ?>
<?php

 setcookie('foo', 'bar', time() - 3600);
 setcookie('userId', $row['userId'], time() - 3600);
 setcookie('userNom', $row['userNom'], time() - 3600);
 setcookie('userPrenom', $row['userPrenom'], time() - 3600);
$_SESSION['foo'] = '';
unset($_SESSION['foo']);
$_SESSION['userId'] = '';
unset($_SESSION['userId']);
$_SESSION['userNom'] = '';
unset($_SESSION['userNom']);
$_SESSION['userPrenom'] = '';
unset($_SESSION['userPrenom']);

header('Location: login.php?connexion=decoOK');



?>

<?php
// setcookie('foo', 'bar', time() - 3600);
// setcookie('userId', $row['userId'], time() - 3600);
// setcookie('userNom', $row['userNom'], time() - 3600);
// setcookie('userPrenom', $row['userPrenom'], time() - 3600);
// header('Location: login.php?connexion=decoOK');
?>