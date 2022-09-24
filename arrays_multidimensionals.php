<?php
$matriu=(creaMatriu(4));
print mostraMatriu($matriu);
print mostraMatriu(transposaMatriu($matriu));


    function creaMatriu($n){
        $matriu = [[]];
        for($a = 0; $a < $n; $a++ ){
            for($b = 0; $b < $n; $b++ ){
                if ($a == $b){
                    $matriu[$a][$b]="*";
                } elseif ( $a > $b) {
                    $matriu[$a][$b]=rand(10,20);
                } elseif  ($a == 0 && $a != $b){
                    $matriu[$a][$b]=$b;
                } else {
                    $suma = $matriu[$a-1][$b] + $matriu[0][1];
                    $matriu[$a][$b]=$suma;
                }
            }
        }
        return $matriu;
    }


    function mostraMatriu($matriu){
        $size = count($matriu[0]);
        $table = '<table>';
        for($a = 0; $a < $size; $a++ ){
            $table = $table.'<tr>';
            for($b = 0; $b < $size; $b++ ){
                $table = $table.'<td style="border: 1px solid #000000;">'.$matriu[$a][$b]."</td>";
            }
            $table = $table."</tr>";
        }
        $table = $table."</table>";
        return $table;
    }


    function transposaMatriu($matriu){
        $matriu2 = [[]];
        $size = count($matriu[0]);
        for($a = 0; $a < $size; $a++ ){
            for($b = 0; $b < $size; $b++ ){
                $matriu2[$a][$b]=$matriu[$b][$a];
            }
        }
        return $matriu2;     
    }
?>