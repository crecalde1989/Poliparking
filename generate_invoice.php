<?php
session_start();
include('includes/db.php');
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate_invoice'])) {
    $parking_id = $_POST['parking_id'];
    $slots = $_POST['slots'];
    $hours = $_POST['hours'];
    $cost = $_POST['cost'];
    $customer_name = $_SESSION['login_user']; // Nombre del cliente
    $license_plate = $_POST['license_plate']; // Placa del vehículo
    date_default_timezone_set('America/Bogota'); // Configuración de la zona horaria
    $current_time = date('d/m/Y H:i:s'); // Hora actual en formato DD/MM/AAAA HH:MM:SS

    // Generar factura en formato HTML
    $invoice_content = '
        <h1>Factura</h1>
        <p><strong>Nombre del cliente:</strong> ' . $customer_name . '</p>
        <p><strong>Parking:</strong> Poliparking</p>
        <p><strong>Parking ID:</strong> ' . $parking_id . '</p>
        <p><strong>Placa del vehículo:</strong> ' . $license_plate . '</p>
        <p><strong>Slots:</strong> ' . $slots . '</p>
        <p><strong>Horas:</strong> ' . $hours . '</p>
        <p><strong>Costo:</strong> ' . $cost . '</p>
        <p><strong>Hora de emisión:</strong> ' . $current_time . '</p>
        <!-- Agregar más detalles de la factura si es necesario -->
    ';

    // Almacenar factura en la sesión para mostrarla en la nueva página
    $_SESSION['invoice_content'] = $invoice_content;

    // Redirigir a la página de visualización de factura
    header("Location: invoice.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar Factura</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Generar Factura</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="parking_id">Parking ID:</label>
            <input type="text" id="parking_id" name="parking_id" required><br><br>

            <label for="license_plate">Placa del vehículo:</label> <!-- Nuevo campo para la placa del vehículo -->
            <input type="text" id="license_plate" name="license_plate" required><br><br>

            <label for="slots">Slots:</label>
            <input type="text" id="slots" name="slots" required><br><br>

            <label for="hours">Horas:</label>
            <input type="text" id="hours" name="hours" required><br><br>

            <label for="cost">Costo:</label>
            <input type="text" id="cost" name="cost" required><br><br>

            <button type="submit" name="generate_invoice">Generar factura</button>
        </form>
    </div>
</body>
</html>
