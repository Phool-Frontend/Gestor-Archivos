<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css"> 
</head>
<body>              
            <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                <img src="img/FacultadAutodidacta.png" id="icon" alt="User Icon" />
                <h1>Gestor de archivos</h1>
                </div>

                <!-- Login Form -->
                <form method="post" id="frmLogin" onsubmit="return logear()">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="username" required="">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required="">
                <input type="submit" class="fadeIn fourth" value="Entrar">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                <a class="underlineHover" href="registro.php">Registrar</a>
                </div>

            </div>
            </div>

<script src="librerias/sweetalert.min.js"></script>
<script src="librerias/jquery.min.js"></script>     

<script>
    function logear(){
        $.ajax({
            type:"POST",
            data:$('#frmLogin').serialize(),
            url:"procesos/usuario/login/login.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                if(respuesta == 1){
                    window.location = "vistas/inicio.php";
                }else{
                    swal(":(","Fallo al entrar","error");
                }
            }
        });
        return false;
    }
</script>
</body>
</html>