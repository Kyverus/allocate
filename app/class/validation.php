<?php
    function validateData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function validateDecimal($data){
        $data = trim($data);
        $data = stripslashes($data);

        $pattern = '/^[-\\+]?\s*((\d{1,3}(,\d{3})*)|\d+)(\.\d{2})?$/'; //Regex to check for currency
        if (preg_match($pattern, $data) == 1){
            $final = str_replace(",", "", $data); //remove commas
            return $final;
        }else{
            return "";
        }       
    } 

?>