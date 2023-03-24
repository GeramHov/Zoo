<?php
class EnclosureManager {
        private $db;
        
        public function __construct($db) {
            $this->db = $db;
        }
        
        // GET ALL ENCLOSURES
        public function getEnclosures() {
            $sql = "SELECT * FROM enclosures";
            $stmt = $this->db->query($sql);
            
            $enclosures = [];
            $allEnclosures = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($allEnclosures as $data) {
                $enclos = new Enclosure($data);
                $this->getAnimalFromEnclosure($enclos);
                
                $enclosures[] = $enclos;
            }

            return $enclosures;
        }

        // GET THE ENCLOSURE BY IT'S ID
        public function getEnclosureById($id)
        {
            $sql = "SELECT * FROM enclosures WHERE id = '$id'";
            $statement = $this->db->query($sql);
            $data = $statement->fetch();

            $enclos = new Enclosure($data);
           
            return $enclos;
        }

        // GETTING ALL THE ANIMALS FROM GIVEN ENCLOSURE
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

        // SOILING AN ENCLOSURE BY IT'S ID
        public function addDirtToEnclosure($id)
        {
            $query = $this->db->prepare("UPDATE enclosures SET tide_index = tide_index - 1 WHERE id = '$id'");
            $query->execute();
        }

        // PRETTY DUMP FUNCTION
        public function prettyDump($data){
            highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
        }
    }
?>