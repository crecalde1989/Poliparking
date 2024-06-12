<!DOCTYPE html>
<html>
<head>
    <title>Pantalla Principal de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 600px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            margin-top: 0;
        }

        h2 {
            margin-top: 30px;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        select {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            cursor: pointer;
        }

        button {
            padding: 10px 20px;
            margin: 10px auto; /* Centrar el botón horizontalmente */
            display: block; /* Para que el margen horizontal funcione */
            border: 1px solid #ddd;
            border-radius: 3px;
            cursor: pointer;
            background-color: #28a745;
            color: #fff;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function guardarEspacio() {
            alert("Espacio guardado con éxito");
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Pantalla Principal de Usuarios</h1>
        <form method="post" action="usuario.php">
            <div>
                <label><input type="checkbox" name="entrada"> Entrada</label>
                <label><input type="checkbox" name="salida"> Salida</label>
                <label><input type="checkbox" name="disponibles"> Disponibles</label>
                <label><input type="checkbox" name="ocupados"> Ocupados</label>
            </div>
        </form>

        <h2>Selección de Espacios</h2>
        <form method="post" action="usuario.php">
            <div style="display: flex; justify-content: center;">
                <button type="button">Piso
                    <select name="piso">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </button>
                <button type="button">Espacio
                    <select name="espacio">
                        <?php
                        // Mostrar los espacios del piso seleccionado
                        $espacios_por_piso = 12;
                        for ($i = 1; $i <= $espacios_por_piso; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </button>
            </div>
            <button onclick="guardarEspacio()">Guardar</button>
        </form>
        <a href="dashboard.php">Regresar al Menú Principal</a>
    </div>
</body>
</html>

