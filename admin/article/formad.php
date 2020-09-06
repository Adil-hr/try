<?php include('../include/bddCo.php') ?>
<?php
$itmTitre = '';
$itmTxt = '';
$itmImg = '';
$itmId = 0;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $itmId = $_GET['id'];
    $sql = "SELECT * FROM tblarticle WHERE itmId=" . $itmId;
    $recordset = mysqli_query($database, $sql);
    if ($row = mysqli_fetch_array($recordset)) {
        $itmTitre = $row['itmTitre'];
        $itmTxt = $row['itmTxt'];
        $itmImg = $row['itmImg'];
    }
    mysqli_close($database);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include('../include/header.php'); ?>

    <main>
        <div>
            <div><?php include('../include/navlat.php'); ?></div>
            <article>
                <form action="traitAjout.php" enctype="multipart/form-data" method="post">
                    <label for="itmTitre">titre : </label>
                    <input type="text" name="itmTitre" id="itmTitre" required value="<?php echo $itmTitre; ?>">
                    <label for="imttxt">Descriptif : </label>
                    <textarea type="text" name="itmTxt" id="itmTxt"><?php echo $itmTxt; ?></textarea>
                    <label for="itmImg">Ajoutez votre fichier : </label>
                    <input type="file" name="itmImg" id="itmImg">
                    <?php if ($itmImg != '') { ?>
                        <img src="../upload/sm_<?php echo $itmImg; ?>" alt="">
                    <?php } ?>
                    <input type="hidden" name="itmId" value="<?php echo $itmId; ?>">
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