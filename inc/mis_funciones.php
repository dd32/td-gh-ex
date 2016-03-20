<?php

function abrir_objeto($objeto) {
	echo 'Este '.gettype($objeto).' tiene '. count($objeto). ' elementos.';echo '<br>';
	foreach ($objeto as $key => $value) {
		if (is_object($value) || is_array($value)){
			echo '<br>';echo 'Esto es un  '.gettype($value). ', se llama '.$key. ' y tiene '. count($value). ' elementos. ';echo '<br>';
		}
		else {
			echo 'Esto no es un objeto. Es un  '.gettype($value);echo '<br>';
		}

		echo '-- '.$key. ': ';
		var_dump($value);echo '<br>';
		if (is_object($value) || is_array($value)){
			abrir_objeto($value);
		}
		else {
			echo 'last item <br><br>';
		}	
	}	
}