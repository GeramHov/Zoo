<?php

class AnimalManager {
    private $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // GET ALL ANIMALS
    public function getAnimals() {
        $sql = "SELECT * FROM animals";
        $statement = $this->db->query($sql);
        
        $animals = [];
        $allAnimals = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allAnimals as $animal) {
            $animals[] = new Animal($animal);
        }
    
        return $animals;
    }

    // ADDING AN ANIMAL TO THE DATABASE TABLE
    public function addAnimal($specie_type, $specie_name, $size, $weight, $age, $enclosure_name, $icon, $sound) {
        $statement = $this->db->prepare("
            INSERT INTO animals (specie_type, specie_name, size, weight, age, enclosure_name, icon, sound)
            VALUES (:specie_type, :specie_name, :size, :weight, :age, :enclosure_name, :icon, :sound)
        ");
        $statement->bindValue(':specie_type', $specie_type);
        $statement->bindValue(':specie_name', $specie_name);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':weight', $weight);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':enclosure_name', $enclosure_name);
        $statement->bindValue(':icon', $icon);
        $statement->bindValue(':sound', $sound);

        if (!$statement->execute()) {
            $error = $statement->errorInfo();
            echo "<div class='container-fluid text-center' style='background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(36,37,17,1) 17%, rgba(6,69,24,1) 47%, rgba(13,116,84,1) 72%, rgba(27,122,118,1) 85%, rgba(14,122,126,1) 94%, rgba(1,73,88,1) 100%); border-bottom: 1px solid white'>
            <p class='text-light'>Error adding animal:". $error[2] ."</p>
            </div>";
        } else {
            echo "<div class='container-fluid text-center' style='background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(36,37,17,1) 17%, rgba(6,69,24,1) 47%, rgba(13,116,84,1) 72%, rgba(27,122,118,1) 85%, rgba(14,122,126,1) 94%, rgba(1,73,88,1) 100%); border-bottom: 1px solid white'>
            <p class='text-light'>Animal added successfully!</p>
            </div>";
        }
    }

    // PRETTY DUMP FUNCTION
    public function prettyDump($data){
        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    }
}
?>