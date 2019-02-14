<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Agregue contac</title>
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

			//Introducimos el documento que se encargara de gestionar toda la insercion de usuarios
			include 'ucreate.php';

		?>

		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<h1>Crear usuario</h1>

				</div>

			</div>

			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<form action="ucreate_user.php" method="POST" role="form">
					
						<div class="form-group">
							<label for="">Nombre:</label>
							<input type="text" name="name" class="form-control" placeholder="Nombre..." value="<?php echo empty($name) ? '' : $name; ?>">
							<?php

								if (!empty($nameError)) {

							?>

									<div class="alert alert-danger" role="alert">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										<span class="sr-only">Error:</span>
										<?php echo $nameError; ?>
									</div>

							<?php

								}

							?>
						</div>

						<div class="form-group">
							<label for="">Apellidos:</label>
							<input type="text" name="surname" class="form-control" placeholder="Apellidos..." value="<?php echo empty($surname) ? '' : $surname; ?>">
							<?php

								if (!empty($surnameError)) {

							?>

									<div class="alert alert-danger" role="alert">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										<span class="sr-only">Error:</span>
										<?php echo $surnameError; ?>
									</div>

							<?php

								}

							?>
						</div>
						<div class="form-group">
							<label for="">correo:</label>
							<input type="text" name="email" class="form-control" placeholder="correo..." value="<?php echo empty($email) ? '' : $surname; ?>">
							<?php

								if (!empty($emailError)) {

							?>

									<div class="alert alert-danger" role="alert">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										<span class="sr-only">Error:</span>
										<?php echo $emailError; ?>
									</div>

							<?php

								}

							?>
						</div>

						<div class="form-group">
							<label for="">Telefono:</label>
							<input type="text" name="phone" class="form-control" placeholder="Telefono..." value="<?php echo empty($phone) ? '' : $phone; ?>">
							<?php

								if (!empty($phoneError)) {

							?>

									<div class="alert alert-danger" role="alert">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										<span class="sr-only">Error:</span>
										<?php echo $phoneError; ?>
									</div>

							<?php

								}

							?>
						</div>
						<div class="form-group">
							<label for="">Telefono2:</label>
							<input type="text" name="phoneone" class="form-control" placeholder="Telefono..." value="<?php echo empty($phoneone) ? '' : $phoneone; ?>">
							<?php

								if (!empty($phoneoneError)) {

							?>

									<div class="alert alert-danger" role="alert">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										<span class="sr-only">Error:</span>
										<?php echo $phoneoneError; ?>
									</div>

							<?php

								}

							?>
						</div>
					
						<button type="submit, button" name="ucreate_submit" class="btn btn-primary" onclick = "javascript:window.location='usuario.php'">Crear usuario</button>

						<a href="usuario.php" class="btn btn-default">Atras</a>

					</form>

				</div>

			</div>

		</div>

	</body>
</html>