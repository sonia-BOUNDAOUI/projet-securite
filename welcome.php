<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); 
    exit();
}


if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="welcome-bg">
    <div class="welcome-container">
        <h1>Bonjour, <?php echo htmlspecialchars($_SESSION['username']); ?> !</h1>
        <p>Nous sommes ravis de vous accueillir !</p>

        <!-- Formulaire de déconnexion -->
        <form action="welcome.php" method="POST">
            <button type="submit" name="logout" class="btn-blue">Se déconnecter</button>
        </form>
    </div>
</body>
</html>
