<?php
  session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /');
    }
  require 'connectbd.php';

    if (!empty($_POST['correo']) && !empty($_POST['contraseña'])) {
        $records = $conn->prepare('SELECT id, correo, contraseña FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = 'inicio seesion exitoso';

    if (count($results) > 0 && password_verify($_POST['contraseña'], $results[''])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /"); /* lugar a donde se redigiria al iniciar sesion*/
    } else {
        $message = 'Las credenciales no coinciden';
    }
  }
?>