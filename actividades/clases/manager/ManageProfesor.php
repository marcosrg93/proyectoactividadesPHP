<?php

class ManageProfesor {
    
    const TABLA = 'profesor';
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    function add(Profesor $objeto) {
         if($objeto->getTipo() === null || $objeto->getTipo() === ''){
            $objeto->setTipo('profesor');
            //echo $campos['tipo'];
        }
        return $this->db->insertParameters(self::TABLA, $objeto->get(), false);
    }
    
    function arrayList() {
        $this->db->getCursorParameters(self::TABLA);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Profesor();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function arrayListPage($pagina = 1, $parametros = array(), $orderby = '1',  $rpp = 10) {
        $desde = ($pagina - 1) * $rpp;
        $limit = 'limit ' . $desde . ', ' . $rpp;
        $this->db->getCursorParameters(self::TABLA, '*', $parametros, $orderby, $limit);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Profesor();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function count($parametros = array()) {
        return $this->db->countParameters(self::TABLA, $parametros);
    }

    function delete($idProfesor) {
        return $this->db->deleteParameters(self::TABLA, array('idProfesor' => $idProfesor));
    }
    //funcion que te saca un profesor a travez de la id
    function get($dni) {
        $this->db->getCursorParameters(self::TABLA, '*', array('dni' => $dni));
        if ($fila = $this->db->getRow()) {
            $objeto = new Profesor();
            $objeto->set($fila);
            return $objeto;
        }
        return new Profesor();
    }
    
    function getProfesor($idProfesor) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idprofesor' => $idProfesor));
        if ($fila = $this->db->getRow()) {
            $objeto = new Profesor();
            $objeto->set($fila);
            return $objeto;
        }
        return new Profesor();
    }

    function getList() {
        $this->db->getCursorParameters(self::TABLA);
        return $this->getResultadoSelect();
    }

    function getPage($pagina = 1, $parametros = array(), $orderby = '1',  $rpp = 10) {
        $desde = ($pagina - 1) * $rpp;
        $limit = 'limit ' . $desde . ', ' . $rpp;
        $this->db->getCursorParameters(self::TABLA, '*', $parametros, $orderby, $limit);
        return $this->getResultadoSelect();
    }

    private function getResultadoSelect() {
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Profesor();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }

    function login(Profesor $profesor){
        $profesorDB = $this->get($profesor->getDni());
        $profesorDB->getPassword() === $profesor->getPassword();
        return $profesorDB;
    }

    function save(Profesor $objeto, $idpk = null) {
        //echo $objeto;
        if($idpk === null) {
            //echo 'Entro ID';
           $idpk = $objeto->getIdProfesor();
        }
        $campos = $objeto->get();
        
        
         if($objeto->getTipo() === null || $objeto->getTipo() === ''){
            $objeto->setTipo('profesor');
            //echo $campos['tipo'];
        }
        // if( $objeto->getDni() != null || $objeto->getDni() != ''){
        //     unset($campos['dni']);
        // }
        //echo'Campos '.$campos['password'];
        if($objeto->getPassword() === null || $objeto->getPassword() === '' || $objeto->getDni() === null || $objeto->getDni() === ''){
            //echo'sin pass';
            unset($campos['password']);
            
        }
        $r = $this->db->updateParameters(self::TABLA, $campos, array('idprofesor' => $idpk));
        //echo'Respuesta '.$r;
        return $r;
    }

}