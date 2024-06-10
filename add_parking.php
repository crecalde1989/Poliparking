<?php
include('includes/db.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $street = $_POST['street'];
    $name = $_POST['name'];
    $slot = $_POST['slot'];
    $remaining_slots = $_POST['remaining_slots'];
    $attendant = $_POST['attendant'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO parkings (location, street, name, slot, remaining_slots, attendant, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $params = array($location, $street, $name, $slot, $remaining_slots, $attendant, $price);
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Parking added successfully.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Parking</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="add-parking-form">
        <h2>Add Parking</h2>
        <form method="post" action="">
            <label>Location:</label>
            <input type="text" name="location" required>
            <label>Street:</label>
            <input type="text" name="street" required>
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Slot:</label>
            <input type="number" name="slot" required>
            <label>Remaining Slots:</label>
            <input type="number" name="remaining_slots" required>
            <label>Attendant:</label>
            <input type="text" name="attendant" required>
            <label>Price:</label>
            <input type="text" name="price" required>
            <button type="submit">Add Parking</button>
        </form>
    </div>
</body>
</html>
