<?php

class ControllerProfesor extends Controller{
    

    function deleteuser(){
        $idProfesor = Request::read('idProfesor');
        $this->doDeleteUser($idProfesor);
    }

    function doDeleteUser($idProfesor){
        $r = 0;
        if($this->getSession()->isLogged()){
          $r = $this->getModel()->deleteUser($idProfesor);
          if($r > 0){
              $this->getPageUsersAjax($this->getSession()->get('pagina'));
          }
        }
        $this->getModel()->setData('r', $r);
    }

    function doprueba(){
        $r = $this->getModel()->doPrueba();
        $this->getModel()->setData('info', $r);
    }

    function edituser(){
        $profesor = new Profesor();
        $profesor->read();
        $r=$this->getModel()->editUser($profesor);
        $this->getModel()->setData('r', $r);
    }

    function getProfesor(){
        $idProfesor = Request::read('idProfesor');
        $profesorbd = $this->getModel()->getUser($idProfesor);
        $this->getModel()->setData('profesor', $profesorbd->get());
    }

    private function getPageUsersAjax($pagina = 1) {
        $total = $this->getModel()->countUser();
        $controllerpage = new PageController($total, $pagina);
        $this->getSession()->set('pagina', $controllerpage->getPage());
        $users = $this->getModel()->getUsers($controllerpage->getPage());
        $this->getModel()->setData('profesores', $users);
        $this->getModel()->setData('page', $controllerpage->getPage());
        $this->getModel()->setData('pages', $controllerpage->getPages());
    }


    function insertuser(){
        $profesor = new Profesor();
        $profesor->read();
        $r = $this->getModel()->insertUser($profesor);
        $this->getPageUsersAjax($this->getSession()->get('pagina'));
        $this->getModel()->setData('r', $r);
        
    }
    
    function islogin(){
        $session = $this->getSession(); 
        $profesor = $session->getUser();
        if($profesor === null){
            $this->getModel()->setData('login', 0);
            
        }else{
            //$this->getModel()->setData('plantilla','..l');
            $info = $session->get('info');
            $this->getModel()->setData('login', 1);
            $this->getModel()->setData('profesor', $profesor->get());
            $this->getModel()->setData('info', $info);
            
            $this->getPageUsersAjax();
        }
    }
    
    function isrepeateddni(){
        $dni = Request::read('dni');
        $info = $this->getModel()->existUser($dni);
        if($info === true ){
            $this->getModel()->setData('r', 1);
        }else{
            $this->getModel()->setData('r', 0);
        }
    }

    
    function isPassword(){
        $idProfesor = Request::read('idProfesor');
        $pass = Request::read('password');
        $info = $this->getModel()->getPass($idProfesor);
        if($info === true ){
            $this->getModel()->setData('pass', 1);
        }else{
            $this->getModel()->setData('pass', 0);
        }
    }

    
    function login(){
        /*$this->getModel()->setData('login', '1');*/
        $profesor = new Profesor();
        $profesor->read();
        $profesorBd = $this->getModel()->doLogin($profesor);
        
        //var_dump($info);
        if($profesorBd === false){
            $this->getModel()->setData('login', 0);
            $this->getModel()->setData('pagina','index');
        } else {
            $session = $this->getSession(); 
            //$session->set('info', $info);
            $session->setUser($profesorBd);
            $this->getModel()->setData('login', 1);
            //echo $profesor
            $this->getModel()->setData('user', $profesorBd->get());
            //$this->getModel()->setData('info', $info);
            $this->getModel()->setData('pagina','admin');
            $this->getPageUsersAjax($profesor, $profesorBd);
        }
        //exit();
    }
    
    function logout(){
        $session = $this->getSession(); 
        $session->destroy();
    }
    
    function userpage(){
        $pagina = Request::read('pagina');
        $this->getPageUsersAjax($pagina);
    }
}