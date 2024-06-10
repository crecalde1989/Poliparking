<?php
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password == $password_confirm) {
        $sql = "INSERT INTO users (name, email, password, password_confirm) VALUES ('$name', '$email', '$password', '$password_confirm')";
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
            <button type="submit">Register</button>
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        </form>
        <p><a href="login.php">Login</a></p>
    </div>
</body>
</html>
