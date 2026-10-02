<?php
// Datos de prueba: en UF1845 aprenderéis a guardar y consultar esto en una
// base de datos real con PDO. Por ahora, para centrarnos en POO, sesiones
// y seguridad, los tenemos en un array en memoria.
//
// Las contraseñas de prueba (en texto plano, solo para que puedas probar
// el login) son:
//   ana@fitcode.com   -> ana1234
//   luis@fitcode.com  -> luis2024
//   marta@fitcode.com -> marta777

$socios = [
    [
        'email' => 'ana@fitcode.com',
        'clave' => '$2b$10$1MhTAQX22ash2VX5yVqhLOlEJkTEOwMHCXO.BYtXij2PXwj6p1xdm',
        'nombre' => 'Ana García',
        'tipoCuota' => 'premium',
    ],
    [
        'email' => 'luis@fitcode.com',
        'clave' => '$2b$10$fi2lmOuzJH2M50aEsVfNyOWgEOEGWka.3e65t4cQyLoY.GWIsFOhu',
        'nombre' => 'Luis Martín',
        'tipoCuota' => 'basica',
    ],
    [
        'email' => 'marta@fitcode.com',
        'clave' => '$2b$10$1yZoi/aW381ycT3BUUhLbe4Y1rHiZYT.OfEq0ANF7fDvfyzVrGDmC',
        'nombre' => 'Marta Ruiz',
        'tipoCuota' => 'premium',
    ],
];