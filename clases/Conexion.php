<?php
//$conn = new mysqli('       HOST         ','  USUARIO     ','CONTRASEÑA','   NOMBRE BD ');**** Con este me dio en CleverCloud && Heroku


        class Conectar{
            public function conexion(){
                $servidor   =   "bwqhowfcs15xyiy11glz-mysql.services.clever-cloud.com";
                $usuario    =   "usjpnyayzstwxapy";
                $password   =   "7DZkhooohJnjo8Xf4u4p";
                $base       =   "bwqhowfcs15xyiy11glz";
            
                $conexion = mysqli_connect(
                                                $servidor,
                                                $usuario,
                                                $password,
                                                $base
                                            );
                
                $conexion->set_charset('utf8mb4');         
                return $conexion;
            }
        }

?>
