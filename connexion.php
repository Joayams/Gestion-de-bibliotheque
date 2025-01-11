<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign_in'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    // Requête pour vérifier l'utilisateur
    $req = "SELECT * FROM utilisateurs WHERE email='$mail' AND `mot de passe`='$mdp'";

    $res = mysqli_query($conn, $req);

    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);

        // Définir les sessions
        $_SESSION['id_utilisateur'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['role'] = $user['role'];

        // Redirection selon le rôle
        if ($user['role'] === 'administrateur') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
    } else {
        echo "<script>alert('Identifiants incorrects');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In / Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f8f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 900px;
            display: flex;
            justify-content: space-between;
            background-color: #e8f5e9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .form-box {
            flex: 1;
            padding: 30px;
            text-align: center;
        }

        .form-box h2 {
            color: #ffa000;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-box form {
            display: flex;
            flex-direction: column;
        }

        .form-box input, .form-box select, .form-box button {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-box input:focus, .form-box select:focus, .form-box button:focus {
            outline: none;
            border: 1px solid #79f784;
        }

        .form-box input, .form-box select {
            background-color: #fff;
        }

        .form-box button {
            background-color: #388e3c;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .form-box button:hover {
            background-color: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sign In Form -->
        <div class="form-box">
            <h2>Connexion</h2>
            <form method="POST" action="connexion.php">
                <input type="email" name="mail" placeholder="Email" required>
                <input type="password" name="mdp" placeholder="Password" required>
                <button type="submit" name="sign_in">Sign In</button>
            </form>
        </div>

        <!-- Sign Up Form -->
        <div class="form-box">
            <h2>Inscription</h2>
            <form method="POST" action="inscription.php">
                <input type="text" name="nom" placeholder="Name" required>
                <input type="text" name="prenom" placeholder="Surname" required>
                <input type="email" name="mail" placeholder="Email" required>
                <input type="password" name="mdp" placeholder="Password" required>
              
                <select name="role" required>
                    <option value="utilisateur">Utilisateur</option>
                    <option value="administrateur">Administrateur</option>
                </select>
                <button type="submit" name="sign_up">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>
