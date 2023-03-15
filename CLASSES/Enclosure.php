<?php
class Enclosure {
        private $db;
        
        public function __construct($db) {
            $this->db = $db;
        }
        
        public function getEnclosures() {
            $sql = "SELECT * FROM enclosures";
            $stmt = $this->db->query($sql);
            
            $enclosures = [];
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    $enclosures[] = [
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'tide_index' => $row['tide_index'],
                        'a1_name' => $row['a1_name'],
                        'a2_name' => $row['a2_name'],
                        'a3_name' => $row['a3_name'],
                        'a4_name' => $row['a4_name'],
                        'a5_name' => $row['a5_name'],
                        'a6_name' => $row['a6_name'],
                    ];
                }
            }
            
            return $enclosures;
        }
    }
?>