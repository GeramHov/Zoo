<?php
class EnclosureManager {
        private $db;
        
        public function __construct($db) {
            $this->db = $db;
        }
        
        public function getEnclosures() {
            $sql = "SELECT * FROM enclosures";
            $stmt = $this->db->query($sql);
            
            $enclosures = [];
            $allEnclosures = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($allEnclosures as $data) {
                $enclos = new Enclosure($data);
                $animals = $this->getAnimalFromEnclosure($enclos);
                $enclos->setAnimals($animals);
                $enclosures[] = $enclos;
            }

            return $enclosures;
        }

        public function getEnclosureById($id)
        {
            $sql = "SELECT * FROM enclosures WHERE id = '$id'";
            $statement = $this->db->query($sql);
            $data = $statement->fetch();

            $enclos = new Enclosure($data);
           
            return $enclos;
        }

         public function getAnimalFromEnclosure(Enclosure $enclos)
        {
            $query = $this->db->prepare("SELECT * FROM animals where enclosure_id = ?");
            $query->execute([$enclos->getId()]);
            $animals = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($animals as $key => $data) {
                $animal = new Animal($data);
                $enclos->setAnimals($animal);
            }
        }

        public function prettyDump($data){
            highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
        }
    }
?>