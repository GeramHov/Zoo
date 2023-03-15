<?php
    class Animal
    {
        private $weight;
        private $size;
        private $age;

        // GETTERS & SETTERS START
        public function getWeight()
        {
                return $this->weight;
        }

        public function setWeight($weight)
        {
                $this->weight = $weight;

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

        public function getAge()
        {
                return $this->age;
        }

        public function setAge($age)
        {
                $this->age = $age;

                return $this;
        }
        // GETTERS & SETTERS END
    }
?>