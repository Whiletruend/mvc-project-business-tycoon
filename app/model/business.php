<?php
    #-> Class 'Business'
    final class Business {
        # Variables
        private $id;
        private $name;
        private $money;
        private $income;
        private $employee_amount;
        private $work_amount;
        private $isManaged;
        private $idManager;
        private $idDomain;
        private $idUser;

        # Functions
        public function __construct($id, $name, $money, $income, $employee_amount, $work_amount, $isManaged, $idManager, $idDomain, $idUser) {
            $this->id = $id;
            $this->name = $name;
            $this->money = $money;
            $this->income = $income;
            $this->employee_amount = $employee_amount;
            $this->work_amount = $work_amount;
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

        public function getIncome() {
            return $this->income;
        }

        public function getEmpAmount() {
            return $this->employee_amount;
        }

        public function getWorkAmount() {
            return $this->work_amount;
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