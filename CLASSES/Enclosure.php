<?php
    class Enclosure
    {
        private $name;
        private $tideIndex;
        private $animalsQuantity;

        public function __construct(array $data)
        {
            if($data['animalsQuantity'] <= 6){
                $this->animalsQuantity = $data['animalsQuantity'];
            } else {
                echo 'Too much animals in this enclosure!';
            }

            $this->name = $data['name'];

            $this->tideIndex = $data['tideIndex'];


        }

        public function getAnimalsQuantity()
        {
                return $this->animalsQuantity;
        }

        public function setAnimalsQuantity($animalsQuantity)
        {
                $this->animalsQuantity = $animalsQuantity;

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
    }
?>