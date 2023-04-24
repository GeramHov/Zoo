<?php
    require_once('CONFIG/autoload.php');
    require_once('CONFIG/database.php');
    
        // ADDING GIVEN ANIMAL TO ENCLOSURE
        
        $manager = new Worker($db);
        $message = $manager->AddAnimalInEnclosure($_GET['specie_type'], $_GET['animals_quantity']);
    
        header('Location: ./enclosures.php?message='. $message .'');
?>