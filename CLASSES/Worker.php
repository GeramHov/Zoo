<?php
    class Worker
    {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
        
    public function RemoveAnimalFromEnclosure() {
        if (isset($_GET['enclosure_id'], $_GET['id']) && !empty($_GET['enclosure_id']) && !empty($_GET['id'])) {
            $enclosureId = $_GET['enclosure_id'];
            $animalId = $_GET['id'];
            $status = $this->db->prepare("UPDATE animals SET enclosure_id = 0 WHERE enclosure_id = :enclosure_id AND id = :animal_id");
            $status->bindParam(':enclosure_id', $enclosureId);
            $status->bindParam(':animal_id', $animalId);
            $status->execute();
        }
    }
    
    }

    // REMOVING ANIMAL FROM GIVEN ENCLOSURE 

    require_once('../CONFIG/database.php');
    $manager = new Worker($db);
    $removeAnimal = $manager->RemoveAnimalFromEnclosure();

    header('Location: ../enclosures.php');
?>