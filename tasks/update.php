<?php
    include "../db/connection.php";


    // COMPORBACIÓN DEL METODO POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // VALIDACIÓN  DEL ID Y DEL TITLE 
        if (!isset($_POST['id']) || empty($_POST['id']) || !isset($_POST['title']) || empty($_POST['title'])) {
            echo "⚠️ Datos obligatorios faltantes.";
            exit;
        }

        // RECOGIDA DE DATOS 
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description']  ?? ''; // opcional

        // SENTENCIA PREPARADA 
        $stmt = $conn -> prepare('UPDATE tasks SET title = ?, description = ? WHERE id = ?');
        $stmt -> bind_param("ssi", $title, $description, $id);
        
        // EJECUTAR Y VERIFICAR 
        if ($stmt -> execute()){
            // REDIRIGIR AL PRINCIPIO 
            header("Location: ../index.php");
            exit;
        } else {
            //IMPRIMIR ERROR
            echo "❌ Error al actualizar: ". $stmt -> error;
        }
        
        $stmt -> close();

    } else {
        echo "⛔ Solo se permite el método POST.";
    }
?>