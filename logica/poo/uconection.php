<?php

	class Conection {

		//Creamos las variables necesarias para la conexion
		private static $db_host = "localhost";

		private static $db_table = "id6880260_pildoras";

		private static $db_user = "root";

		private static $db_pass = "";

		private static $db_conection;
		
		public function __construct() {
			
			die("Constructor de la clase conexión no disponible");

		}

		public static function db_conect() {
			
			try {
				
				self::$db_conection = new PDO("mysql:host=".self::$db_host."; dbname=".self::$db_table, self::$db_user, self::$db_pass);

				self::$db_conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//Muy importante devolver el valor de la conexion o no hara nada
				return self::$db_conection;

			} catch (PDOException $e) {
				
				die($e->getMessage());

			}

		}

		public static function db_disconect() {

			//De esta forma desconectamos la base de datos
			self::$db_conection = null;

		}

	}

?>