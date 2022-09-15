<?php
$i = 12;
$tipus_de_i = gettype( $i );
echo "La variable \$i 
      conté el valor $i 
	  i és del tipus $tipus_de_i.";
echo "<br>";    

$f = 1.45;
$tipus_de_f = gettype( $f );
echo "La variable \$f 
      conté el valor $f 
	  i és del tipus $tipus_de_f.";
echo "<br>";

$b = true;
$tipus_de_b = gettype( $b );
echo "La variable \$b 
      conté el valor $b 
	  i és del tipus $tipus_de_b.";
echo "<br>";

$s = "hola";
$tipus_de_s = gettype( $s );
echo "La variable \$s 
      conté el valor $s 
      i és del tipus $tipus_de_s.";        
?>