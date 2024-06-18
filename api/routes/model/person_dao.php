<?php
require_once "./routes/settings/db_connect.php";
require_once "./routes/model/person_model.php";

class PersonDAO extends Connection {
    private static $tableName = "personas";

    protected function create($person) {

        $query = "INSERT INTO " . self::$tableName . " (name, second_name, lastname, second_lastname, edad, estado, fecha_ingreso, direccion, telefono, cargo, imagen) 
            VALUES (:name, :second_name, :lastname, :second_lastname, :edad, :estado, :fecha_ingreso, :direccion, :telefono, :cargo, :imagen)";

        $stmt = $this->connect()->prepare($query);

        // Cifrar los datos sensibles
        $encryptedName = $this->encodeData($person->name, $this->key);
        $encryptedSecondName = $this->encodeData($person->secondName, $this->key );
        $encryptedLastname = $this->encodeData($person->lastname, $this->key);
        $encryptedSecondLastname = $this->encodeData($person->secondLastname, $this->key);
        $encryptedDireccion = $this->encodeData($person->direccion, $this->key );
        $encryptedTelefono = $this->encodeNumber($person->telefono, $this->key);
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
        $stmt->bindParam(":iamgen", $person->imagen);
        
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    protected function delete($id) {
        $query = "DELETE FROM " . self::$tableName . " WHERE id = :id";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        echo $query." ".$id;
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function readAll() {
        $query = "SELECT * FROM " . self::$tableName;
        $stmt = $this->connect()->prepare($query);
    
        try {
            $stmt->execute();
            $results = [];
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new PersonModel(
                    $row['id'],
                    $this->decodeData($row['name'], $this->key),
                    $this->decodeData($row['lastname'], $this->key),
                    $this->decodeData($row['second_name'], $this->key),
                    $this->decodeData($row['second_lastname'], $this->key),
                    $row['edad'],
                    $row['estado'],
                    $row['fecha_ingreso'],
                    $this->decodeData($row['direccion'], $this->key),
                    $this->decodeNumber($row['telefono'], $this->key),
                    $row['cargo'],
                    $row['imagen']
                );
            }
    
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function readById()
    {

    }
}
?>
