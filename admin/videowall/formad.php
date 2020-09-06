<?php include('../include/bddCo.php'); ?>
<?php
$itmTitre = '';
$itmLien = '';
$itmTxt = '';
$itmArtiste = '';
$itmId = 0;

if (isset($_GET['id']) && $_GET['id'] > 0) {
    // $itmId = $_GET['id'];
    // if (!($stmt = $database->prepare("SELECT * FROM tblvideowall WHERE itmId = ?"))) {
    //     echo "Echec de la préparation : (" . $database->errno . ") " . $database->error;
    // }

    // if (!$stmt->bind_param('i', $itmId)) {
    //     echo "Echec lors du liage des paramètres : (" . $stmt->errno . ") " . $stmt->error;
    // }
    // if (!$stmt->execute()) {
    //     echo "Echec lors de l'exécution : (" . $stmt->errno . ") " . $stmt->error;
    // }

    $itmId = $_GET['id'];
    $stmt = mysqli_prepare($database, "SELECT * FROM tblvideowall WHERE itmId = ?");
    mysqli_stmt_bind_param($stmt, 'i', $itmId);
    //$recordset = mysqli_query($database, $stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $itmTitre = $row['itmTitre'];
        $itmLien = $row['itmLien'];
        $itmTxt = $row['itmTxt'];
        $itmArtiste = $row['itmArtiste'];
    }
    mysqli_close($database);
}

// if (isset($_GET['id']) && $_GET['id'] > 0) {
//     $itmId = $_GET['id'];
//     $sql = "SELECT * FROM tblvideowall WHERE itmId=" . $itmId;
//     $recordset = mysqli_query($database, $sql);
//     if ($row = mysqli_fetch_array($recordset)) {
//         $itmTitre = $row['itmTitre'];
//         $itmLien = $row['itmLien'];
//         $itmTxt = $row['itmTxt'];
//         $itmArtiste = $row['itmArtiste'];
//     }
//     mysqli_close($database);
// }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include('../include/header.php'); ?>

    <main>
        <div>

            <article>
                <form action="traitAjout.php" enctype="multipart/form-data" method="post">
                    <label for="itmTitre">titre : </label>
                    <input type="text" name="itmTitre" id="itmTitre" required value="<?php echo $itmTitre; ?>">
                    <label for="imtLien">Lien : </label>
                    <input type="text" name="itmLien" id="itmLien" required value="<?php echo $itmLien; ?>">
                    <label for="imttxt">Descriptif : </label>
                    <textarea type="text" name="itmTxt" id="itmTxt"><?php echo $itmTxt; ?></textarea>
                    <input type="hidden" name="itmId" value="<?php echo $itmId; ?>">
                    <label for="imtArtiste">Artiste : </label>
                    <input type="text" name="itmArtiste" id="itmArtiste" required value="<?php echo $itmArtiste; ?>">
                    <div>
                        <button type="submit">Envoyer</button>
                        <input type="hidden" name="traitAjout" value="10">
                    </div>
                </form>
            </article>
        </div>
    </main>
</body>
<script src="../js/jQuery.js"></script>
<script src="../js/Popper.js"></script>
<script src="../js/bootstrap.js"></script>

</html>