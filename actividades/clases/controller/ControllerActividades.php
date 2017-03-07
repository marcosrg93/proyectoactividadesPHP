<?php

class ControllerActividades extends Controller{

    function editActividades(){
        
        $actividades = new Actividades();
        $actividades->read();
        
        $date = new DateTime($actividades->getHoraInicio());
        $date2 = new DateTime($actividades->getHoraFinal());
        //echo($actividades);
        $actividades->setHoraInicio($date->format('Y-m-d H:i:s'));
        $actividades->setHoraFinal($date2->format('Y-m-d H:i:s'));
        // echo $actividades->getHoraInicio();
        // echo $actividades->getHoraFinal();
            
        if(!isset($_FILES['imagen'])||$FILES["imagen"]['error']>0){
            $this->getModel()->setData('r', 'Error');
        }else{
           $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
           $limite_kb = 16384;
       
           if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
           {
       
               // Archivo temporal
               $imagen_temporal = $_FILES['imagen']['tmp_name'];
       
               // Tipo de archivo
               $tipo = $_FILES['imagen']['type'];
       
               // Leemos el contenido del archivo temporal en binario.
                $fp = fopen($imagen_temporal, 'r+b');
                $data = fread($fp, filesize($imagen_temporal));
                fclose($fp);
              
               // Insertamos en el objeto.
               $actividades->setImagen($data);
     
           }    
    }
        //echo($actividades);
        $r=$this->getModel()->editActividades($actividades);
        $this->getModel()->setData('r', $r);
    }
    
    function deleteActividades(){
        $idactividades = Request::read('idActividades');
        $this->doDeleteActividades($idactividades);
    }
    
    function doDeleteActividades($idActividades){
        $r = 0;
        if($this->getSession()->isLogged()){
          $r = $this->getModel()->deleteActividades($idActividades);
          if($r > 0){
              $this->getPageActividadesAjax($this->getSession()->get('pagina'));
          }
        }
        $this->getModel()->setData('r', $r);
    }
    
    function getProfesores(){
        $r = $this->getModel()->getNombresProfesores();
        $this->getModel()->setData('profesores', $r);
    }

    function getGrupos(){
        $r = $this->getModel()->getNombresGrupos();
        $this->getModel()->setData('grupos', $r);
    }

    function doprueba(){
        //$r = $this->getModel()->doPrueba();
        $r = $this->getModel()->getNombresProfesores();
       
        $this->getModel()->setData('info', $r);
    }

    // private function getPageActividadesAjax($pagina = 1) {
    //     $total = $this->getModel()->countActividades();
    //     $controllerpage = new PageController($total, $pagina);
    //     $this->getSession()->set('pagina', $controllerpage->getPage());
    //     $users = $this->getModel()->getActividades($controllerpage->getPage());
    //     $this->getModel()->setData('actividades', $users);
    //     $this->getModel()->setData('page', $controllerpage->getPage());
    //     $this->getModel()->setData('pages', $controllerpage->getPages());
    //     echo'actividadesAJAX';
    //     echo $users[0]->getTitulo();
    // }
    
    function actividadesFechas(){
        
        $fecha1=Request::read('fechaInicio');
        $fecha2=Request::read('fechaFinal');
        
        $date = new DateTime($fecha1);
        $date2 = new DateTime($fecha2);
        
        $actividades=$this->getModel()->getActividadesFechas($date->format('Y-m-d H:i:s'),$date2->format('Y-m-d H:i:s'));
        $this->getModel()->setData('actividades',$actividades);
    }
    
    function actividadesSearch(){
        $search=Request::read('search');
        $actividades = new Actividades();
        $actividades=$this->getModel()->getActividadSearch($search);
        $this->getModel()->setData('actividades',$actividades);
    }
    function actividadesProfesor(){
        $idpk=Request::read('idprofesor');
        $actividades = new Actividades();
        $actividades = $this->getModel()->getActividadProfesor($idpk);
        $this->getModel()->setData('actividades',$actividades);
    }
    
    function actividadesGrupo(){
        $idpk=Request::read('idgrupo');
        $actividades = new Actividades();
        $actividades=$this->getModel()->getActividadGrupo($idpk);
        $this->getModel()->setData('actividades',$actividades);
    }

    private function getPageActividadesAjax($pagina = 1) {
        $total = $this->getModel()->countActividades();
        $controllerpage = new PageController($total, $pagina);
        $this->getSession()->set('pagina', $controllerpage->getPage());
        $users = $this->getModel()->getActividades($controllerpage->getPage());
        $this->getModel()->setData('actividades', $users);
        //var_dump($this->getModel()->getData('Actividades'));
        $this->getModel()->setData('page', $controllerpage->getPage());
        $this->getModel()->setData('pages', $controllerpage->getPages());
    }

    function getActividad(){
        $idActividad = Request::read('idActividad');
        $actividadbd = $this->getModel()->getActividad($idActividad);
        $this->getModel()->setData('actividad', $actividadbd->get());
    }
    
    function insertActividades(){
        $actividades = new Actividades();
        $actividades->read();
        
          
        $date = new DateTime($actividades->getHoraInicio());
        $date2 = new DateTime($actividades->getHoraFinal());
        //echo($actividades);
        $actividades->setHoraInicio($date->format('Y-m-d H:i:s'));
        $actividades->setHoraFinal($date2->format('Y-m-d H:i:s'));
        // echo $actividades->getHoraInicio();
        // echo $actividades->getHoraFinal();
            
        if(!isset($_FILES['imagen'])||$FILES["imagen"]['error']>0){
            $this->getModel()->setData('r', 'Error');
        }else{
           $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
           $limite_kb = 16384;
       
           if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
           {
       
               // Archivo temporal
               $imagen_temporal = $_FILES['imagen']['tmp_name'];
       
               // Tipo de archivo
               $tipo = $_FILES['imagen']['type'];
       
               // Leemos el contenido del archivo temporal en binario.
                $fp = fopen($imagen_temporal, 'r+b');
                $data = fread($fp, filesize($imagen_temporal));
                fclose($fp);
              
               // Insertamos en el objeto.
               $actividades->setImagen($data);
     
           }    
    }
        $r = $this->getModel()->insertActividades($actividades);
        $this->getPageActividadesAjax($this->getSession()->get('pagina'));
        $this->getModel()->setData('r', $r);
    }
    
    function actividadespage(){
        $pagina = Request::read('pagina');
        $this->getPageActividadesAjax($pagina);
    }
}