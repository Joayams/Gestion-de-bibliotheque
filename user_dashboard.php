<?php
// Démarrer la session
session_start();
require 'config.php'; // Connexion à la base de données

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: connexion.php");
    exit;
}

$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur = $_SESSION['nom']; // Nom de l'utilisateur connecté
$prenom_utilisateur = $_SESSION['prenom'] ?? ''; // Optionnel, si vous avez le prénom

// Requête SQL pour récupérer les livres empruntés
$emprunts_sql = "SELECT livres.titres, emprunts.date_emprunt, emprunts.date_retour 
                 FROM emprunts 
                 INNER JOIN livres ON emprunts.id_livre = livres.id
                 WHERE emprunts.id_utilisateur = $id_utilisateur";
$emprunts_result = mysqli_query($conn, $emprunts_sql);

// Stocker les résultats
$livres_empruntes = [];
if ($emprunts_result && mysqli_num_rows($emprunts_result) > 0) {
    $livres_empruntes = mysqli_fetch_all($emprunts_result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme Étudiant</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: #fdfdfd;
            color: #333;
            line-height: 1.6;
        }

        /* Header Section */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: #e8f5e9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 24px;
            color: #2e7d32;
        }

        header nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #2e7d32;
            font-size: 14px;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #1b5e20;
        }

        /* Main Section */
        main {
            padding: 40px;
            text-align: center;
        }

        main h2 {
            font-size: 28px;
            color: #2e7d32;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #2e7d32;
            color: white;
            margin-top: 40px;
        }

        footer a {
            color: #ffcc00;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Bienvenue, <?php echo htmlspecialchars($nom_utilisateur); ?></h1>
        <nav>
            <a href="rechercher.php">Rechercher un Livre</a>
         
            <a href="profile.php">Profil</a>
            <a href="connexion.php">Déconnexion</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Vos Informations</h2>
        <div class="card">
            <h3>Livres Empruntés</h3>
            <?php if (!empty($livres_empruntes)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date d'emprunt</th>
                            <th>Date de retour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($livres_empruntes as $livre): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($livre['titres']); ?></td>
                                <td><?php echo htmlspecialchars($livre['date_emprunt']); ?></td>
                                <td><?php echo htmlspecialchars($livre['date_retour']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Aucun livre emprunté pour le moment.</p>
            <?php endif; ?>
        </div>

        <div class="card">
            <h3>Prochains Événements</h3>
            <p>Découvrez nos conférences et ateliers à venir.</p>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Bibliothèque Centrale. Tous droits réservés. | <a href="#contact">Contactez-nous</a></p>
    </footer>
</body>
</html>