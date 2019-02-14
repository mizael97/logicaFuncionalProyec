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
			include 'pdelete.php';

		?>

		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<h1>Borrar usuario</h1>

				</div>

			</div>

			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<form action="pdelete_user.php" method="POST" role="form">
					
						<div class="form-group">
							<input type="hidden" name="hidden_id" class="form-control" value="<?php echo $nombre;?>">
						</div>

						<div class="form-group">
							<div class="alert alert-danger">
								<strong>Advertencia:</strong> Vas a borrar permanentemente el registro, estas seguro de proceder?
							</div>
						</div>

						<button type="submit" name="pdelete_user" class="btn btn-primary">Si</button>
						
						<a href="proveedor.php" class="btn btn-default">No</a>

					</form>

				</div>

			</div>

		</div>

	</body>
</html>