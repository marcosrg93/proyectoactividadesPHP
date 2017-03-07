<?php

require_once('clases/AutoLoad.php');

$ruta = Request::read("ruta");
$accion = Request::read("accion");
// if($ruta === null && $accion === null) {
//     $htaccess = Request::read('htaccess');
//     $parametros = explode('/', $htaccess);
//     $ruta = $parametros[0];
//     $accion = $parametros[1];
// }

//  echo 'ruta: ' .$ruta . ' ; accion: ' . $accion . ' ; ht: ' . $htaccess;
//  echo " PARAMETRO 1: ".$parametros[0]." PARAMETRO 2: ".$parametros[1];
// exit;
$frontController = new FrontController($ruta);
//, array_slice($parametros, 2)
$frontController->doAction($accion);

echo $frontController->getOutput(); 
