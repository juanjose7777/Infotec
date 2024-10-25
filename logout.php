<?php

// Iniciar la sesión si no está iniciada
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar a una URL específica después de destruir la sesión
header("Location: index.php");
exit(); // Asegúrate de salir después de la redirección
