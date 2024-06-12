<?php

require_once "./settings/db_values.php";

class Connection
{

    public function connect()
    {
        $respuesta = "";
        try {
            //code... 
            $enlace = new PDO(SGBD, USER, PASSWORD);
            $respuesta = "conexion exitosa a la base de datos";
        } catch (Exception $e) {
            $respuesta = "Error: " . $e->getMessage(); // Captura más específica y mensaje detallado
        }
        return $respuesta;
    }

    protected function cleanString($cadena)
    {
        $valores_eliminar = array(
            "/<script>/i",
            "/<\/script>/i",
            "/select \* from/i",
            "/insert into/i",
            "/delete from/i",
            '/["\']/',
            "/<script type/i",
            "/<script src/i"
        );
        $cadena = trim($cadena);
        $cadena = preg_replace($valores_eliminar, "", $cadena);
        return $cadena;
    }


    protected function executeConsulta($sql)
    {
        $conexion = self::connect()->prepare($sql);
        $conexion->execute();
        $respuesta = $conexion->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
        return $respuesta;
    }

    protected function executeSelect($tabla)
    {
        $conexion = self::connect()->prepare("SELECT * FROM " . $tabla);
        $conexion->execute();
        $respuesta = $conexion->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
        return $respuesta;
    }

}