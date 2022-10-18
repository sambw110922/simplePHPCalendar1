<?php

    //  Returns the number of days in he month
    function GetDaysInMonth($monthNumber, $yr){

        $daysInMonth = 0;

        $calendar = CAL_GREGORIAN;
         
        $daysInMonth = cal_days_in_month($calendar, $monthNumber, $yr);

        return $daysInMonth;

    }

    //  Displays the days in the month.
    function DisplayDaysInMonth($monthNumber, $yr){

        echo "<hr/>";

        $daysInMonth = 0;

        $calendar = CAL_GREGORIAN;
         
        $daysInMonth = cal_days_in_month($calendar, $monthNumber, $yr);

        for($i = 1; $i <= $daysInMonth; $i++){

            //  American date formats, sadly
            $newDateStr = $monthNumber . "/" . $i . "/" . $yr; 
            
            GetDateString($newDateStr);
            echo "<p>" . $newDateStr . "</p>";

        }

        echo "<hr/>";
    }


    function GetDateString($dstr){

        $day = date("D", strtotime($dstr));

        echo "<p>" . $day . "</p>";

    }

?>