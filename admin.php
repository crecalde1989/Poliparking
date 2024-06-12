<?php
session_start();
include('includes/db.php');

// Verifica si el usuario está autenticado como administrador
if (!isset($_SESSION['login_user']) || $_SESSION['login_user'] != 'admin') {
    header("location: login.php");
    exit;
}

// Función para eliminar usuario
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql_delete = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $sql_delete);
    header("Location: admin.php"); // Redirecciona a la página de administrador después de eliminar
    exit;
}

// Obtener lista de usuarios
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administrador</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Panel de Administrador</h2>
        <h3>Usuarios</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='delete_user.php?id=" . $row['id'] . "'>Eliminar</a></td>"; // Enlace para eliminar usuario
                echo "</tr>";
            }
            ?>
        </table>
        <p><a href="dashboard.php">Regresar al Panel de Control</a></p>
    </div>
</body>
</html>
