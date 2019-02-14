<?php
	require 'uconection.php';
	if (!empty($_GET["nombre"])) {

		$nombre = $_REQUEST["nombre"];

	}
	if (isset($_POST["pdelete_user"])) {
		$nombre = $_POST["hidden_id"];
		$pdo = Conection::db_conect();
		$sql = "DELETE FROM proveedor WHERE nombre = :nombre";
		$query = $pdo->prepare($sql);
		$query->bindValue(":nombre", $nombre);
		$query->execute();
		Conection::db_disconect();
		echo "<script>location.href='proveedor.php?removido=true';</script>";
die();

		
	}
?>
		