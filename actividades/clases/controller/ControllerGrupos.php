<?php

class ControllerGrupos extends Controller{

    function editgrupo(){
        $grupos = new Grupos();
        $grupos->read();
        $r=$this->getModel()->editGrupo($grupos);
        $this->getModel()->setData('r', $r);
    }


    function deletegrupo(){
        $idgrupo = Request::read('idgrupo');
        $this->doDeleteGrupo($idgrupo);
    }
    
    function getGrupo(){
        $idGrupo = Request::read('idGrupo');
        $grupobd = $this->getModel()->getGrupo($idGrupo);
        $this->getModel()->setData('grupo', $grupobd->get());
    }
    
    function doDeleteGrupo($idgrupo){
        $r = 0;
        if($this->getSession()->isLogged()){
          $r = $this->getModel()->deleteGrupo($idgrupo);
          if($r > 0){
              $this->getPageGruposAjax($this->getSession()->get('pagina'));
          }
        }
        $this->getModel()->setData('r', $r);
    }

    function doprueba(){
        $r = $this->getModel()->doPrueba();
        $this->getModel()->setData('info', $r);
    }
    
    function index(){
    }

    private function getPageGruposAjax($pagina = 1) {
        $total = $this->getModel()->countGrupos();
        $controllerpage = new PageController($total, $pagina);
        $this->getSession()->set('pagina', $controllerpage->getPage());
        $grupos = $this->getModel()->getGrupos($controllerpage->getPage());
        $this->getModel()->setData('grupos', $grupos);
        $this->getModel()->setData('page', $controllerpage->getPage());
        $this->getModel()->setData('pages', $controllerpage->getPages());
    }


    function insertgrupo(){
        $grupo = new Grupos();
        $grupo->read();
        $r = $this->getModel()->insertGrupo($grupo);
        $this->getPageGruposAjax($this->getSession()->get('pagina'));
        $this->getModel()->setData('r', $r);
        
    }
    
    //Peticion que lista los grupos
    function grupopage(){
        $pagina = Request::read('pagina');
        $this->getPageGruposAjax($pagina);
    }
}