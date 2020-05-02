<?php
    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();


    if(empty($_POST['idArchivo'])){
        $_POST['idArchivo'] = "";
    }


    $idArchivo = $_POST['idArchivo'];
    $idUsuario = $_SESSION['idUsuario'];

    $nombreArchivo = $Gestor->obtenNombreArchivo($idArchivo);
    $rutaEliminar = "../../archivos/". $idUsuario."/".$nombreArchivo;

    //print_r($rutaEliminar);
    is_file($rutaEliminar);
    if ( unlink($rutaEliminar) ){
        $Gestor->eliminarRegistroArchivo($idArchivo);
        echo 1;
   }else{
         echo 0;
   }

/* Los que funcionaron
    var_dump($rutaEliminar);
    $ga = '../../archivos/31/go.jpg';
    is_file($ga);
    unlink($ga);
*/
    
    


/*  SE SOLUCIONA DE LA ESTA FORMA
   if ( 1==1 ){
         $Gestor->eliminarRegistroArchivo($idArchivo);
         echo 1;
    }else{
        echo 0;
    }
*/

    //   http://localhost/gestor/procesos/gestor/eliminarArchivo.php    
?>