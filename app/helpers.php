<?php

if(!function_exists('moneyFormat')) {
    function moneyFormat($value, $isCurrency = false){
        $number = 0;
        if($value !== null && $value !== "" && !is_nan($value)){
            $value = floatval($value);
            $number = number_format($value, 2, ',', '.');

            if($isCurrency){
                $number = "R$ ".$number;
            }
        }
        return $number;
    }
}
