<?php include('../include/bddCo.php'); ?>
<?php include('../include/funcCreateFileName.php'); ?>
<?php include('../include/funcResizeImg.php'); ?>





<?php
if (isset($_POST['traitAjout'])) {
    $itmTitre = "";
    $itmTxt = "";
    $itmImg = "";
    $itmDate = date('Y-m-d',);
    $itmId = 0;

    if (isset($_POST['itmId']) && $_POST['itmId'] > 0) {
        $itmId = $_POST['itmId'];
    }
    if ($itmId > 0) {
        $sql = "SELECT * FROM tblarticle WHERE itmId =" . $itmId;
        $recordset = mysqli_query($database, $sql);
        if ($row = mysqli_fetch_array($recordset)) {
            $itmTitre = $row['itmTitre'];
            $itmTxt = $row['itmTxt'];
            $itmImg = $row['itmImg'];
            $itmDate = $row['itmDate'];
        }
    }

    if (isset($_POST['itmTitre']) && $_POST['itmTitre'] != '') {
        $itmTitre = $_POST['itmTitre'];
        $itmTitre = str_replace("'", "\'", $itmTitre);
    }
    if (isset($_POST['itmTxt']) && $_POST['itmTxt'] != '') {
        $itmTxt = $_POST['itmTxt'];
        $itmTxt = str_replace("'", "\'", $itmTxt);
    }
    if (isset($_FILES['itmImg'])) {
        if ($itmId > 0 && $itmImg != '' && $_FILES['itmImg']['name'] != '') {
            //foreach de size array unlink 
            foreach ($sizeArray as $key => $value) {
                $file = '../../upload/' . $key . '_' . $itmImg;
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
        if ($_FILES['itmImg']['name'] != '') {
            $ext = substr($_FILES['itmImg']['name'], strrpos($_FILES['itmImg']['name'], ".") + 1); //function pour extraire l'extension de l'image
            $itmImg = createFileName($itmTitre, '../../upload/', $ext, $sizeArray); // cleanFileName fonction à creer pour modifier le nom du fichier et ajouter le tout pour la requete sql
            move_uploaded_file($_FILES['itmImg']['tmp_name'], "../../upload/" . $itmImg);
            resizeImg($itmImg, '../../upload/', $sizeArray); // createThumbnails fonction à creer pour modifier la taille des fichier et supprimer le fichier original crop 
        }
    }

    if ($itmId > 0) {
        $query = " UPDATE tblarticle
                SET itmTitre = '" . $itmTitre . "',
                itmTxt = '" . $itmTxt . "' ,
                itmImg = '" . $itmImg . "'  
                WHERE itmId = " . $itmId;
    } else {
        $query = "INSERT INTO tblarticle (itmTitre,itmTxt,itmImg,itmDate) 
        VALUES ('" . $itmTitre . "', '" . $itmTxt . "','" . $itmImg . "','" . $itmDate . "')";
    }
    mysqli_query($database, $query);
}



mysqli_close($database);
header('Location: index.php');
?>
