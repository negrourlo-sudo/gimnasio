<?php
session_start();
require 'Socio.php';
require 'socios.php';

if (!isset($_SESSION['email_socio'])) {
    header('Location: login.php');
    exit;
}


$email = $_SESSION['email_socio'];
$nombre = '';
$tipoCuota = '';

foreach ($socios as $s) {
    if ($s['email'] === $email) {
        $nombre = $s['nombre'];
        $tipoCuota = $s['tipoCuota'];
        break;
    }
}

$socio = new Socio($nombre, $email, $tipoCuota);

$clasesBasicas = ['Yoga', 'Pilates', 'Spinning'];
$clasesPremium = ['Entrenamiento personal'];
$error = '';
$mensaje = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clase = $_POST['clase'] ?? '';

    if (trim($clase) === '') {
      $error = 'Tienes que indicar la clase';
     } else {
      $mensaje = 'Te has apuntado a: ' . $clase;
     }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gimnasio FitCode — Mi panel</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <header>
    <h1>Gimnasio FitCode</h1>
    <p>Hola · <a href="logout.php" style="color:white;">Cerrar sesión</a></p>
  </header>

  <main>

    <!-- Esto es lo que en panel.php genera $socio->resumen() -->
    <p><?= htmlspecialchars($socio->resumen()) ?></p>

    <?php if (isset($error)) : ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <!-- Este mensaje de éxito solo aparece después de enviar el formulario de abajo -->
     <?php if ($mensaje) : ?>
    <p class="exito"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <h2>Clases disponibles</h2>
    <ul>
      <?php foreach ($clasesBasicas as $c) : ?>
        <li><?= htmlspecialchars($c) ?></li>
      <?php endforeach; ?>
    </ul>

    <!--
      Este bloque solo se muestra si $socio->esPremium() es true.
      Para un socio con cuota "basica" (por ejemplo Luis), este <div> entero
      no aparecería en la página.
    -->
    <?php if ($socio->esPremium()) : ?>
      <div class="premium">
        <p>Clases exclusivas para socios premium:</p>
        <ul>
          <?php foreach ($clasesPremium as $c) : ?>
            <li><?= htmlspecialchars($c) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <h2>Apuntarme a una clase</h2>
    <form method="post" action="panel.php">
      <label for="clase">Clase</label>
      <input type="text" id="clase" name="clase">

      <button type="submit">Apuntarme</button>
    </form>

  </main>

</body>
</html>
