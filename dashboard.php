<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Control</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Panel de Control</h2>
        <p>Bienvenido, <?php echo $_SESSION['login_user']; ?>!</p>
        <ul>
            <li><a href="usuarios.php">Parking Zone Users</a></li>  
            <li><a href="guardar_tarifas.php">Tarifas</a></li>
            <li><a href="view_tables.php">Tabla Parking</a></li>
            <li><a href="generate_invoice.php">Generar facturas</a></li>
            <li><a href="add_parking.php">Agregar Parqueo</a></li>
            <li><a href="pagos.php">Pagos</a></li>
            <li><a href="manage_profile.php">Administrar Perfil</a></li>
                        <li><a href="logout.php">Salir</a></li>
        </ul>
    </div>
</body>
</html>

