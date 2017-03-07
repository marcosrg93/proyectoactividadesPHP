<?php

class ManageGrupos {
    
    const TABLA = 'grupo';
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    function add(Grupos $objeto) {
        return $this->db->insertParameters(self::TABLA, $objeto->get(), false);
    }
    
    function arrayList() {
        $this->db->getCursorParameters(self::TABLA);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function arrayListPage($pagina = 1, $parametros = array(), $orderby = '1',  $rpp = 3) {
        $desde = ($pagina - 1) * $rpp;
        $limit = 'limit ' . $desde . ', ' . $rpp;
        $this->db->getCursorParameters(self::TABLA, '*', $parametros, $orderby, $limit);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return $respuesta;
    }
    
    function count($parametros = array()) {
        return $this->db->countParameters(self::TABLA, $parametros);
    }

    function delete($idgrupo) {
        return $this->db->deleteParameters(self::TABLA, array('idgrupo' => $idgrupo));
    }

    function get($idgrupo) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idgrupo' => $idgrupo));
        if ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            return $objeto;
        }
        return new Grupos();
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
            $objeto = new Grupos();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }

    function save(Grupos $objeto, $idgrupo = null) {
        if($idgrupo === null) {
            $idgrupo = $objeto->getIdgrupo();
        }
        $campos = $objeto->get();
        return $this->db->updateParameters(self::TABLA, $campos, array('idgrupo' => $idgrupo));
    }

}