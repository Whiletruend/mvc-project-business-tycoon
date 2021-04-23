<?php
    #-> Class 'Domain'
    final class Domain {
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
    }
?>