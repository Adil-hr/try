<?php include('include/bddCo.php'); ?>
<?php
if (isset($_POST['login']) && $_POST['login'] == 'X' && isset($_POST['userMail']) && $_POST['userMail'] != '' && isset($_POST['userPwd']) && $_POST['userPwd'] != '') {
    $userMail = $_POST['userMail']; //à verifier
    $userPwd = md5($_POST['userPwd']); //à chiffrer 
    $sql = "SELECT * FROM tbluser WHERE userMail ='" . $userMail . "' AND userPwd ='" . $userPwd . "'";
    $recordset = mysqli_query($database, $sql);
    if ($row = mysqli_fetch_array($recordset)) {
        setcookie('foo', 'bar', time() + 60 * 60 * 24 * 30);
        setcookie('userId', $row['userId'], time() + 60 * 60 * 24 * 30);
        setcookie('userNom', $row['userNom'], time() + 60 * 60 * 24 * 30);
        setcookie('userPrenom', $row['userPrenom'], time() + 60 * 60 * 24 * 30);
        $_SESSION['foo'] = 'bar';
        $_SESSION['userId'] = $row['userId'];
        $_SESSION['userNom'] = $row['userNom'];
        $_SESSION['userPrenom'] = $row['userPrenom'];
        header('Location: article/index.php');
    } else {
        header('Location: login.php?connexion=error');
    }
}

mysqli_close($database);
?>