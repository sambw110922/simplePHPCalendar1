<?php

    //  This class represents a month 
    class TheMonth {

        //  The actual month 
        public $month;

        //  The month name
        public $monthName;

        //  days of the month
        public $days;

        //  Constructor
        public function __construct($month){
            $this->month = $month;
            $this->days = array();
        }

        //  Adds a day
        public function AddDay($day){
            array_push($this->days, $day);
        }

        //  Sets the month name.
        public function SetMonthName($monthName){
            $this->monthName = $monthName;
        }


    }

?>