<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Agenda</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style type="text/css">

tbody {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 480px; text-align: left;    border-collapse: collapse; }

th {     font-size: 18px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
body {

   background: url(fondo.jpg) no-repeat center top;

}


#navegador ul{
   list-style-type: none;
   text-align: center
   ; 
   text-transform: uppercase;
}
div.c {
    font-size: 150%;
}

#navegador li{
   display: flex;
   justify-content: center;
   align-items: center;
   text-transform: uppercase;
   line-height: 200px;
}
#navegador li a {
   padding: 0px 7px 2px 7px;
   color: #666;
   background-color: #eeeeee;
   border: 0px solid #ccc;
   text-decoration: none;
}
#navegador li a:hover{
   background-color: #333333;
   color: #ffffff;
}
h1 {
    text-align: center;
    text-transform: uppercase;
    color: #4CAF50;
}
	</style>

	</head>
	<body>

		<?php

			require 'uconection.php';

			$id = $_GET["id"];

			$pdo = Conection::db_conect();

			$sql = "SELECT * FROM personas WHERE id = :id";

			$query = $pdo->prepare($sql);

			$query->bindValue(":id", $id);

			$query->execute();

			$row = $query->fetch(PDO::FETCH_ASSOC);

			Conection::db_disconect();

		?>

		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<h1>Datos de: <?php echo $row["nombre"]; ?></h1>

				</div>

			</div>

			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<table class="table table-hover">
						<tbody>
							<tr>
								<td><div class="c">Nombre:</td> </div> <td> <div class="c"> <?php echo $row["nombre"]; ?></td></div>
							</tr>
							<tr>
								<td><div class="c">Apellidos:</td><td> <div class="c"><?php echo $row["apellidos"]; ?></td></div>
							</tr>
							<tr>
								<td><div class="c">Correo:</td><td> <div class="c"><?php echo $row["correo"]; ?></td></div>
							</tr>
							<tr>
								<td><div class="c">Telefono:</td><td> <div class="c"><?php echo $row["telefono"]; ?></td></div>
							</tr>
							<tr>
								<td><div class="c">Telefono2:</td> <td> <div class="c"> <?php echo $row["celular"]; ?></td></div>
							</tr>
							<a href="usuario.php" class="btn btn-default">Atras</a>
						</tbody>
					</table>

				</div>

			</div>

		</div>

	</body>
</html>