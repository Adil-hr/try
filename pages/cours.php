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
        <?php
        $cours = ['guitare', 'saxophone', 'chant', 'Flûte traversière', 'Percussion', 'Piano', 'Violoncelle', 'Violon'];

        echo '<div class="row">';
        for ($i = $cours; $i < sizeof($cours); $i++) {
            echo '<div class="col-3>' . $i . '</div>';
        }
        echo '</div>';
        ?>
    </main>
    <?php include('../include/footer.php'); ?>
    <?php include('../include/script.php'); ?>
</body>

</html>