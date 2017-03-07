<?php

class ManageActividades {
    
    const TABLA = 'actividades';
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    function add(Actividades $objeto) {
        return $this->db->insertParameters(self::TABLA, $objeto->get(), false);
    }
    
    function arrayList() {
        $this->db->getCursorParameters(self::TABLA);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividades();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function arrayListPage($pagina = 1, $parametros = array(), $orderby = '1',  $rpp = 6) {
        $desde = ($pagina - 1) * $rpp;
        $limit = 'limit ' . $desde . ', ' . $rpp;
        
        $this->db->getCursorParameters(self::TABLA, '*', $parametros, $orderby, $limit);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividades();
            $objeto->set($fila);
            $imagen=$objeto->getImagen();
            $objeto->setImagen(base64_encode($imagen));
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function count($parametros = array()) {
        return $this->db->countParameters(self::TABLA, $parametros);
    }

    function delete($idActividades) {
        return $this->db->deleteParameters(self::TABLA, array('idactividades' => $idActividades));
    }

    function get($idActividades) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idactividades' => $idActividades));
        if ($fila = $this->db->getRow()) {
            $objeto = new Actividades();
            $objeto->set($fila);
            $imagen=$objeto->getImagen();
            $objeto->setImagen(base64_encode($imagen));
            return $objeto;
        }
        return new Actividades();
    }

    function getList() {
        $this->db->getCursorParameters(self::TABLA);
        return $this->getResultadoSelect();
    }
    
    function getListNombresGrupo() {
        $this->db->getCursorParameters('grupo','*');
        return $this->getResultadoSelectGrupos();
    }
    
    function getListNombresProfesores() {
        $this->db->getCursorParameters('profesor','*');
        return $this->getResultadoSelectProfesores();
    }
    
    function getActividadProfesor($idpk){
        $this->db->getCursorParameters(self::TABLA, '*', array('idprofesor' => $idpk));
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividades();
            $objeto->set($fila);
            $imagen=$objeto->getImagen();
            $objeto->setImagen(base64_encode($imagen));
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function getActividadGrupo($idpk){
        $this->db->getCursorParameters(self::TABLA, '*', array('idgrupo' => $idpk));
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividades();
            $objeto->set($fila);
            $imagen=$objeto->getImagen();
            $objeto->setImagen(base64_encode($imagen));
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
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
            $objeto = new Actividades();
            $objeto->set($fila);
            $imagen=$objeto->getImagen();
            $objeto->setImagen(base64_encode($imagen));
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    private function getResultadoSelectGrupos() {
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function getActividadesFechas($fecha1,$fecha2){
         //echo 'HOLAAAAA'.$fecha1.'</br>';
         // echo 'HOLAAAAA'.$fecha2.'</br>';
        $sql = "SELECT *".
                " FROM `actividades`".
                " WHERE `horainicio` >= :horainicio".
                " AND `horafinal` <= :horafinal";
        $parametros = array('horainicio' => '"'.$fecha1.'"', 'horafinal' => '"'.$fecha2.'"');
        // echo $parametros['horainicio'];
        //  echo $parametros['horafinal'];
        $this->db->send($sql, $parametros);
        
        if ($this->db->send($sql, $parametros)){ 
            
            $respuesta = array();
            while ($fila = $this->db->getRow()) {
                $objeto = new Actividades();
                $objeto->set($fila);
                $imagen=$objeto->getImagen();
                $objeto->setImagen(base64_encode($imagen));
                $respuesta[] = $objeto->get();
            }
            return $respuesta;
        }
        return -1;
    }
    
    function getActividadSearch($busqueda){
        $sql= 'SELECT * FROM actividades'.
              ' WHERE titulo LIKE :titulo OR'.
              ' descripcion LIKE :description';
        $parametros = array('titulo' => '"%'.$busqueda.'%"', 'description' => '"%'.$busqueda.'%"');
        
        $this->db->send($sql, $parametros);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividades();
            $objeto->set($fila);
            $imagen=$objeto->getImagen();
            $objeto->setImagen(base64_encode($imagen));
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    private function getResultadoSelectProfesores() {
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Profesor();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function save(Actividades $objeto, $idActividades = null) {
        if($idactividades === null) {
            $idActividades = $objeto->getIdActividades();
        }
        $campos = $objeto->get();
        // echo $campos['horaInicio'];
        // echo $campos['horaFinal'];
         if($objeto->getImagen() === null || $objeto->getImagen() === ''|| $objeto->getImagen() === undefined){
             //echo'sin img';
             //echo $campos['imagen'];
            unset($campos['imagen']);
            
        }
        
        return $this->db->updateParameters(self::TABLA, $campos, array('idactividades' => $idActividades));
    }

}