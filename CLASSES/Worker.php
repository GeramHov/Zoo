<?php
    class Worker
    {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    // REMOVING ANIMAL FROM ENCLOSURE 
    public function RemoveAnimalFromEnclosure() {
        if (isset($_GET['enclosure_id'], $_GET['id']) && !empty($_GET['enclosure_id']) && !empty($_GET['id'])) {
            $enclosureId = $_GET['enclosure_id'];
            $animalId = $_GET['id'];
            $status = $this->db->prepare("UPDATE animals SET enclosure_id = null WHERE enclosure_id = :enclosure_id AND id = :animal_id");
            $status->bindParam(':enclosure_id', $enclosureId);
            $status->bindParam(':animal_id', $animalId);
            $status->execute();
        }
    }

    // ADDING ANIMAL TO AN ENCLOSURE
    public function AddAnimalInEnclosure($specie_type, $enclosure_count) {
        if (isset($_GET['enclos_id'], $_GET['animal_id']) && !empty($_GET['enclos_id']) && !empty($_GET['animal_id']) && $_GET['specie_type'] && !empty($_GET['specie_type'])) {

            $enclosureId = $_GET['enclos_id'];
            $animalId = $_GET['animal_id'];
            $specie_type = $_GET['specie_type'];

            if(substr($enclosure_count, -1) < 6){
                
                if ($specie_type == 'reptile' && in_array($enclosureId, [2, 3, 4, 6, 7])) {
                    // ENECLOSURE IS NOT ALLOWED FOR REPTILES
                    $message = 'Ooo, Sir we cannot place these kind of animals together!!!';
                    return $message;
                }
                if ($specie_type == 'mammal' && in_array($enclosureId, [5, 6, 7])) {
                    // ENECLOSURE IS NOT ALLOWED FOR MAMMALS
                    $message = 'Ooo, Sir we cannot place these kind of animals together!!!';
                    return $message;
                }
                if ($specie_type == 'fish' && in_array($enclosureId, [1, 2, 3, 4, 5, 6])) {
                    // ENECLOSURE IS NOT ALLOWED FOR FISHES
                    $message = 'Ooo, Sir we cannot place these kind of animals together!!!';
                    return $message;
                }
                if ($specie_type == 'whale' && in_array($enclosureId, [1, 2, 3, 4, 5, 6])) {
                    // ENECLOSURE IS NOT ALLOWED FOR WHALES
                    $message = 'Ooo, Sir we cannot place these kind of animals together!!!';
                    return $message;
                }
                if ($specie_type == 'bird' && in_array($enclosureId, [1, 2, 3, 4, 5, 7])) {
                    // ENECLOSURE IS NOT ALLOWED FOR BIRDS
                    $message = 'Ooo, Sir we cannot place these kind of animals together!!!';
                    return $message;
                }
                if ($specie_type == 'antelope' && in_array($enclosureId, [1, 4, 5, 6, 7])) {
                    // ENECLOSURE IS NOT ALLOWED FOR ANTELOPES
                    $message = 'Ooo, Sir we cannot place these kind of animals together!!!';
                    return $message;
                }
                if ($specie_type == 'feline' && in_array($enclosureId, [2, 5, 6, 7])) {
                    // ENECLOSURE IS NOT ALLOWED FOR FELINES
                    $message = 'Ooo, Sir we cannot place these kind of animals together!!!';
                    return $message;
                }

                $status = $this->db->prepare("UPDATE animals SET enclosure_id = ? WHERE id = ?");
                $status->execute([$enclosureId, $animalId]);
                return $message = "The animal has been successfully moved!";

            } else {
                return $message = "Sorry Sir for being stubborn, but we cannot place more than 6 animals at the same enclosure!";
            }   
         }
    }

    // CLEANING ENCLOSURE UP
    public function cleanUp($enclosureId)
    {
       $enclosureId = $_GET['id']; 
       $query = $this->db->prepare("UPDATE enclosures SET tide_index = 3 WHERE id = :id");
       $query->bindParam(':id', $enclosureId);
       $query->execute();
    }

    // CALCULATE THE COUNT OF ANIMALS BY AN ENCLOSURE
    public function CalculateAnimalsInEveryEnclosure()
    {
        $sql = "SELECT enclosure_id, COUNT(*) AS count FROM animals WHERE enclosure_id IS NOT NULL GROUP BY enclosure_id";
        $status = $this->db->prepare($sql);
        $status->execute();
        $counts = $status->fetchAll(PDO::FETCH_ASSOC);
    
        $sql = "UPDATE enclosures SET animals_quantity = :count WHERE id = :enclosure_id";
        $status = $this->db->prepare($sql);
    
        foreach ($counts as $count) {
            $status->bindValue(':count', $count['count']);
            $status->bindValue(':enclosure_id', $count['enclosure_id']);
            $status->execute();
        }
        
    }
}    
?>