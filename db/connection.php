<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'todoapp_db';

    //Crear conexión 
    $conn = new mysqli($host, $user, $password, $dbname);

    //Verificar de la conexión 
    if ($conn -> connect_error) {
        die ("❌ Conexión fallida. " . $conn -> connect_error);   
    }
?>