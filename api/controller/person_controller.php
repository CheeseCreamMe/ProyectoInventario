<?php
require_once "./model/PersonDAO.php";

class PersonController extends PersonDAO {
    public function createPerson() {
        $json;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $person = new PersonModel(
                null,
                $_POST['name'],
                $_POST['lastname'],
                $_POST['second_name'],
                $_POST['second_lastname'],
                $_POST['edad'],
                $_POST['estado'],
                $_POST['fecha_ingreso'],
                $_POST['direccion'],
                $_POST['telefono'],
                $_POST['cargo']
            );

            if ($this->create($person)) {
                $json = json_encode("Persona creada");
            } else {
                $json = json_encode("Error al crear persona");
            }
        } else {
            $json = json_encode("Método no permitido");
        }
        return $json;
    }
}
?>
