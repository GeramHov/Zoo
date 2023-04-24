<?php
    require_once('CONFIG/autoload.php');
    require_once('CONFIG/database.php');

$manager = new Worker($db);
$manager->cleanUp($_GET['id']);

header('Location: ./fence_'. $_GET['fence_name'] .'.php');

?>