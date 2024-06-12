<?php
session_start();
include('includes/db.php');
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Base</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Base Parking</h2>
        <h3>Usuarios</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <h3>Tabla Parking</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Parking</th>
                <th>Espacio</th>
                <th>Horas</th>
                <th>Costo</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Tiempo</th>
                <th>Acción</th> <!-- Nuevo encabezado para el botón "Generar Factura" -->
            </tr>
            <?php
            $sql = "SELECT * FROM requests";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['parking_id'] . "</td>";
                echo "<td>" . $row['slots'] . "</td>";
                echo "<td>" . $row['hours'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>" . $row['customer'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td><form method='POST' action='generate_invoice.php'>
                            <input type='hidden' name='parking_id' value='" . $row['parking_id'] . "'>
                            <input type='hidden' name='slots' value='" . $row['slots'] . "'>
                            <input type='hidden' name='hours' value='" . $row['hours'] . "'>
                            <input type='hidden' name='cost' value='" . $row['cost'] . "'>
                            <button type='submit' name='generate_invoice'>Generar Factura</button>
                        </form></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p><a href="dashboard.php">Regresar a panel de control</a></p>
    </div>
</body>
</html>
