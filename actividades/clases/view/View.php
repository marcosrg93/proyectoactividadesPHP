<?php

class View {

    private $model;
    
    function __construct(Model $model) {
        $this->model = $model;
    }
    
    function getModel(){
        return $this->model;
    }
    
    function render() {
        //return Util::renderFile('plantilla/_index.html');
        /*echo $this->getModel()->getData('pagina');
        exit();*/
        //$plantilla = $this->getModel()->getData('plantilla');
        //return Util::renderFile($plantilla);
        $respuesta=$this->getModel()->getData('pagina');
        //var_dump($respuesta['pagina']);
        
        if($respuesta['pagina'] === 'index'){
           // echo'entro';
            $plantilla = 'plantilla/_index.html';
        }else if($respuesta['pagina'] === 'profesor'){
            //echo'entro';
            $plantilla = 'plantilla/_profesor.html';
        }else if($respuesta['pagina'] === 'admin'){
            $plantilla = 'plantilla/_admin.html';
        }
        
        return Util::renderFile($plantilla);
    }
    
}