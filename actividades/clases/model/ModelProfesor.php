<?php

class ModelProfesor extends Model{


    function countUser(){
        $manager = new ManageProfesor();
        return $manager->count();
    }

    function deleteUser($idProfesor){
       $manager = new ManageProfesor(); 
       return $manager->delete($idProfesor);
    }

    function doLogin(Profesor $profesor){
        $manager = new ManageProfesor(); 
        $profesorbd = $manager->login($profesor);
        //echo $profesorbd;
        if($profesor->getDni() === $profesorbd->getDni() && $profesor->getPassword() === $profesorbd->getPassword()){
            //echo 'entro';
            return $profesorbd;
        }
        return false;
    }

    function existUser($dni){
        $manager = new ManageProfesor();
        $profesor = $manager->get($dni);
        return ($dni === $profesor->getDni());
    }

    function getPass($idProfesor){
        $manager = new ManageProfesor();
        $profesor = $manager->get($idProfesor);
        return ($idProfesor === $profesor->getPassword());
    }
  
    function getUsers($pagina = 1){
        $manager = new ManageProfesor();
        return $manager->arrayListPage($pagina);
    }
    
    function getUser($idProfesor){
        $manager = new ManageProfesor();
        return $manager->getProfesor($idProfesor);
    }
    
    function insertUser(Profesor $profesor){
         $manager = new ManageProfesor(); 
       return $manager->add($profesor);
    }

    function editUser(Profesor $profesor){
       $manager = new ManageProfesor(); 
       return $manager->save($profesor);
    }
   

   
}