<?php
    namespace App\model;
    
    #-> Class 'Business'
    final class Business {
        # Variables
        private $id;
        private $name;
        private $money;
        private $isManaged;
        private $idManager;
        private $idDomain;
        private $idUser;

        # Functions
        public function __construct($id, $name, $money, $isManaged, $idManager, $idDomain, $idUser) {
            $this->id = $id;
            $this->name = $name;
            $this->money = $money;
            $this->isManaged = $isManaged; 
            $this->idManager = $idManager;
            $this->idDomain = $idDomain; 
            $this->idUser = $idUser;
        }

        public function getID() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getMoney() {
            return $this->money;
        }

        public function getIsManaged() {
            return $this->isManaged;
        }

        public function getIdManager() {
            return $this->idManager;
        }

        public function getIdDomain() {
            return $this->idDomain;
        }

        public function getIdUser() {
            return $this->idUser;
        }
    }
?>
