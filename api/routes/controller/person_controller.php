<?php
require_once "./routes/model/PersonDAO.php";

class PersonController extends PersonDAO {
    public function createPerson() {
        $response = [
            'status' => 'error',
            'message' => 'Método no permitido'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $person = new PersonModel(
                null,
                $this->cleanString($_POST['name']),
                $this->cleanString($_POST['lastname']),
                $this->cleanString($_POST['second_name']),
                $this->cleanString($_POST['second_lastname']),
                $this->cleanString($_POST['edad']),
                $this->cleanString($_POST['estado']),
                $this->cleanString($_POST['fecha_ingreso']),
                $this->cleanString($_POST['direccion']),
                $this->cleanString($_POST['telefono']),
                $this->cleanString($_POST['cargo'])
            );

            if ($this->create($person)) {
                $response['status'] = 'success';
                $response['message'] = 'Persona creada';
            } else {
                $response['message'] = 'Error al crear persona';
            }
        }

        echo json_encode($response);
    }
}
?>
