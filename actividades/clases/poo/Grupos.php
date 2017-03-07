<?php

class Grupos {
    
    private $idGrupo, $nombre, $nivel;
    
    function __construct($idGrupo = null, $nombre = null, $nivel = null) {
        $this->idGrupo = $idgrupo;
        $this->nombre = $nombre;
        $this->nivel = $nivel;
    }
    
    function getIdGrupo() {
        return $this->idGrupo;
    }
    
    function getNombre() {
        return $this->nombre;
    }
    
    function getNivel() {
        return $this->nivel;
    }
    
    function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

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
        $this->idGrupo = $array[0 + $inicio];
        $this->nombre = $array[1 + $inicio];
        $this->nivel = $array[2 + $inicio];
    }
}