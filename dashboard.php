<?php
session_start();
include './library/include.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_data'])) {
    header("Location: login.php");
    exit();
}

// Obtener los datos del usuario desde la sesión o desde la API, según sea necesario
$userData = $_SESSION['user_data'];

// Aquí deberías implementar la lógica para obtener más información del usuario si es necesario
// Por ejemplo, obtener el número de claves, usuarios en línea, enlaces al panel de clientes, etc.

// Establecer valores de ejemplo (sustituir con la lógica real)
$numKeys = isset($_SESSION["numKeys"]) ? $_SESSION["numKeys"] : 0;
$numUsers = isset($_SESSION["numUsers"]) ? $_SESSION["numUsers"] : 0;
$numOnlineUsers = isset($_SESSION["numOnlineUsers"]) ? $_SESSION["numOnlineUsers"] : 0;
$customerPanelLink = isset($_SESSION["customerPanelLink"]) ? $_SESSION["customerPanelLink"] : '#';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TIO HACKS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-7fzTHsFSJvjURgpg4nl3BrW7HEIjGhOczqz2nFF2gYmqSzIa3Zp1PBdHyMCGGFRZ" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="center-content">
        <div class="hangar-form">
            <img draggable="false" src="resours/mascara.png" alt="Dashboard" class="hangar-logo">
            <h1 class="hangar-auth_title">
                <span>╰┈➤Dashboard</span>
            </h1>
            <div class="dashboard-info">
                <p><strong>Username:</strong> <?php echo htmlspecialchars($userData['username']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
                <p><strong>Number of Keys:</strong> <?php echo $numKeys; ?></p>
                <p><strong>Number of Users:</strong> <?php echo $numUsers; ?></p>
                <p><strong>Number of Online Users:</strong> <?php echo $numOnlineUsers; ?></p>
                <p><strong>Customer Panel Link:</strong> <a href="<?php echo htmlspecialchars($customerPanelLink); ?>" target="_blank">Go to Panel</a></p>
            </div>
            <div class="hangarButtonBase-root hangarButton-root hangarButton-text hangarButton-textPrimary" id="logoutButton">
                <button class="hangarButton-label" onclick="window.location.href='logout.php'">Logout</button>
            </div>
        </div>
    </div>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>
