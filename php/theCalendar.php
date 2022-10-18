<?php

require_once("theYear.php");
require_once("theMonth.php");
require_once("theDay.php");

    //  Represents the calendar
    class TheCalendar {

        //  The months array
        public $months;

        //  The number of months to generate.
        public $numberOfMonths;

        //  Can only generate this numbre of months
        public $monthGenerateLimit;

        public function __construct($noMonths){
            $this->numberOfMonths = $noMonths;
            $this->monthGenerateLimit = 6;
            $this->months = array();
        }

        //  Start generating the months.
        public function GenerateMonths($currentDate){
            
            //  Get the current month number
            $month = date("m", strtotime($currentDate));

            //  How many months I want to add to the date string
            $plustr = "+" . $this->numberOfMonths . " months";

            //  The date plus number of months from now
            $monthPlus = date("d/M/Y", strtotime($plustr));

            echo $monthPlus;

        }

    }

?>