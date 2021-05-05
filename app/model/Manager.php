<?php
    namespace App\model;
    
    #-> Class 'Manager'
    final class Manager {
        # Variables
        private $id;
        private $name;

        # Functions
        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }

        public function getID() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }
    } 
?>