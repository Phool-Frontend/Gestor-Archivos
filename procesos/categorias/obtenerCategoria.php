<?php
        require_once "../../clases/Categorias.php";
        $Categorias = new Categorias();

if(empty($_POST['idCategoria'])){
    $_POST['idCategoria'] = "";
}

        echo json_encode($Categorias->obtenerCategoria($_POST['idCategoria']));
?>