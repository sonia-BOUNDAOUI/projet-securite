<?php
session_start();


include('db.php'); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];  
        $password = $_POST['password']; 
        
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            
            var_dump($user); 
            
            
            if (password_verify($password, $user['password_hash'])) { 
                
                $_SESSION['username'] = $user['username'];  
                $_SESSION['user_id'] = $user['id'];         
                
                
                var_dump($_SESSION); 

                
                header("Location: welcome.php");
                exit();
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>