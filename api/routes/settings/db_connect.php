<?php

require_once "./routes/settings/db_values.php";

class Connection
{
    protected $conn; 
    protected $key = 'thisisaverysecretkey!1234567890abcdef'; // Clave de cifrado (debería ser segura y secreta)
    protected function connect()
    {
        try {
            $this->conn = new PDO(SGBD, USER, PASSWORD);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            die("Error de conexión: " . $exception->getMessage());
        }

        return $this->conn;
    }

    protected function cleanString($cadena)
    {
        $valores_eliminar = array(
            "/<script>/i",
            "/<\/script>/i",
            "/select \* from/i",
            "/insert into/i",
            "/delete from/i",
            '/["\']/',
            "/<script type/i",
            "/<script src/i"
        );
        $cadena = trim($cadena);
        $cadena = preg_replace($valores_eliminar, "", $cadena);
        return $cadena;
    }
    protected function encodeData($data, $key)
    {
        // Generar un IV (vector de inicialización) aleatorio de la longitud correcta
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    
        // Combinar el IV y los datos cifrados para facilitar el descifrado
        $encodedData = base64_encode($iv . $encryptedData);
    
        return $encodedData;
    }
    
    protected function decodeData($encodedData, $key)
    {
        // Decodificar los datos de Base64
        $data = base64_decode($encodedData);
    
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($data, 0, $ivLength);
        $encryptedData = substr($data, $ivLength);
    
        // Descifrar los datos
        $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);
    
        return $decryptedData;
    }

    protected function encodeNumber($number, $key)
    {
        $numberStr = strval($number);
        return $this->encodeData($numberStr, $key);
    }

    protected function decodeNumber($encodedNumber, $key)
    {
        $numberStr = $this->decodeData($encodedNumber, $key);
        return $numberStr;
    }
}
?>