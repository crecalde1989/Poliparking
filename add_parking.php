<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parking_id = $_POST['parking_id'];
    $slots = $_POST['slots'];
    $hours = $_POST['hours'];
    $cost = $_POST['cost'];
    $customer = $_SESSION['login_user'];
    $status = "requested";
    $license_plate = $_POST['license_plate']; // Nuevo campo para la placa del vehículo

    // Conexión a la base de datos smart_user
    $conn = new mysqli("localhost", "root", "", "smart_user");
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO requests (parking_id, slots, hours, cost, customer, status, license_plate) 
            VALUES ('$parking_id', '$slots', '$hours', '$cost', '$customer', '$status', '$license_plate')";

    if ($conn->query($sql) === TRUE) {
        // Nuevo parqueo agregado con éxito
        echo '<div class="success-message">Nuevo parqueo agregado con éxito</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Parqueo</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <style>
        .success-message {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Agregar Parqueo</h2>
        <form method="POST" action="">
            <label for="parking_id">ID de Parqueo:</label>
            <input type="number" id="parking_id" name="parking_id" required>
            
            <label for="slots">Espacios:</label>
            <input type="number" id="slots" name="slots" required>
            
            <label for="hours">Horas:</label>
            <input type="number" id="hours" name="hours" required>
            
            <label for="cost">Costo:</label>
            <input type="number" id="cost" name="cost" required>
            
            <label for="license_plate">Placa del Vehículo:</label> <!-- Nuevo campo para la placa -->
            <input type="text" id="license_plate" name="license_plate" required>
            
            <button type="submit">Agregar</button>
        </form>
        <p><a href="dashboard.php">Regresar Panel de Control</a></p>
    </div>
</body>
</html>
