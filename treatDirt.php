<?php
    require_once('CONFIG/autoload.php');
    require_once('CONFIG/database.php');

    $manager = new EnclosureManager($db);
    $addDirt = $manager->addDirtToEnclosure($_GET['id']);
?>