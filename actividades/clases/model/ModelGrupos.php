<?php

class ModelGrupos extends Model{
    
    private $data = array();

    function deleteGrupo($idgrupo){
       $manager = new ManageGrupos(); 
       return $manager->delete($idgrupo);
    }

    function existGrupo($idgrupo){
        $manager = new ManageGrupos();
        $grupo = $manager->get($idgrupo);
        return ($idgrupo === $grupo->getIdgrupo());
    }
    
    function editGrupo($Grupo){
       $manager = new ManageGrupos(); 
       return $manager->save($Grupo);
    }
    
    function getGrupo($idGrupo){
        $manager = new ManageGrupos();
        return $manager->get($idGrupo);
    }

    function getGrupos($pagina = 1){
        $manager = new ManageGrupos();
        return $manager->arrayListPage($pagina);
    }

    function insertGrupo(Grupos $grupo){
        $manager = new ManageGrupos(); 
        return $manager->add($grupo);
    }

    function countGrupos(){
        $manager = new ManageGrupos();
        return $manager->count();
    }
}