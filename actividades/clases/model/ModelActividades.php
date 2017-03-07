<?php

class ModelActividades extends Model {
    
    private $data = array();

    function countActividades(){
        $manager = new ManageActividades();
        return $manager->count();
    }

     function editActividades($actividades){
       $manager = new ManageActividades(); 
       return $manager->save($actividades);
    }
    
    
    function getNombresGrupos(){
       $manager = new ManageActividades(); 
       return $manager->getListNombresGrupo();
    }
    
     function getNombresProfesores(){
       $manager = new ManageActividades(); 
       return $manager->getListNombresProfesores();
    }

    function deleteActividades($idActividades){
       $manager = new ManageActividades(); 
       return $manager->delete($idActividades);
    }
    
    function getActividades($pagina = 1){
        $manager = new ManageActividades();
        return $manager->arrayListPage($pagina);
    }

    function getActividad($idActividad){
        $manager = new ManageActividades();
        return $manager->get($idActividad);
    }
    
    function insertActividades(Actividades $actividades){
        $manager = new ManageActividades(); 
       return $manager->add($actividades);
    }

    function getActividadesFechas($fechas1,$fechas2){
        $manager= new ManageActividades();
        return $manager->getActividadesFechas($fechas1,$fechas2);
    }
    
    function getActividadSearch($search){
        $manager= new ManageActividades();
        return $manager->getActividadSearch($search);
    }
    
    function getActividadProfesor($idpk){
        $manager = new ManageActividades();
        return $manager->getActividadProfesor($idpk);
    }
    
    function getActividadGrupo($idpk){
        $manager = new ManageActividades();
        return $manager->getActividadGrupo($idpk);
    }
}