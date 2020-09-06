
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <main class="container-fluid">
        <section class="body-sign row">
            <div class="center-sign offset-3 col-lg-6">
                <div class=push-left><img src="image/logo2.png" alt=""></div>
                <article class="panel panel-sign">
                    <form action="traitementlog.php" class="form-group ml-5" method="post">
                        <div class=" form-group">
                            <label for="Ut">Identifiant</label>
                            <input type="email" class="form-control" name="userLogin" id="Ut" required placeholder="Entrez votre email" />
                            <label for="Pwd">Mot de passe</label>
                            <input type="password" class="form-control" name="userPwd" id="Pwd" required placeholder="Entrez votre mot de passe" />
                            <button type="submit">Connection</button>
                            <input type="hidden" name="login" value="X">
                            <?php //if (isset($_GET['connexion']) && $_GET['connexion']='erreur') {?>
                                <!-- <p class="text-warning"> mauvais login ou mot de passe</p> -->
                            <?php //}?>
                            <?php //if (isset($_GET['connexion']) && $_GET['connexion']='deconnexion') {?>
                                <!-- <p class="text-warning"> vous avez été deco</p> -->
                            <?php //}?>

                        </div>
                    </form>
                </article>
            </div>
        </section>

    </main>
</body>
<script src="js/jQuery.js"></script>
<script src="js/Popper.js"></script>
<script src="js/bootstrap.js"></script>

</html>