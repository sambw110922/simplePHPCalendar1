<?php

    //  This class represents one year.
    class TheYear {

        //  The actual year, eg 2022
        public $year;

        //  The month objects
        public $months;

        public function __construct($year){
            $this->year = $year;
            $this->months = array();
        }

        //  Add a month
        public function AddMonth($month){
            array_push($this->months, $month);
        }

    }

?>