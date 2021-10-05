<?php

class conexion
{
    static private $instancia = null;

	static public function obtenerconexion()
	{
		if ( self::$instancia == null )
		{
			self::$instancia = new mysqli("127.0.0.1","root","12345678","teca");
		}

		return self::$instancia;
	}

	protected function conectar()
	{
		$con = mysqli_connect($this -> server,$this -> user,$this -> pass,$this -> bd) or die ("no se pudo");
		return $con;
	}
	private $conexion;
	public function __construct(){
        $this->conexion = mysqli_connect("127.0.0.1","root","12345678","teca");
    }

    public function get(){
        return $this->conexion;
    }
    public static function close(){
        mysqli_close(self::$instancia);
    }

    public function query($sql){
        return mysqli_query($this->get(),$sql);  
    }

	public function getconexion(){
		$host = "127.0.0.1"; //127.0.0.1 0 localhost
		$db = "teca"; //base de datos de mysql
		$user = "root"; // usuario de mysql
		$password = "12345678";       //contraseña de mysql
	 
	 //conexion a la base datos utilizando pdo
	  $db = new PDO("mysql:host=$host;dbname=$db;", $user, $password);
	 
	   return $db;
	 }
}

#$instancia=mysqli_connect("localhost","root","12345678","teca");

?>