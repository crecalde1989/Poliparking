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
                echo "</tr>";
            }
            ?>
        </table>
        <p><a href="dashboard.php">Regresar a panel de control</a></p>
    </div>
</body>
</html>
