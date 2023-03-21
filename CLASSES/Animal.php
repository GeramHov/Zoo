<?php
    class Animal
    {
        private $id;
        private $specie_name;
        private $specie_type;
        private $size;
        private $weight;
        private $age;
        private $enclosure_id;
        private $icon;
        private $sound;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function hydrate(array $data) {
                $this->setId($data['id']);
                $this->setSpecieType($data['specie_type']);
                $this->setSpecieName($data['specie_name']);
                $this->setSize($data['size']);
                $this->setWeight($data['weight']);
                $this->setAge($data['age']);
                $this->setEnclosureId($data['enclosure_id']);
                $this->setIcon($data['icon']);
                $this->setSound($data['sound']);
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

        public function getSpecieName()
        {
                return $this->specie_name;
        }

        public function setSpecieName($specie_name)
        {
                $this->specie_name = $specie_name;

                return $this;
        }

        public function getSpecieType()
        {
                return $this->specie_type;
        }

        public function setSpecieType($specie_type)
        {
                $this->specie_type = $specie_type;

                return $this;
        }

        public function getSize()
        {
                return $this->size;
        }

        public function setSize($size)
        {
                $this->size = $size;

                return $this;
        }

        public function getWeight()
        {
                return $this->weight;
        }

        public function setWeight($weight)
        {
                $this->weight = $weight;

                return $this;
        }

        public function getAge()
        {
                return $this->age;
        }

        public function setAge($age)
        {
                $this->age = $age;

                return $this;
        }

        public function getEnclosureId()
        {
                return $this->enclosure_id;
        }

        public function setEnclosureId($enclosure_id)
        {
                $this->enclosure_id = $enclosure_id;

                return $this;
        }

        public function getIcon()
        {
                return $this->icon;
        }

        public function setIcon($icon)
        {
                $this->icon = $icon;

                return $this;
        }

        public function getSound()
        {
                return $this->sound;
        }

        public function setSound($sound)
        {
                $this->sound = $sound;

                return $this;
        }
    }
?>