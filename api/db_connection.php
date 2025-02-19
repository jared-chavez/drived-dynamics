<?php
// Credenciales actuales
$host = 'localhost'; 
$dbname = 'crud'; 
$username = 'root';
$password = 'root';

if (!isset($cnnPDO)) {
    $utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');    

    try {
        $cnnPDO = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, $utf8);
        $cnnPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
    } catch (PDOException $e) {
        echo "
        <div style='width:40%;margin:0 auto; margin-top:100px;'>
        <div class='card border border-danger text-center'>
        <div class='card-header'>
            <font color=red>Error de Cadena de Conexión</font>
        </div>
        <div class='card-body'>
            <h6 class='card-title'><font color=red><i><strong>Ha surgido un error y no se puede conectar a la base de datos!</font></i></strong></h6>
            <br>
            <img src='images/Error_db.png' class='img-fluid'>
            <br><br>
            <h6 align=center>
                <font color=red><i><strong>
                Verifique el nombre de su | base de datos |<br> 
                </font></i></strong>
            </h6>
        </div>
        <div class='card-footer text-muted'>
            ©️ 2023 Copyright : Desarrollo de Sitios Web
        </div>
        </div>
        </div>";
        exit();
    }
}
?>
