# Purpose of the project
I dont  know T_T
## API
### Languejes
<p><strong>PHP:</strong>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/300px-PHP-logo.svg.png" alt="PHP" width="50"></p>
<p><strong>JS:</strong>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/480px-Unofficial_JavaScript_logo_2.svg.png" width="50" alt="JS"></p>
<p><strong>MySQL:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Mysql.svg/75px-Mysql.svg.png" alt="MySQL" width="50"></p>
<p><strong>HTML:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/200px-HTML5_logo_and_wordmark.svg.png?20160623125136" alt="HTML" width="50"></p>
<p><strong>CSS:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/200px-CSS3_logo_and_wordmark.svg.png?20160623125136" alt="CSS" width="50"></p>
<br>

### frameworks
<p><strong>react:</strong> <a href="https://react.dev/" target="_blank" rel="noopener noreferrer"><img src="https://th.bing.com/th/id/OIP.33CwBYkmnMfpA9Djup22JwHaHa?rs=1&pid=ImgDetMain" alt="JQuery" width="50"></a></p>
<p><strong>Bootstrap:</strong> <a href="https://getbootstrap.com/" target="_blank" rel="noopener noreferrer"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/200px-Bootstrap_logo.svg.png?20160623125136" alt="Bootstrap" width="50"></a></p>

### Folder Structure

#### Model View Controller(MVC)

```
└── 📁proyecto
    └── 📁api
        └── .htaccess
        └── index.php
        └── router.php
        └── 📁routes
            └── 📁controller
                └── person_controller.php
                └── usuario_controller.php
            └── 📁model
                └── person_dao.php
                └── person_model.php
                └── user_dao.php
                └── user_model.php
            └── 📁settings
                └── db_connect.php
                └── db_values.php
        └── 📁sql
            └── baseDeDatos.sql
```

###  examples

#### Create new person Examples

<p> La idea general es mantener separada lo maximo posible la logica de negocio del fornt, por ello se opto por el modelo mvc y se hace uso y consumo de una api, para fines practicos y que sea entenible el proyecto se han tabjado juntos<p>

#### Ejemplo de Formato JSON de Entrada de Datos
```
json {
    "name": "Juan",
    "second_name": "Carlos",
    "lastname": "Pérez",
    "second_lastname": "González",
    "edad": 30,
    "estado": "Activo",
    "fecha_ingreso": "2024-06-13",
    "direccion": "Calle Falsa 123",
    "telefono": 123456789,
    "cargo": "Ingeniero"
    "imagen" : "ejmplo de ruta de imagen" 
}
```

#### Ejemplo de para simular el metodo post en la entrada de datos
```
public function get()
    {
        //ejemplo del formato json de entrada de datos
        $data = {json de ejemplo};
        // Simular el POST llamando a la función createPerson con los datos JSON
        $this->createPerson($data);
    }
```

#### Encode and decode example

<p>Tambien esta la funcion para cifrar numeros la cual lo que hacer es: primero los convierte a acena y asi los codifica en X16</p>

```
    public function get()
    {
        $EncryptedKey = $this->key;

        $dataToEncrypt = 'ejemplo de cifrado';
        $encodedData = $this->encodeData($dataToEncrypt, $EncryptedKey);

        echo 'Datos cifrados: ' . $encodedData . PHP_EOL . '<br>';

        $decodedData = $this->decodeData($encodedData, $EncryptedKey);

        echo 'Datos descifrados: ' . $decodedData . PHP_EOL;
    }
```
## APP

### Folder Structure

```
    └── 📁app
        └── 
        └── index.js
        └── 📁pages
            └── Personas.js
        └── 📁public
            └── 📁personas
                └── e.jpg
        └── 📁src
            └── 📁css
                └── styles.css
                └── vars.css
                📁components
                └── tablePerson.js
    └── index.html
    └── README.md
```

### Paleta de colores

<p>La paleta de coloress del proyecto esta en el archivo vars.css en donde estan lo principales recuross utilizados para dar estilos al proyecto, ayudando un poco a ala modularidadd del proyecto<p>

```
    :root {
        --main-bg-color: #272829; //background
        --main-text-color: #FFF6E0;
        --primary-color: #74ad72;
        --secondary-color: #0ee088;
        --danger-color: #b92727;
        --danger-color-hover: #dd3737;
        --info-color: #175ee2;
        --info-color-hover: #2a6deb;
        --comment-color: #6b7485;
        --border-radius:0.4rem; //6px
    }   
```