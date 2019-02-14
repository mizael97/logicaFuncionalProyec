<?php

	require 'uconection.php';

	if (!empty($_GET["id"])) {

		$id = $_REQUEST["id"];

	}

	//Si se ha pulsado en "Actualizar", ejecutamos la consulta o los errores, si acabamos de entrar (no le hemos dado a actualizar aun) se ejecutara el else, que devuelve los datos que ya tenia el usuario puestos
	if (isset($_POST["update_submit"])) {
		
		//Variables error inciadas a nulo
		$nameError = null;

		$surnameError = null;
		$emailError = null;


		$phoneError = null;
		$phoneoneError = null;

		//Extraemos el campo id oculto del formulario de actualizacion
		$id = $_POST["hidden_id"];

		$name = $_POST["name"];
		$email = $_POST["email"];


		$surname = $_POST["surname"];

		$phone = $_POST["phone"];
		
		$phoneone = $_POST ["phoneone"];

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
			
			$emailError = "Introduce el correo";

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

			$sql = "UPDATE personas SET nombre = :nombre, apellidos = :apellidos, correo = :correo, telefono = :telefono, celular = :celular WHERE id = :id";

			$query = $pdo->prepare($sql);

			$query->bindValue(":id", $id);

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

	} else {

		$pdo = Conection::db_conect();

		$sql = "SELECT * FROM personas WHERE id = :id";

		$query = $pdo->prepare($sql);

		$query->bindValue(":id", $id);

		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);

		//Este id, sera el que se vaya al campo input oculto para poderse extraer en el futuro
		$id = $row["id"];

		$name = $row["nombre"];

		$surname = $row["apellidos"];

$email = $row["correo"];

		$phone = $row["telefono"];
		$phoneone = $row["celular"];

		Conection::db_disconect();

	}

?>