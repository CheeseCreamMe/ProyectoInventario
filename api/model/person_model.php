<?php

class PersonModel {

    private $name;
    private $id;
    private $lastname;
    private $secondName;
    private $secondLastname;
    private $edad;
    private $estado;
    private $fechaIngreso;

    // Setters
    protected function setName($name) {
        $this->name = $name;
    }
    protected function setId($id) {
        $this->id = $id;
    }
    protected function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    protected function setSecondName($secondName) {
        $this->secondName = $secondName;
    }
    protected function setSecondLastname($secondLastname) {
        $this->secondLastname = $secondLastname;
    }
    protected function setEdad($edad) {
        $this->edad = $edad;
    }
    protected function setEstado($estado) {
        $this->estado = $estado;
    }
    protected function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }
    // Getters
    protected function getName() {
        return $this->name;
    }
    protected function getId() {
        return $this->id;
    }
    protected function getLastname() {
        return $this->lastname;
    }
    protected function getSecondName() {
        return $this->secondName;
    }
    protected function getSecondLastname() {
        return $this->secondLastname;
    }
    protected function getEdad() {
        return $this->edad;
    }
    protected function getEstado() {
        return $this->estado;
    }
    protected function getFechaIngreso() {
        return $this->fechaIngreso;
    }
 }

    
