<?php
require_once "./routes/settings/db_connect.php";
require_once "./routes/model/person_model.php";

class PersonDAO extends Connection {
    private static $tableName = "personas";

    protected function create($person) {

        $query = "INSERT INTO " . self::$tableName . " (name, second_name, lastname, second_lastname, edad, estado, fecha_ingreso, direccion, telefono, cargo) 
            VALUES (:name, :second_name, :lastname, :second_lastname, :edad, :estado, :fecha_ingreso, :direccion, :telefono, :cargo)";

        $stmt = $this->connect()->prepare($query);

        // Cifrar los datos sensibles
        $encryptedName = $this->encodeData($person->name, $this->key);
        $encryptedSecondName = $this->encodeData($person->secondName, $this->key );
        $encryptedLastname = $this->encodeData($person->lastname, $this->key);
        $encryptedSecondLastname = $this->encodeData($person->secondLastname, $this->key);
        $encryptedDireccion = $this->encodeData($person->direccion, $this->key );
        $encryptedTelefono = $this->encodeData($person->telefono, $this->key );

        // Bindear todos los parámetros
        $stmt->bindParam(":name", $encryptedName);
        $stmt->bindParam(":second_name", $encryptedSecondName);
        $stmt->bindParam(":lastname", $encryptedLastname);
        $stmt->bindParam(":second_lastname", $encryptedSecondLastname);
        $stmt->bindParam(":edad", $person->edad);
        $stmt->bindParam(":estado", $person->estado); 
        $stmt->bindParam(":fecha_ingreso", $person->fechaIngreso); 
        $stmt->bindParam(":direccion", $encryptedDireccion);
        $stmt->bindParam(":telefono", $encryptedTelefono);
        $stmt->bindParam(":cargo", $person->cargo); 

        return $stmt->execute();
    }
}
?>
