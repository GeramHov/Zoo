<?php
class Enclosure 
{
        private $id;
        private $name;
        private $tideIndex;
// ADD A ENCLOSURE ANIMAL COUNT LIMITED TO 6
        private $animals = []; 
        
        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        
        public function hydrate(array $data) {
            $this->setId($data['id']);
            $this->setName($data['name']);
            $this->setTideIndex($data['tide_index']);
        }
        
        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getTideIndex()
        {
                return $this->tideIndex;
        }

        public function setTideIndex($tideIndex)
        {
                $this->tideIndex = $tideIndex;

                return $this;
        }

        public function getAnimals()
        {
                return $this->animals;
        }

        public function setAnimals($animals)
        {
                $this->animals [] = $animals;

                return $this;
        }
    }
?>