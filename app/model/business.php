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
        private $idUser;

        # Functions
        public function __construct($id, $name, $money, $income, $employee_amount, $work_amount, $isManaged, $idManager, $idUser) {
            $this->id = $id;
            $this->name = $name;
            $this->money = $money;
            $this->income = $income;
            $this->employee_amount = $employee_amount;
            $this->work_amount = $work_amount;
            $this->isManaged = $isManaged;
            $this->idManager = $idManager;
            $this->idUser = $idUser;
        }
    }
?>