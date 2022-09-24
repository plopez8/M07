<?php
    $arraycalcular = array(12, 5, 6, "t");
    print_r (factorialArray($arraycalcular));

    function factorialArray($arraycalcular){
        $arrLength = count($arraycalcular);
        for ($a = 0;$a < $arrLength;$a++){
            $num=$arraycalcular[$a];
            if ((is_int($arraycalcular[$a]))){
                //function amb recursivitat
                $arraycalcular[$a] = factorialrec($num);
                //function sense recursivitat
                //$arraycalcular[$a] = factorial($num);
            } else{
                return "false";
            }
        
        }
        return $arraycalcular;    
    }

    //function sense recursivitat
    function factorial($num){
        $factorial = 1;
        for ($b = 1;$b <= $num;$b++){
            $factorial = $factorial * $b;
        }
        return $factorial;
    }

    //function amb recursivitat
    function factorialrec($num) {

        if ($num < 2) {
            return 1;
        } else {
            return (factorial($num-1) * $num);
        }
    }
?>