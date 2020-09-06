<?php include('../include/bddCo.php'); ?>
<?php include('../include/protect.php'); ?>

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
        </div>
        <div>
            <div> <a href="formad.php"><button>ajout article</button></a></div>
            <div><?php include('../include/navlat.php'); ?></div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Texte</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $query = "SELECT * FROM tblarticle ORDER BY itmId DESC";
                    $recordset = mysqli_query($database, $query);
                    ?>
                    <?php while ($bd = mysqli_fetch_array($recordset)) { ?>
                        <tr>
                            <td width="200">
                                <?php echo $bd['itmTitre']; ?>
                            </td>
                            <td><img src="../../upload/sm_<?php echo $bd["itmImg"]; ?>" class="img-fluid" alt=""></td>
                            <td width="100"><?php echo $bd['itmDate']; ?></td>
                            <td width="200"><?php echo $bd['itmTxt']; ?></td>
                            <td width="20"><?php echo $bd['itmLike']; ?></td>
                            <td width="20"><?php echo $bd['itmNbVue']; ?></td>
                            <td>
                                <a href="formad.php?id=<?php echo $bd['itmId']; ?>"><button><i class="fas fa-pen-square"></i></button></a>
                                <a href="suppression.php?id=<?php echo $bd['itmId']; ?>"><button><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
</body>
<script src="../js/jQuery.js"></script>
<script src="../js/Popper.js"></script>
<script src="../js/bootstrap.js"></script>

</html>