<?php

class Actividades {
    
    private $idActividades,$idProfesor, $idGrupo,$titulo, $descripcion,$horaInicio,$horaFinal,$imagen,$latitud,$longitud;
    
    function __construct($idActividades=null,$idProfesor=null, $idGrupo=null,$titulo=null, $descripcion=null, $fecha=null,$horaInicio=null,$horaFinal=null,$imagen=null,$latitud=null,$longitud=null) {
        $this->idActividades = $idActividades;
        $this->idProfesor = $idProfesor;
        $this->idGrupo=$idGrupo;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->horaInicio = $horaInicio;
        $this->horaFinal=$horaFinal;
        $this->imagen=$imagen;
        $this->latitud=$latitud;
        $this->longitud=$longitud;
    }
    
    function getIdActividades() {
        return $this->idActividades;
    }
    
    function getIdProfesor() {
        return $this->idProfesor;
    }
    
    function getIdGrupo() {
        return $this->idGrupo;
    }
    
    function getTitulo() {
        return $this->titulo;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }
    
    
    
    function getHoraInicio() {
        return $this->horaInicio;
    }
    
    function getHoraFinal() {
        return $this->horaFinal;
    }
    
    function getImagen() {
        return $this->imagen;
    }
    
    function getLatitud() {
        return $this->latitud;
    }
    
    function getLongitud() {
        return $this->longitud;
    }
    
    function setIdActividades($idActividades) {
        $this->idActividades = $idActividades;
    }

    function setIdProfesor($idProfesor) {
        $this->idProfesor = $idProfesor;
    }
    
    function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }
    
    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    
    
    function setHoraInicio($horaInicio){
        $this->horaInicio=$horaInicio;
    }
    
    function setHoraFinal($horaFinal){
        $this->horaFinal=$horaFinal;
    }
    
    function setImagen($imagen){
        $this->imagen=$imagen;
    }
    
    function setLatitud($latitud) {
        $this->latitud=$latitud;
    }
    
    function setLongitud($longitud) {
        $this->longitud=$longitud;
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
        $this->idActividades=$array[0+$inicio];
        $this->idProfesor=$array[1+$inicio];
        $this->idGrupo=$array[2+$inicio];
        $this->titulo=$array[3+$inicio];
        $this->descripcion=$array[4+$inicio];
        $this->horaInicio=$array[5+$inicio];
        $this->horaFinal=$array[6+$inicio];
        $this->imagen=$array[7+$inicio];
        $this->latitud=$array[8+$inicio];
        $this->longitud=$array[9+$inicio];
    }
}