<?php
session_start();
// Revisa si el usuario está logueado
include('includes/db.php');

// Incluye la conexión a la base de datos si no está incluida


// Obtiene el correo electrónico del usuario logueado
$user_email = $_SESSION['login_user'];

// Procesa el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Actualiza el perfil del usuario en la base de datos
    $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE email='$user_email'";

    if ($conn->query($sql) === TRUE) {
        // Actualiza el correo electrónico en la sesión si se ha actualizado en la base de datos
        $_SESSION['login_user'] = $email;
        echo "Perfil actualizado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
    exit;
}

// Obtiene los datos del usuario de la base de datos
$sql = "SELECT * FROM users WHERE email='$user_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
} else {
    echo "Usuario no encontrado";
    exit;
}

// Cierra la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrar Perfil</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Administrar Perfil</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            
            <label for="password">Contraseña Nueva:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Actualizar</button>
        </form>
        <p><a href="dashboard.php">Regresar a panel de control</a></p>
    </div>
    
</body>
</html>
