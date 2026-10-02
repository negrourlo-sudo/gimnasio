<?php
session_start();

require 'socios.php';


if (isset($_SESSION['email_socio'])) {
    header('Location: panel.php');
    exit;
}

$error = '';
$email = '';
$clave = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $clave = $_POST['clave'] ?? '';

    $socioEncontrado = null;
    foreach ($socios as $s) {
      if ($s['email'] === $email) {
        $socioEncontrado = $s;
        break;
      }
    }

    if ($socioEncontrado && password_verify($clave, $socioEncontrado['clave'])) {
        $_SESSION['email_socio'] = $email;
        header('Location: panel.php');
        exit;
    } else {
        $error = 'Email o contraseña incorrectos.';
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gimnasio FitCode — Iniciar sesión</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <header>
    <h1>Gimnasio FitCode</h1>
    <p>Área de socios</p>
  </header>

  <main>

    <!-- En login.php este mensaje solo aparece si el login falla -->
    <?php if ($error): ?>
      <p class="errores"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
      <label for="email">Email</label>
      <input type="text" id="email" name="email">

      <label for="clave">Contraseña</label>
      <input type="password" id="clave" name="clave">

      <button type="submit">Entrar</button>
    </form>

  </main>

</body>
</html>
