<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if ( ! function_exists('ma_fonction')) {
        function compteVola($vola, $porcentage){
            echo  $vola . ' ===> ' . (($vola * $porcentage) / 100) . 'Ar';
        }
    } 
?>