<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
class convertir_nombre_lettre {
    function convertir_nombre($nombre) {
        if (($nombre < 0) || ($nombre > 999999999)) {
            throw new Exception("nombre supérieur !!!");
        }
        $giga = floor($nombre / 1000000);
        // Millions (giga)
        $nombre -= $giga * 1000000;
        $kilo = floor($nombre / 1000);
        // Thousands (kilo)
        $nombre -= $kilo * 1000;
        $hecto = floor($nombre / 100);
        // Hundreds (hecto)
        $nombre -= $hecto * 100;
        $deca = floor($nombre / 10);
        // Tens (deca)
        $n = $nombre % 10;
        // Ones
        $result = "";
        if ($giga) {
            $result .= $this->convertir_nombre($giga) .  " Million";
        }
        if ($kilo) {
            $result .= (empty($result) ? "" : " ") .$this->convertir_nombre($kilo) . " Mille";
        }
        if ($hecto) {
            $result .= (empty($result) ? "" : " ") .$this->convertir_nombre($hecto) . " Cent";
        }
        $ones = array("", "un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf", "dix", "onze", "douze", "treize", "quatorze", "quinze", "seize", "dix-sept", "dix-huit", "dix-neuf");
        
        $tens = array("", "", "vingt", "trente", "quarante", "cinquante", "soixante", "soixante-dix", "quatre-vingt", "quatre-vingt-dix");
        if ($deca || $n) {
            if (!empty($result)) {
                $result .= " et ";
            }
            if ($deca < 2) {
                $result .= $ones[$deca * 10 + $n];
                
            } else {
                $result .= $tens[$deca];
                if ($n) {
                    $result .= "-" . $ones[$n];
                }
/*                if ($result== 71) {
                $result .= 'soixante-et-onze';                
                }  */              
                
            }
        }
        if (empty($result)) {
            $result = "zero";
        }
        return $result;
    }
}
?>