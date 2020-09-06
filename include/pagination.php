<?php
$nb = 3;
$page = 1;
if (isset($_GET['page']) && $_GET['page'] >= 0 && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
}
$sql = "SELECT * FROM tblarticle";
$recordset = mysqli_query($database, $sql);
$total = mysqli_num_rows($recordset);
$sql = "SELECT * FROM tblarticle ORDER BY itmID DESC LIMIT " . (($page - 1) * $nb) . ", " . $nb . ";";
$recordset = mysqli_query($database, $sql);
?>
<?php
for ($i = 1; $i < $nb; $i++) {  ?>
    <a href="index.php?page=<?= $i; ?>" class="btn btn-default"><?= $i; ?></a>
<?php }
?>