<?php


include '../actividades/clases/AutoLoad.php';
$idactividades = 2;//$_GET["id"];

$manager = new ManageActividades();
$foto = $manager->get($idactividades);

header("Content-type: image/jpeg");

//echo '<img src="data:image/png;base64,' . $foto->getImagen() . '"/>';

//echo $foto->getImagen();
$dato = base64_encode($foto->getImagen());

$r = array(
    'imagen' => $dato
);
echo json_encode($r);