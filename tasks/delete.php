<?php
    include "../db/connection.php";

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
    }else {
        echo "No existe ese id.";
        exit;
    }

    $stmt = $conn -> prepare("DELETE FROM tasks WHERE id = ?");
    $stmt -> bind_param("i", $id);
    $stmt -> execute();

    header("Location: ../index.php");
    exit;
?>  