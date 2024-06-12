<?php
session_start();

// Verificar si la factura está almacenada en la sesión
if (isset($_SESSION['invoice_content'])) {
    // Obtener el contenido de la factura de la sesión
    $invoice_content = $_SESSION['invoice_content'];
} else {
    // Si no hay factura en la sesión, redirigir a alguna página o mostrar un mensaje de error
    echo "No se ha generado ninguna factura.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <?php echo $invoice_content; ?>
        <br>
        <a href="dashboard.php" class="btn">Regresar al Panel de Control</a>
    </div>
</body>
</html>
