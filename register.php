<?php
require_once('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Nom d'utilisateur ou email déjà pris.";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

       
        $query = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            echo "Compte créé avec succès!";
            header("Location: index.php"); 
        } else {
            echo "Erreur lors de l'inscription : " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Créer un compte</h2>
        <form action="register.php" method="POST">
            <div class="input-group">
                <label for="username">Identifiant :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="submit-container">
                <button type="submit" class="submit-btn">S'inscrire</button>
            </div>
        </form>
    </div>
</body>
</html>

