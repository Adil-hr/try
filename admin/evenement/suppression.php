<?php include('../include/bddCo.php'); ?>
<?php include('../include/funcResizeImg.php'); ?>
<?php if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
} ?>

<?php

if (isset($_GET['id']) && $_GET['id'] > 0 && is_numeric($_GET['id'])) {
    $itmId = $_GET['id'];
    $sql = "SELECT * FROM tblarticle WHERE itmId = " . $itmId;
    $recordset = mysqli_query($database, $sql);
    if ($row = mysqli_fetch_array($recordset)) {
        $itmImg = $row['itmImg'];
        if ($itmImg != '') {
            foreach ($sizeArray as $key => $value) {
                $file = '../../upload/' . $key . '_' . $itmImg;
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
        $sql = "DELETE FROM tblarticle WHERE itmId =" . $itmId;
        $result = mysqli_query($database, $sql);
    }
}
echo $_GET['id'];

mysqli_close($database);
header('Location: index.php');
?>