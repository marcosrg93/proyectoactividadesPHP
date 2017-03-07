<?php

class Controller {

    private $model, $session;
    
    function __construct(Model $model) {
        $this->model = $model;
        $this->session = Session::getInstance(Constants::SESSIONNAME);
       
        
        // if(nologin)
        //     pl1
        // else if(profesor)
        //     pl2
        // else if(directivo)
        //     pl3
    }
    
    function getModel(){
        return $this->model;
    }
    function getSession(){
        return $this->session;
    }

    function index() {
         
        if($this->getSession()->getUser()===null){
            $this->getModel()->setData('pagina', 'index');
            //echo'entro';
        }else if($this->getSession()->getUser()->getTipo()==='profesor'){
            //echo'entro';
            $this->getModel()->setData('pagina', 'profesor');
        }else if($this->getSession()->getUser()->getTipo()==='directivo'){
           // echo'entro';
            $this->getModel()->setData('pagina', 'admin');
        }
        //$this->getModel()->setData('plantilla', 'plantilla/_index.html');
    }

}