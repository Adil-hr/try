<?php
session_start();
?>
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "deis";

$database = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
echo mysqli_connect_error();
mysqli_set_charset($database, 'utf8');
if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
