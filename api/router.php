<?php
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : null;
$methodName = isset($_GET['method']) ? $_GET['method'] : null;

if ($controllerName && $methodName) {
    // Construir el nombre del archivo y de la clase del controlador
    $controllerFile = "./routes/controller/" . $controllerName . "_controller.php";
    $controllerClass = ucfirst($controllerName) . "Controller";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                echo json_encode(["error" => "Método no encontrado."]);
            }
        } else {
            echo json_encode(["error" => "Controlador no encontrado."]);
        }
    } else {
        echo json_encode(["error" => "Archivo del controlador no encontrado."]);
    }
} else {
    echo json_encode(["error" => "Controlador o método no especificado."]);
}
?>
