<?php
session_start();
include('includes/db.php');

// Verifica si el usuario está autenticado como administrador
if (!isset($_SESSION['login_user']) || $_SESSION['login_user'] != 'admin') {
    header("location: login.php");
    exit;
}

// Verifica si se ha recibido un ID de usuario para eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $sql_delete);
    header("Location: admin.php"); // Redirecciona a la página de administrador después de eliminar
    exit;
} else {
    echo "Error: No se recibió un ID de usuario válido.";
}
?>
