<?php

class Router {

    private $rutas = array();

    function __construct() {
        $this->rutas['index'] = new Route('Model', 'View', 'Controller');
        //$this->rutas['ajax'] = new Route('Model', 'ViewAjax', 'ControllerAjax');
        $this->rutas['profesor'] = new Route('ModelProfesor', 'ViewAjax', 'ControllerProfesor');
        $this->rutas['actividades'] = new Route('ModelActividades', 'ViewAjax', 'ControllerActividades');
        $this->rutas['grupos'] = new Route('ModelGrupos', 'ViewAjax', 'ControllerGrupos');
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['index'];
        }
        return $this->rutas[$ruta];
    }

}