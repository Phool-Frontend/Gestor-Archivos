<?php
            session_start();
            require_once "../../clases/Categorias.php";
            $Categorias = new Categorias();


            if(empty($_POST['idCategoria'])){
                $_POST['idCategoria'] = "";
            }

            echo $Categorias->eliminarCategoria($_POST['idCategoria']);
?>