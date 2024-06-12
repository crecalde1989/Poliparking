<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Agregar el campo del rol

    // Depuración: Imprimir los valores de $email, $password y $role
    echo "Email: $email<br>";
    echo "Password: $password<br>";
    echo "Role: $role<br>";

    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password' and role = '$role'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $email;
        $_SESSION['role'] = $role; // Almacena el rol en la sesión
        if($role == 'user') {
            header("location: dashboard.php");
        } elseif($role == 'admin') {
            header("location: admin.php");
        }
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <h2>Poliparking</h2>
        <form method="post" action="">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
            <button type="submit">Login</button>
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        </form>
        <p><a href="register.php">Register</a></p>
    </div>
</body>
</html>
