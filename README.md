<h1>Purpose of the project</h1>
<p>I dont  know T_T</p>
<h1>Languejes</h1>
<p><strong>PHP:</strong>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/300px-PHP-logo.svg.png" alt="PHP" width="50"></p>
<p><strong>JS:</strong>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/480px-Unofficial_JavaScript_logo_2.svg.png" width="50" alt="JS"></p>
<p><strong>MySQL:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Mysql.svg/75px-Mysql.svg.png" alt="MySQL" width="50"></p>
<p><strong>HTML:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/200px-HTML5_logo_and_wordmark.svg.png?20160623125136" alt="HTML" width="50"></p>
<p><strong>CSS:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/200px-CSS3_logo_and_wordmark.svg.png?20160623125136" alt="CSS" width="50"></p>
<br>

<h2>frameworks</h2>
<p><strong>react:</strong> <a href="https://react.dev/" target="_blank" rel="noopener noreferrer"><img src="https://th.bing.com/th/id/OIP.33CwBYkmnMfpA9Djup22JwHaHa?rs=1&pid=ImgDetMain" alt="JQuery" width="50"></a></p>
<p><strong>Bootstrap:</strong> <a href="https://getbootstrap.com/" target="_blank" rel="noopener noreferrer"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/200px-Bootstrap_logo.svg.png?20160623125136" alt="Bootstrap" width="50"></a></p>

<h1>Folder Structure</h1>
<h3>Model View Controller(MVC)</h3>

```
└── 📁proyecto
    └── 📁api
        └── .htaccess
        └── index.php
        └── router.php
        └── 📁routes
            └── 📁controller
                └── controllers
            └── 📁model
                └── DAO, objects
            └── 📁settings
                └── db_connect.php
                └── db_values.php
        └── 📁sql
            └── baseDeDatos.sql
    └── 📁myProject
        └── .eslintrc.cjs
        └── .gitignore
        └── index.html
        └── package-lock.json
        └── package.json
        └── 📁public
            └── 📁images
            └── 📁svg
                └── add.svg
                └── graph.svg
                └── mobile_search.svg
                └── search.svg
                └── vite.svg
        └── README.md
        └── 📁src
            └── App.jsx
            └── 📁assets
                └── react assets
            └── 📁components
                └── components
            └── 📁css
                └── App.css
                └── index.css
            └── main.jsx
        └── vite.config.js
    └── package-lock.json
    └── README.md
```

<h2>methods expamples</h2>

<h3>Set user or person example<h3>

public function get()
{
    //ejemplo del formato json de entrada de datos
    $data = '{
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
    }';
    // Simular el POST llamando a la función createPerson con los datos JSON
    $this->createPerson($data);
}
<h3>Encode and decode example<h3>

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

 
