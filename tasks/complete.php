<?php
    include "../db/connection.php";

    if (!isset($_POST['id']) || empty($_POST['id'])) {
        echo "❌ No se recibió una ID válida.";
        exit;
    }

    $id = $_POST['id'];

    $stmt = $conn -> prepare("UPDATE tasks SET done = NOT done WHERE id = ?");
    $stmt -> bind_param('i', $id);
    $stmt -> execute();

    header('Location: ../index.php');
    exit;
?>