<?php
    $n = $_GET['numero'];
	if(!is_numeric($n))
		echo "Introduce un numero correcto";
	else{
		if(!($n > 0 && $n < 11))
		echo "Introduce un numero del 1 al 10";
		else{
			for($i=1; $i<=10; $i++){
				echo $n, " x ", $i, " = ", $i*$n;
				echo "<br/>";
			}
			
		}
	}
	
?>