<?php
    include '../db/connection.php';

    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        echo "⚠️ Por favor ingresa una tarea.";
        exit;
    }
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
    $stmt -> bind_param("ss", $title, $description);
    $stmt -> execute();

    header("Location: ../index.php");
    exit;


?>