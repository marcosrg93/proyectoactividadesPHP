<?php

class Profesor {
    
    private $idProfesor,$nombre, $dni, $password, $tipo, $departamento;
    
    function __construct($nombre = null, $departamento= null,$dni = null, $password= null, $tipo= null) {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->password = $password;
        $this->tipo = $tipo;
        $this->departamento = $departamento;
    }
    
    /******************************************** Metodos Get ***********************************/    
    function getIdProfesor() {
        return $this->idProfesor;
    }
   
    function getNombre() {
        return $this->nombre;
    }
    
    function getDni() {
        return $this->dni;
    }

    function getPassword() {
        return $this->password;
    }
    
    function getTipo() {
        return $this->tipo;
    }
    
    function getDepartamento() {
        return $this->departamento;
    }

    /******************************************** Metodos Set ***********************************/    
     function setIdProfesor($idProfesor) {
        $this->idProfesor = $idProfesor;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function setDni($dni) {
        $this->dni = $dni;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }
    
    
    /*******************************************************************************/    
    function __toString() {
        $r = '';
        foreach($this as $key => $valor) {
            $r .= "$key => $valor - ";
        }
        return $r;
    }
    
    function json() {
        return json_encode($this->get());
    }
    
    function read(ObjectReader $reader = null){
        if($reader===null){
            $reader = 'Request';
        }
        foreach($this as $key => $valor) {
            $this->$key = $reader::read($key);
        }
    }
    
    function get(){
        $nuevoArray = array();
        foreach($this as $key => $valor) {
            $nuevoArray[$key] = $valor;
        }
        return $nuevoArray;
    }
    
    function set(array $array, $inicio = 0) {
        $this->idProfesor = $array[0 + $inicio];
        $this->dni = $array[1 + $inicio];
        $this->password = $array[2 + $inicio];
        $this->nombre = $array[3 + $inicio];
        $this->tipo = $array[4 + $inicio];
        $this->departamento = $array[5 + $inicio];
    }
    
    /*************************************** Funcion que valida si  un Profesor es correcto ****************************************/ 
    function isValid() {
        if(strlen($this->nombre) < 2 || strlen($this->dni) < 6 || strlen($this->password) < 3) {
            return false;
        }
        return true;
    }

}