<?php
require_once "./routes/model/person_dao.php";

class PersonController extends PersonDAO {

    /*
    // yo lo uso como test de funcionabilidad
    //ejmplo de los datos que debe recibir en formato json desde el front
    public function get()
    {
        $data = json_decode('{
            "name": "Juan",
            "second_name": "Carlos",
            "lastname": "Pérez",
            "second_lastname": "González",
            "edad": 30,
            "estado": "Activo",
            "fecha_ingreso": "2024-06-13",
            "direccion": "Calle Falsa 123",
            "telefono": "123456789",
            "cargo": "Ingeniero"
        }', true);

        // Simular el POST llamando a la función createPerson con los datos decodificados
        $_POST = $data;
        $this->createPerson();
    }
        */

    public function createPerson() {
        $response = [
            'status' => 'error',
            'message' => 'Método no permitido'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['name'])) {  // Asegurar que el método POST simulado sea aceptado en el ejmplo de arriba
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
