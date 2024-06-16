<?php
require_once "./routes/model/person_dao.php";

class PersonController extends PersonDAO
{
    public function createPerson($jsonData = null)
    {
        $response = [
            'status' => 'error',
            'message' => 'Método no permitido'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $jsonData) {
            $data = $jsonData ? json_decode($jsonData, true) : $_POST;

            if (json_last_error() !== JSON_ERROR_NONE) {
                $response['message'] = 'Error al decodificar JSON';
                echo json_encode($response);
                return;
            }

            $person = new PersonModel(
                null,
                $this->cleanString($data['name']),
                $this->cleanString($data['lastname']),
                $this->cleanString($data['second_name']),
                $this->cleanString($data['second_lastname']),
                $this->cleanString($data['edad']),
                $this->cleanString($data['estado']),
                $this->cleanString($data['fecha_ingreso']),
                $this->cleanString($data['direccion']),
                $this->cleanString($data['telefono']),
                $this->cleanString($data['cargo'])
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
