<?php
    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();

    
    if(empty($_POST['categoriasArchivos'])){
        $_POST['categoriasArchivos'] = "";
    }
    

    $idCategoria = $_POST['categoriasArchivos'];
    $idUsuario = $_SESSION['idUsuario'];


    
if($_FILES['archivos']['size'] > 0){
    
    $carpetaUsuario = '../../archivos/'.$idUsuario;
    
    //Crea carpeta
    if(   !file_exists($carpetaUsuario)     ){
            mkdir($carpetaUsuario, 0777,true);
            //echo "La carpeta creada!!!";
    }

    $totalArchivos = count($_FILES['archivos']['name']);
    //Añadir la imagen a carpeta y para guarda en la BD
    for($i=0; $i < $totalArchivos; $i++){ 

        $nombreArchivo = $_FILES['archivos']['name'][$i];
        //$explode = explode('.', $nombreArchivo);
        ///$tipoArchivo = array_pop($explode);

        $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
        
        $rutaFinal = $carpetaUsuario."/".$nombreArchivo;
        //var_dump($_POST['categoriasArchivos']);
        


        $extension = $_FILES['archivos']['name'];
        $info = new SplFileInfo($extension[0]);
        $tipoArchivo = $info->getExtension();
       
      
        
        $datosRegistroArchivo = array(
            "idUsuario" => $idUsuario, 
            "idCategoria" => $idCategoria, 
            "nombreArchivo" => $nombreArchivo, 
            "tipo" => $tipoArchivo, 
            "ruta" => $rutaFinal
        );
        $respuesta = 0;
        if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
            $respuesta = $Gestor->agregaRegistroArchivo($datosRegistroArchivo);
        }

        

        
    }

    if(!$respuesta > 0){
        //echo "Esta vacio respuesta";
        echo 2;
    }else{
        //
        //echo "Esta lleno respuesta";
        echo 1;
    }
    

}else{
    echo 0;
}
?>