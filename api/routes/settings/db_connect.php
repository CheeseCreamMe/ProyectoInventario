<?php

require_once "./routes/settings/db_values.php";

class Connection
{
    protected $conn;

    protected function connect()
    {
        try {
            $this->conn = new PDO(SGBD, USER, PASSWORD);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            die("Error de conexión: " . $exception->getMessage());
        }

        return $this->conn;
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
}
?>