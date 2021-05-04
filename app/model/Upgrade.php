<?php
    namespace App\model;
    
    #-> Class 'Upgrade'
    final class Upgrade {
        # Variables
        private $id;
        private $name;
        private $description;
        private $cost;

        # Functions
        public function __construct($id, $name, $description, $cost) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->cost = $cost;
        }

        public function getID() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getCost() {
            return $this->cost;
        }
    }
?>