<?php
        require_once "../../../clases/Usuario.php";

//Mostrara lo que pasa

if(empty($_POST['password'])){
        $_POST['password'] = "";
}

$password = sha1($_POST['password']);


//PARA SACAR ESE ERROR DE MRDA
if(empty($_POST['nombre'])){
        $_POST['nombre'] = "";
}

//Listo esto esta supper okay ya que funciona como usar los empy en las demas variables como correo,usuario,etc
$fechaNacimiento = (!empty ($_POST['fechaNacimiento']) ) ? $_POST['fechaNacimiento'] : NULL;

//queremos año-mes-dia

$newDate = date("Y-m-d", strtotime($fechaNacimiento));









/* PRUEBA N°001
function verfecha($vfecha){
        $fch=explode("-",$vfecha);
        $tfecha=$fch[2]."-".$fch[1]."-".$fch[0];
        return $tfecha;
}

$mifecha = "2016-11-18";
echo verfecha($mifecha)."<br>";
*/
//queremos año-mes-dia

//Ejemplito donde sale el error que tenemos en fecha
/*$arr = Array(1,2,3);
echo $arr[2];
*/

if(empty($_POST['correo'])){
        $_POST['correo'] = "" ;
}

if(empty($_POST['usuario'])){
        $_POST['usuario'] = ""; 
}


$datos = array( 
   "nombre" => $_POST['nombre'] , 
    "fechaNacimiento" => $newDate, 
    "email"   => $_POST['correo'] ,
    "usuario"  => $_POST['usuario'],
    "password" => $password
);

$usuario = new Usuario();

//echo $usuario->agregarUsuario($datos);
//      Testeando

echo $usuario->agregarUsuario($datos);

?>