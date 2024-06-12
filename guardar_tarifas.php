<?php
include('includes/db.php'); // Incluir el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $valor_minuto = $_POST['valor_minuto'];
    $valor_hora = $_POST['valor_hora'];
    $costo_moto = $_POST['costo_moto'];
    $costo_camioneta = $_POST['costo_camioneta'];
    $costo_bicicleta = $_POST['costo_bicicleta'];
    $costo_carro = $_POST['costo_carro'];

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO tarifas (valor_minuto, valor_hora, costo_moto, costo_camioneta, costo_bicicleta, costo_carro) 
            VALUES ('$valor_minuto', '$valor_hora', '$costo_moto', '$costo_camioneta', '$costo_bicicleta', '$costo_carro')";

    // Ejecutar la consulta y verificar si se realizó con éxito
    if (mysqli_query($conn, $sql)) {
        // Redireccionar a la página anterior después de guardar los datos
        header("location: dashboard.php");
    } else {
        // Mostrar un mensaje de error si la consulta falla
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Configuración de Tarifas</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Configuración de Tarifas</h2>
        <form method="post" action="">
            <label>Valor por minuto:</label>
            <input type="text" name="valor_minuto" required>
            <label>Valor por hora:</label>
            <input type="text" name="valor_hora" required>
            <label>Costo Moto:</label>
            <input type="text" name="costo_moto" required>
            <label>Costo Camioneta:</label>
            <input type="text" name="costo_camioneta" required>
            <label>Costo Bicicleta:</label>
            <input type="text" name="costo_bicicleta" required>
            <label>Costo Carro:</label>
            <input type="text" name="costo_carro" required>
            <button type="submit">Guardar</button>
        </form>
        <p><a href="dashboard.php">Regresar</a></p>
    </div>
</body>
</html>
