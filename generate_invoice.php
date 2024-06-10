<?php
session_start();
include('includes/db.php');
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parking_id = $_POST['parking_id'];
    $customer = $_POST['customer'];
    $slots = $_POST['slots'];
    $hours = $_POST['hours'];
    $cost = $_POST['cost'];

    $sql = "INSERT INTO requests (parking_id, slots, hours, cost, customer, status) VALUES ('$parking_id', '$slots', '$hours', '$cost', '$customer', 'Completed')";
    if ($conn->query($sql) === TRUE) {
        $invoice_id = $conn->insert_id;
        echo "<p>Invoice generated successfully. Invoice ID: $invoice_id</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generar Factura</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Generar Factura</h2>
        <form method="post" action="">
            <label>Parking ID:</label>
            <input type="text" name="parking_id" required>
            <label>Cliente:</label>
            <input type="text" name="customer" required>
            <label>Espacio:</label>
            <input type="text" name="slots" required>
            <label>Horas:</label>
            <input type="number" name="hours" required>
            <label>Costo:</label>
            <input type="number" name="cost" required>
            <button type="submit">Generar Factura</button>
        </form>
        <p><a href="dashboard.php">Regresar Panel de Control</a></p>
    </div>
</body>
</html>
