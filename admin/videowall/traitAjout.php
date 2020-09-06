<?php include('../include/bddCo.php'); ?>

<?php


if (isset($_POST['traitAjout'])) {
    $itmTitre = "";
    $itmTxt = "";
    $itmLien = "";
    $itmArtiste = "";
    $itmDate = date('Y-m-d',);
    $itmId = 0;

    if (isset($_POST['itmId']) && $_POST['itmId'] > 0) {
        $itmId = $_POST['itmId'];
        $stmt = mysqli_prepare($database, "SELECT * FROM tblvideowall WHERE itmid = ?");
        mysqli_stmt_bind_param($stmt, 'i', $itmId);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $itmTitre = $row['itmTitre'];
            $itmLien = $row['itmLien'];
            $itmTxt = $row['itmTxt'];
            $itmArtiste = $row['itmArtiste'];
            $itmId  = $row['itmId'];
        }
    }

    $itmTitre = mysqli_real_escape_string($database, $_POST['itmTitre']);
    $itmLien = mysqli_real_escape_string($database, $_POST['itmLien']);
    $itmTxt = mysqli_real_escape_string($database, $_POST['itmTxt']);
    $itmArtiste = mysqli_real_escape_string($database, $_POST['itmArtiste']);

    if (isset($_POST['itmId']) && $_POST['itmId'] > 0) {
        $sql = "UPDATE tblvideowall SET itmTitre = ?, itmLien = ?, itmTxt = ?, itmArtiste = ? , itmDate = ? WHERE itmId = ?";
        $stmt = mysqli_prepare($database, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssi', $itmTitre, $itmLien, $itmTxt, $itmArtiste, $itmDate, $itmId);
        mysqli_stmt_execute($stmt);
    } else {
        $stmt = mysqli_prepare(
            $database,
            "INSERT INTO tblvideowall (itmTitre, itmLien, itmTxt, itmArtiste, itmDate)
        VALUES ( ?, ?, ?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, 'sssss', $itmTitre, $itmLien, $itmTxt, $itmArtiste, $itmDate);
        mysqli_stmt_execute($stmt);
    }
    mysqli_query($database, $stmt);
}
mysqli_close($database);
header('Location: index.php');
?>
