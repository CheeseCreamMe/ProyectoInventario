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
            "edad" => 23,
            "estado" => "Activo",
            "fecha_ingreso" => "2024-06-13", 
            "direccion" => "Calle de ejemplo 1234", 
            "telefono" => 78891461,
            "cargo" => "",
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

        $requiredData = [
            $data['name'],
            $data['lastname'],
            $data['edad'],
            $data['cargo'],
            $data['direccion'],
            $data['imagen'],
            $data['estado']
        ];

        if (self::verificarCamposVacios($requiredData)) {
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
                ($data['imagen']) //no es necesario limpir la cadena ya que esta proporcionada por una funcion y no por el usuario
            );

            if ($this->create($person)) {
                $response['status'] = 'success';
                $response['message'] = 'Persona creada';
            } else {
                $response['message'] = 'Error al crear persona cod : 505';
            }
        } else {
            $response['message'] = 'Faltan datos importantes';
        }

        echo json_encode($response);
    }

    public function deletePerson($id)
    {
        $response = [
            'status' => 'error',
            'message' => 'Método no permitido'
        ];

        // Verificar que el método de solicitud sea DELETE
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
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
        }

        echo json_encode($response);
    }

    public function getAllPersons()
    {
        $response = [
            'status' => 'error',
            'message' => 'No se han encontrado personas para mostrar'
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
            } else $response['message'] = 'No se pudo conectar con el servidor';
        }

        echo json_encode($response);
    }


    public function getPerson($id)
    {
        $response = [
            'status' => 'error',
            'message' => 'No se han encontrado personas con este id'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $person = $this->readById($id);
            
            if ($person) {
                $response['status'] = 'success';
                $response['message'] = 'Personas encontradas';
                $response['data'] = [
                    'id' => $person->getId(),
                    'name' => $person->getName(),
                    'lastname' => $person->getLastname(),
                    'second_name' => $person->getSecondName(),
                    'second_lastname' => $person->getSecondLastname(),
                    'edad' => $person->getEdad(),
                    'estado' => $person->getEstado(),
                    'fecha_ingreso' => $person->getFechaIngreso(),
                    'direccion' => $person->getDireccion(),
                    'telefono' => $person->getTelefono(),
                    'cargo' => $person->getCargo(),
                    'imagen' => $person->getImagen()
                ];
            }
        }
        echo json_encode($response);
    }

    public function updatePerson($id)
{
    $response = [
        'status' => 'error',
        'message' => 'Método no permitido'
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Obtener los datos del cuerpo de la solicitud
        $input = json_decode(file_get_contents('php://input'), true);

        if (isset($input['name']) && isset($input['lastname']) && isset($input['second_name']) &&
            isset($input['second_lastname']) && isset($input['edad']) && isset($input['estado']) &&
            isset($input['fecha_ingreso']) && isset($input['direccion']) && isset($input['telefono']) &&
            isset($input['cargo']) && isset($input['imagen'])) {

            try {
                $person = new PersonModel();
                $person->setId($id);
                $person->setName($input['name']);
                $person->setLastname($input['lastname']);
                $person->setSecondName($input['second_name']);
                $person->setSecondLastname($input['second_lastname']);
                $person->setEdad($input['edad']);
                $person->setEstado($input['estado']);
                $person->setFechaIngreso($input['fecha_ingreso']);
                $person->setDireccion($input['direccion']);
                $person->setTelefono($input['telefono']);
                $person->setCargo($input['cargo']);
                $person->setImagen($input['imagen']);

                $updated = $this->update($person);

                if ($updated) {
                    $response['status'] = 'success';
                    $response['message'] = 'Persona actualizada';
                } else {
                    $response['message'] = 'Error al actualizar persona';
                }
            } catch (\Throwable $th) {
                $response['message'] = 'Error al actualizar persona';
            }
        } else {
            $response['message'] = 'Datos incompletos';
        }
    }

    echo json_encode($response);
}

}
