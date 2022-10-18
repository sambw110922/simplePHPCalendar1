<?php

    //  Check if year is leap year.
    //  A leap year is if the year is divisible by 4, or if 
    //  it is a century year then it is divisible by 400
    function CheckLeapYear($year){

        $isLeapYear = false;

        if($year % 4 == 0 || $year % 400 == 0){
            $isLeapYear = true;
        }

        return $isLeapYear;

    }

    //  Returns the month values on request.
    function MonthValues($year){

        //  Check if it is a leap year.
        $isLeapYear = CheckLeapYear($year);

        //  Number of days in each month of the year:
        $jan = [ "nameOfMonth" => "January", "numberOfMonth" => 1, "daysInMonth" => 31 ];
        $feb = [ "nameOfMonth" => "Feburary", "numberOfMonth" => 2, "daysInMonth" => 28 ];
        $mar = [ "nameOfMonth" => "March", "numberOfMonth" => 3, "daysInMonth" => 31 ];
        $apr = [ "nameOfMonth" => "April", "numberOfMonth" => 4, "daysInMonth" => 30 ];
        $may = [ "nameOfMonth" => "May", "numberOfMonth" => 5, "daysInMonth" => 31 ];
        $jun = [ "nameOfMonth" => "June", "numberOfMonth" => 6, "daysInMonth" => 30 ];
        $jul = [ "nameOfMonth" => "July", "numberOfMonth" => 7, "daysInMonth" => 31 ];
        $aug = [ "nameOfMonth" => "August", "numberOfMonth" => 8, "daysInMonth" => 31 ];
        $sep = [ "nameOfMonth" => "September", "numberOfMonth" => 9, "daysInMonth" => 30 ];
        $oct = [ "nameOfMonth" => "October", "numberOfMonth" => 10, "daysInMonth" => 31 ];
        $nov = [ "nameOfMonth" => "November", "numberOfMonth" => 11, "daysInMonth" => 30 ];
        $dec = [ "nameOfMonth" => "December", "numberOfMonth" => 12, "daysInMonth" => 31 ];

        //  If it is a leap year, then the number of days in 
        //  feburary is 29 instead of 28.
        if($isLeapYear == true){
            $feb["daysInMonth"] = 29;
        }

        //  One year array
        $oneYear = [
            $jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec
        ];

        return $oneYear;

    }

    //  Forms a date string
    function GetDateString($day, $month, $year, $isUKFormat){

        $dateStr = "0/0/0000";

        if($isUKFormat == true){

            $dateStr = $day . "/" . $month . "/" . $year;

        } else {

            $dateStr = $month . "/" . $day . "/" . $year;

        }

        return $dateStr;

    }

    //  Returns a date object
    function GetDateObject($day, $month, $year){

        $dateObj = new DateTime();

        $dateObj->format("D/M/Y");

        $dateObj->setDate($year, $month, $day);

        return $dateObj->getTimestamp();

    }

    //  Generates the tables
    function GenerateTables($year){

        $months = MonthValues($year);

        //  todo: fix the weeks, because they're
        //  not carrying over

        //  The colour of the week.
        $colourWeek = "greenWeek";

        foreach($months as $month){

            echo '<div id="' . $month["nameOfMonth"] . '" class="' . "month" . '"';
            echo '>';

            echo '<h2>' . $month["nameOfMonth"] . '</h2>';

            $wkCntr = 1;

            $tableNumber = "tblMonth" . $month[$i]["numberOfMonth"];

            echo '<table name="' . $tableNumber . '">';

            echo '<tr>';
            
            echo '<th>Monday</th>';
            echo '<th>Tuesday</th>';
            echo '<th>Wednesday</th>';
            echo '<th>Thursday</th>';
            echo '<th>Friday</th>';
            echo '<th>Saturday</th>';
            echo '<th>Sunday</th>';

            for($i = 1; $i <= $month["daysInMonth"]; $i++){

                if($wkCntr == 1){
                    echo "<tr>";
                }

                //  Get the data object
                $dateObj = GetDateObject($i, $month["numberOfMonth"], $year);

                //  Gets what day the date is
                $dayString = date("D", $dateObj);

                if($i == 1){

                    //  Depending on what day it is, echo the date as 
                    //  well as any other extra days in calendar and then set
                    //  the weekCounter according to the day
                    switch($dayString){

                        case "Mon":

                            $wkCntr = 1;

                            echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                        break;
    
                        case "Tue":

                            $wkCntr = 2;

                            echo "<td></td>";
                            echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                        break;
    
                        case "Wed":

                            $wkCntr = 3;

                            echo "<td></td>";
                            echo "<td></td>";
                            echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                        break;
                        
                        case "Thu":

                            $wkCntr = 4;

                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";

                            echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                        break;
    
                        case "Fri":

                            $wkCntr = 5;

                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";

                            echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                        break;
    
                        case "Sat":

                            $wkCntr = 6;

                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";

                            echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                        break;
    
                        case "Sun":

                            $wkCntr = 7;

                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";

                            echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                        break;
    
                    }

                } else {

                    //  If not first of the month then do this
                    echo '<td class="' . $colourWeek . '">' . $i . "</td>";

                }

                //  At end of the week reset the week counter
                if($wkCntr == 7){

                    echo "</tr>";
                    $wkCntr = 1;

                } else {
                    $wkCntr++;
                }

                
            }

            echo '</tr>';
            echo '</table>';
            echo '</div>';

        }

    }
    
?>