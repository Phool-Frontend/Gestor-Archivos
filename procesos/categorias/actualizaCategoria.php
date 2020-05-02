<?php
            require_once "../../clases/Categorias.php";
            $Categorias = new Categorias();

            if(empty($_POST['idCategoria'])){
                $_POST['idCategoria'] = "";
            }

            if(empty($_POST['categoriaU'])){
                $_POST['categoriaU']= "";
            }




            $datos = array(
            "idCategoria"   => $_POST['idCategoria'],
            "categoria"   =>  $_POST['categoriaU'],
            );


            echo $Categorias->actualizarCategoria($datos);
?>