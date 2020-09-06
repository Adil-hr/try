<?php include('../include/bddCo.php'); ?>
<?php include('../include/funcResizeImg.php'); ?>
<?php if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
} ?>

<?php

if (isset($_GET['id']) && $_GET['id'] > 0 && is_numeric($_GET['id'])) {
    $itmId = $_GET['id'];
    $stmt = mysqli_prepare($database, "SELECT * FROM tblvideowall WHERE itmId = ?");
    mysqli_stmt_bind_param($stmt, 'i', $itmId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_get_result($stmt);
    $stmt2 = mysqli_prepare($database, "DELETE FROM tblvideowall WHERE itmId = ?");
    mysqli_stmt_bind_param($stmt2, 'i', $itmId);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_get_result($stmt2);

    // $sql = "SELECT * FROM tblvideowall WHERE itmId = " . $itmId;
    // $recordset = mysqli_query($database, $sql);
    //     $sql = "DELETE FROM tblvideowall WHERE itmId =" . $itmId;
    //     $result = mysqli_query($database, $sql);
}

echo $_GET['id'];

mysqli_close($database);
header('Location: index.php');
?>