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
div.c {
    font-size: 150%;
}



#navegador ul{
   list-style-type: none;
   text-align: center
   ; 
   text-transform: uppercase;
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

		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<h1>PROVEEDORES</h1>

					<a href="pcreate_user.php" class="btn btn-success">Insertar registro</a>
					<a  href="usuario.php" class="btn btn-success">Contactos Administrativos/ Doctores</a></div></li> 


				</div>

			</div>

			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nombre</th><th>Apellidos</th> <th>Correo</th><th>Telefono</th><th>Telefono 2</th><th>Acción</th>
							</tr>
						</thead>
						<tbody>
							<?php

								//page es la variable por la que empezamos a contar los registros, por ende hacemos el siguiente algoritmo... Si page no esta iniciada, la instanciamos a 1
								if (isset($_GET["page"])) {
									
									//Cuando haya sido iniciada, si vale uno, vamos al inicio, si vale otra cosa, le asignamos dicho valor, y la sentencia SQL ya se encargara del resto
									if ($_GET["page"] == 1) {
										
										header("location:usuario.php");

									} else {

										$page = $_GET["page"];

									}

								} else {

									$page = 1;

								}

								include 'uconection.php';

								//Llamamos a la clase para conectar, como es estatico no es necesario instanciarla
								$pdo = Conection::db_conect();

								//Para hacer la paginacion, primero obtenemos el numero total de registros que tenemos en la base de datos, en numero, para eso utilizamos rowCount()
								$sql_total_rows = "SELECT * FROM proveedor";

								$result = $pdo->prepare($sql_total_rows);

								$result->execute();

								$num_rows = $result->rowCount();

								//Seleccionamos el numero de registros que obtendremos por pagina
								$rows_page = 20;

								//El total de paginas que nos saldra ira en funcion del numero de filas devueltas dividido por el numero de registros que queremos por pagina
								$total_pages = ceil($num_rows / $rows_page);

								//Este algoritmo calculara en funcion de la pagina en la que nos encontremos, el registro por el que ha de empezar a contar
								$start_row = ($page - 1) * $rows_page;

								//Ahora hacemos la consulta SQL en funcion de los calculos anteriores
								$sql = "SELECT * FROM proveedor ORDER BY nombre LIMIT $start_row, $rows_page";

								$result = $pdo->prepare($sql);

								$result->execute();

								while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
									
								<tr>
									<td>	<div class="c"><?php echo $row["nombre"]; ?></div></td>
									<td><div class="c"><?php echo $row["apellidos"]; ?></div></td>
									<td><div class="c"><?php echo $row["correo"]; ?></div></td>
									<td><div class="c"><?php echo $row["telefono"]; ?></div></td>
									<td><div class="c"><?php echo $row["celular"]; ?></div></td>

									<!-- El truco de saber que usuario es, esta en enviar el id a traves del href con el metodo GET -->
									<td>
										<a href="pread_user.php?id=<?php echo $row["id"]; ?>" class="btn btn-default">Leer datos</a>
										<a href="pupdate_user.php?id=<?php echo $row["id"]; ?>" class="btn btn-default">Actualizar</a>
										<a href="pdelete_user.php?nombre=<?php echo $row["nombre"]; ?>" class="btn btn-default">Borrar</a>
									</td>
								</tr>

								<?php
								
								}

								//Desconectamos la sesion con la base de datos
								Conection::db_disconect();

							?>
						</tbody>
					</table>

					<ul class="pagination">

						<?php
						//Para hacer la paginacion tenemos que utilziar un bucle que nos creara las paginas necesarias en funcion de los resultados devueltos
						for ($i = 1; $i <= $total_pages; $i++) { ?>
							
							<!-- Cada vez que pulsemos en el link, enviamos el numero de la pagina a traves de la URL -->
							<li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						
						<?php	

						} ?>
						<a href="index.html" class="btn btn-default">Atras</a>

					</ul>

				</div>

			</div>

		</div>

	</body>
</html>