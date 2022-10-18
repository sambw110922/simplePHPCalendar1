<?php

    //  This function gets next year.
    function GetNextYear(){

        $currentDate = date("Y");
        $currentPlusOne = $currentDate + 1;

        return $currentPlusOne;

    }

?>