<?php
require_once "./routes/model/person_dao.php";

class PersonController extends PersonDAO
{
    public function get()
    {
        echo "Hello World T_T";
        /*
        //crear perona
        $data = json_encode([
            "name" => "Cesar",
            "second_name" => "Eduardo",
            "lastname" => "Mejia",
            "second_lastname" => "Hernandez",
            "edad" => 123,
            "estado" => "Activo",
            "fecha_ingreso" => "2024-06-13", 
            "direccion" => "Calle de ejemplo 1234", 
            "telefono" => 78891461,
            "cargo" => "Ingeniero",
            "imagen" => "app/public/personas/e.jpg", //las imagenes se almacenan previamente y se pasa la ruta de acceso a una carpeta dentro del programa
        ]); 
        //eliminar persona 
        $data = json_encode(['id'=>15]);
         */
        //$this->deletePerson($data);
        //$this->createPerson($data);
    }

    public function createPerson($jsonData = null)
    {
        $response = [
            'status' => 'error',
            'message' => 'Método no permitido'
        ];

        $data = json_decode($jsonData, true);
        if ($data['name'] && $data['lastname'] && $data['edad']) {
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
                $this->cleanString($data['cargo']),
                ($data['imagen'])//no es necesario limpir la cadena ya que esta proporcionada por una funcion y no por el usuario
            );

            if ($this->create($person)) {
                $response['status'] = 'success';
                $response['message'] = 'Persona creada: awebo';
            } else {
                $response['message'] = 'Error al crear persona cod : 505';
            }
        }

        echo json_encode($response);
    }

    public function deletePerson($id)
    {
        $response = [
            'status' => 'error',
            'message' => 'Método no permitido'
        ];

        try {
            $data = json_decode($id, true);
            if ($this->delete($data['id'])) {
                $response['status'] = 'success';
                $response['message'] = 'Persona eliminada';
            } else {
                $response['message'] = 'Error al eliminar persona';
            }
        } catch (\Throwable $th) {
            $response['message'] = 'Error al eliminar persona';
        }

        echo json_encode($response);
    }

    public function getAllPersons()
    {
        $response = [
            'status' => 'error',
            'message' => 'Personas no encontradas'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $persons = $this->readAll();

            if ($persons) {
                $response['status'] = 'success';
                $response['message'] = 'Personas encontradas';
                $response['data'] = [];

                foreach ($persons as $person) {
                    $response['data'][] = [
                        'id' => $person->getId(),
                        'name' => $person->getName(),
                        'lastname' => $person->getLastname(),
                        'secondName' => $person->getSecondName(),
                        'secondLastname' => $person->getSecondLastname(),
                        'edad' => $person->getEdad(),
                        'estado' => $person->getEstado(),
                        'fechaIngreso' => $person->getFechaIngreso(),
                        'direccion' => $person->getDireccion(),
                        'telefono' => $person->getTelefono(),
                        'cargo' => $person->getCargo(),
                        'imagen' => $person->getImagen()
                    ];
                }
            } else $response['status'] = 'error';
        }

        echo json_encode($response);
    }


    public function viewPerson($id)
    {

    }
}
