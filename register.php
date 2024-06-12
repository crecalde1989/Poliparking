<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $role = $_POST['role']; // Agregar el campo del rol

    if ($password == $password_confirm) {
        $sql = "INSERT INTO users (name, email, password, password_confirm, role) VALUES ('$name', '$email', '$password', '$password_confirm', '$role')";
        if (mysqli_query($conn, $sql)) {
            header("location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $error = "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <style>
        .container {
            width: 300px; /* Ancho del contenedor */
            margin: 0 auto; /* Centrar el contenedor en la página */
        }
        select {
            font-size: 16px; /* Tamaño de la fuente */
            padding: 10px; /* Espaciado interno */
            width: 100%; /* Ancho del campo */
            box-sizing: border-box; /* Incluir el relleno en el tamaño total */
            margin-bottom: 10px; /* Espacio inferior */
        }
        button {
            width: 100%; /* Ancho del botón */
            padding: 10px; /* Espaciado interno */
            box-sizing: border-box; /* Incluir el relleno en el tamaño total */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="post" action="">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label>Confirm Password:</label>
            <input type="password" name="password_confirm" required>
            <label>Role:</label> <!-- Agregar un campo para seleccionar el rol -->
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Register</button>
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        </form>
        <p><a href="login.php">Login</a></p>
    </div>
</body>
</html>
