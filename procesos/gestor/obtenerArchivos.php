<?php
    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();


    if(empty($_POST['idArchivo'])){
        $_POST['idArchivo'] = "";
    }


    $idArchivo = $_POST['idArchivo'];
  

    echo $Gestor->obtenerRutaArchivo($idArchivo);


?>