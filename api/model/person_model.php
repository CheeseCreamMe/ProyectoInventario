<?php

class PersonModel {

    public $name;
    public $id;
    public $lastname;
    public $secondName;
    public $secondLastname;
    public $edad;
    public $estado;
    public $fechaIngreso;
    public $direccion;
    public $telefono;
    public $cargo;

    // Constructor vacío
    public function __construct() {
    }

    // Constructor con todos los atributos
    public function __constructWithAllAttributes($id, $name, $lastname, $secondName, $secondLastname, $edad, $estado, $fechaIngreso, $direccion, $telefono, $cargo) {
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
    }

    // Constructor con solo el ID
    public function __constructWithId($id) {
        $this->id = $id;
    }

    // Constructor con solo el nombre
    public function __constructWithName($name) {
        $this->name = $name;
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

    
