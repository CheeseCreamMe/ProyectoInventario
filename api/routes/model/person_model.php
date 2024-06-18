<?php

class PersonModel {
    public $id;
    public $name;
    public $lastname;
    public $secondName;
    public $secondLastname;
    public $edad;
    public $estado;
    public $fechaIngreso;
    public $direccion;
    public $telefono;
    public $cargo;
    public $imagen;

    public function __construct(
        $id = null, $name = null, $lastname = null,$secondName = null, $secondLastname = null,$edad = null, $estado = null, $fechaIngreso = null,$direccion = null, $telefono = null, $cargo = null ,$imagen = null) {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->secondName = $secondName;
        $this->secondLastname = $secondLastname;
        $this->edad = $edad;
        $this->estado = $estado;
        $this->fechaIngreso = $fechaIngreso;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->cargo = $cargo;
        $this->imagen = $imagen;
    }

    // Getters y Setters
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getSecondName() {
        return $this->secondName;
    }
    
    public function setSecondName($secondName) {
        $this->secondName = $secondName;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }


    public function getSecondLastname() {
        return $this->secondLastname;
    }

    public function setSecondLastname($secondLastname) {
        $this->secondLastname = $secondLastname;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }
}
?>
    
