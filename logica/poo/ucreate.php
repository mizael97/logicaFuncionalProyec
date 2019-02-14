<?php

	require 'uconection.php';

	if (isset($_POST["ucreate_submit"])) {
		
		//Variables error inciadas a nulo
		$nameError = null;

		$surnameError = null;

		$emailError = null;


		$phoneError = null;
		$phoneoneError = null;

		//Recogemos los valores del formulario
		$name = $_POST["name"];
		$email = $_POST["email"];
		$surname = $_POST["surname"];

		$phone = $_POST["phone"];
		$phoneone = $_POST["phoneone"];

		//Una variable booleana se encargara de decidir si el formulario se puede enviar o no
		$form_stat = true;

		//Con el metodo empty verificamos que el input esta vacio o no
		if (empty($name)) {
			
			$nameError = "Introduce un nombre";

			$form_stat = false;

		}

		if (empty($surname)) {
			
			$surnameError = "Introduce los apellidos";

			$form_stat = false;

		}
		if (empty($email)) {
			
			$emailError = "Introduce un correo";

			$form_stat = false;

		}

		//Con el campo del telefono indicamos dos cosas, si esta vacio, y si tiene caracteres no numericos, con filter var podemos comprovar si un campo tiene caracteres numericos, si es un mail, una url... solo tenemos que pasarle la variable y el filtro que queremos
		if (empty($phone)) {
			
			$phoneError = "Introduce tu teléfono";

			$form_stat = false;

		} elseif (!filter_var($phone, FILTER_VALIDATE_INT)) {
			
			$phoneError = "El campo solo puede contener números";

			$form_stat = false;

		}
		if (empty($phoneone)) {
			
			$phoneoneError = "Introduce tu teléfono";

			$form_stat = false;

		} elseif (!filter_var($phoneone, FILTER_VALIDATE_INT)) {
			
			$phoneoneError = "El campo solo puede contener números";

			$form_stat = false;

		}


		//Si no ha entrado por ningun filtro, entonces podemos realizar la operacion de insercion
		if ($form_stat) {
			
			$pdo = Conection::db_conect();

			$sql = "INSERT INTO personas (nombre, apellidos,correo, telefono, celular) VALUES (:nombre, :apellidos,:correo, :telefono,:celular)";

			$query = $pdo->prepare($sql);

			$query->bindValue(":nombre", $name);
			

			$query->bindValue(":apellidos", $surname);
			$query->bindValue(":correo", $email);

			$query->bindValue(":telefono", $phone);
			$query->bindValue(":celular", $phoneone);

			$query->execute();

			Conection::db_disconect();
			echo "<script>location.href='usuario.php?removido=true';</script>";
die();

	}
}
?>