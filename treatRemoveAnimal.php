<?php
    require_once('CONFIG/autoload.php');
    require_once('CONFIG/database.php');
    
    $manager = new Worker($db);
    $removeAnimal = $manager->RemoveAnimalFromEnclosure();
    
    header('Location: ./enclosures.php');
    
    // REMOVING ANIMAL FROM GIVEN ENCLOSURE 