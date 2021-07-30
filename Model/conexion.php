<?php
class Conexion{
    protected $dbh;
    

    Public function Conectar(){
        define('servidor','localhost');
        define('nombre_bd','sistemainventario');
        define('usuario','root');
        define('password','');

        try {
            $conectar = $this->dbh = new PDO("mysql:host=".servidor.";charset=utf8;dbname=".nombre_bd,usuario, password) ;
            $conectar -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            return $conectar;
            
        } catch (Exception $e) {
            print "Error en la base de datos: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //Obtenemos caracteres legibles
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function desconectarDB()
    {
        die($this->dbh);
    }
}
?>