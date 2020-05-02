<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.min.css">
</head>
<body>
        <div class="container">
                <h1 style="text-align:center">Registro de Usuario</h1>
                <hr> 
                <div class="row">   
                <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form action="" id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                            <label for="">Nombre personal</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required="">
                            <label for="">Fecha de nacimiento</label>
                            <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="">
                            <label for="">Email o correo</label>
                            <input type="text" name="correo" id="correo" class="form-control" required="">
                            <label for="">Nombre de usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" required="">
                            <label for="">Password o contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required="">    
                            <br>
                            <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <button class="btn btn-primary">Registrar</button>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                    <a href="index.php" class="btn btn-success">Login</a>
                                    </div>
                            </div>
                
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
        </div>
<script src="librerias/jquery.min.js"></script>
<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>     
<script src="librerias/sweetalert.min.js"></script>


        <script type="text/javascript">
            $(function(){
                var fechaA = new Date();
                var yyyy = fechaA.getFullYear();

                $("#fechaNacimiento").datepicker({
                    changeMonth :true,
                    changeYear  : true,
                    yearRange    :'1900:' + yyyy,
                    dateFormat  : "dd-mm-yy"
                });
            });


            function agregarUsuarioNuevo(){
                    $.ajax({
                        method: "POST",
                        data: $('#frmRegistro').serialize(),
                        url: "procesos/usuario/registro/agregarUsuario.php",
                        success:function(respuesta){
                                respuesta = respuesta.trim();
                                console.log(respuesta);

                                if(respuesta == 1){
                                    $('#frmRegistro')[0].reset();
                                    swal(":D", "Agregado con exito","success");
                                }else if(respuesta == 2){
                                    swal("Este usuario ya existe registra otro!!!");
                                }
                                else{
                                    swal(":(", "No se pudo registrar","error");
                                }
                        }
                    });

                    return false;
            }

        </script>


</body>
</html>