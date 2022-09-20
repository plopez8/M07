<?php
    $sp = "kfhxivrozziuortghrvxrrkcrozxlwflrh";
    $mr = " hv ovxozwozv vj o vfrfjvivfj h vmzvlo e hrxvhlmov oz ozx.vw z xve hv loqvn il hv lmnlg izxvwrhrvml ,hv b lh mv,rhhv mf w zrxvlrh.m";
   
    echo decrypt($sp);
    echo "<br>";
    echo decrypt($mr);

    
    
    seperarString($mr);
    function seperarString($stringaseperar){
        $arr1 = str_split($stringaseperar, 3);
        return $arr1;
    }

function decrypt($sp){
    $ar = seperarString($sp);
    $a = 0;
    $arrLength = count($ar);
    $full = "";
    for ($a = 0;$a < $arrLength;$a++){
        $i = 2;

    while ($i >= 0) {
        if (strlen($ar[$a]) > $i){
        $character1 = seperarCharacter($ar[$a], $i);        
        $full = $full.girarascii($character1);
        }
        $i--;
   }
    }
   return $full;
}    

    function seperarCharacter($arr1, $i){    
        
        $arr2 = str_split($arr1);
        $ch1 = implode("",str_split($arr2[$i]));     
        $ascii = ord($ch1);     
        return $ascii;        
    }
    function girarascii($ch){
        if($ch == 32 || $ch == 44 || $ch == 46 ){
        return chr($ch);    
        }    
        $ascci2 = 109 - $ch;
        $ascci2 = $ascci2 + 110;
        $caracter = chr($ascci2);
        return $caracter;
    }

?>