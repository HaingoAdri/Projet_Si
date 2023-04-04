<?php 
    if ( ! function_exists('checkLogin')) {
        function checkLogin($mail, $pswd){
            if(valid_email($mail) && $pswd!=""){
                return true;
            }
            return false;
        }
    } 

    if ( ! function_exists('checkCompte')) {
        function checkCompte($tab){
            if($tab['count'] != 0){
                return true;
            }
            return false;
        }
    } 

?>