<?php
	require 'uconection.php';
	if (!empty($_GET["id"])) {

		$id = $_REQUEST["id"];

	}
	if (isset($_POST["udelete_user"])) {
		$id = $_POST["hidden_id"];
		$pdo = Conection::db_conect();
		$sql = "DELETE FROM personas WHERE id = :id";
		$query = $pdo->prepare($sql);
		$query->bindValue(":id", $id);
		$query->execute();
		Conection::db_disconect();
		echo "<script>location.href='usuario.php?removido=true';</script>";
die();

		
	}
?>
		