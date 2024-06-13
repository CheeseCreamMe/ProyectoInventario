<?php
require_once "./routes/settings/db_connect.php";
require_once "./routes/model/person_model.php";

class PersonDAO extends Connection {
    private static $tableName = "personas";

    protected function create($person) {
        $query = "INSERT INTO " . self::$tableName . " (name, second_name, lastname, second_lastname, edad, estado, fecha_ingreso, direccion, telefono, cargo) 
            VALUES (:name, :second_name, :lastname, :second_lastname, :edad, :estado, :fecha_ingreso, :direccion, :telefono, :cargo)";
        
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":name", $person->name);
        $stmt->bindParam(":second_name", $person->secondName);
        $stmt->bindParam(":lastname", $person->lastname);
        $stmt->bindParam(":second_lastname", $person->secondLastname);
        $stmt->bindParam(":edad", $person->edad);
        $stmt->bindParam(":estado", $person->estado);
        $stmt->bindParam(":fecha_ingreso", $person->fechaIngreso);
        $stmt->bindParam(":direccion", $person->direccion);
        $stmt->bindParam(":telefono", $person->telefono);
        $stmt->bindParam(":cargo", $person->cargo);

        return $stmt->execute();
    }
}
?>
