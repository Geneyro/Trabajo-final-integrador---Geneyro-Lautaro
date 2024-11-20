<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "gldetail"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre_cliente = $email_cliente = $mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST['nombre'];
    $email_cliente = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO mensajes_contacto (nombre_cliente, email_cliente, mensaje) 
            VALUES ('$nombre_cliente', '$email_cliente', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensaje enviado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - GL Detail</title>
    <link rel="stylesheet" href="estilos/main.css">
</head>
<body>
    <header>
        <h1>Contacto</h1>
    </header>

    <section class="contact-form">
        <form action="contact.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </section>
</body>
</html>
