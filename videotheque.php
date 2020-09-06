<?php include('include/bddCo.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include('include/header.php'); ?>
    <?php
    $sql = "SELECT * FROM tblvideowall ORDER BY itmId DESC";
    $stmt = mysqli_prepare($database, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($bd = mysqli_fetch_assoc($result)) {
    ?>
        <div><?php echo $bd['itmTitre']; ?></div>
        <div><?php echo $bd['itmTxt']; ?></div>
        <div>
            <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                <?php
                $lastUrlParam = strrpos($bd['itmLien'], '/');
                if ($lastUrlParam) {
                    $idVideo = substr($bd['itmLien'], $lastUrlParam + 1);
                } else {
                    $idVideo = $bd['itmLien'];
                }
                ?>
                <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden" frameborder="0" type="text/html" src="https://www.dailymotion.com/embed/video/<?php echo $idVideo ?>" width="100%" height="100%" allowfullscreen></iframe>
            </div>
        </div>
        <div><?php echo $bd['itmArtiste']; ?></div>
        <div><?php echo $bd['itmDate']; ?></div>
    <?php
    }
    ?>

</body>

</html>