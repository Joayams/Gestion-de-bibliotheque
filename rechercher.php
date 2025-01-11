<?php
// Inclure le fichier config.php
require 'config.php'; // Assurez-vous que config.php initialise la connexion avec `mysqli_connect`

// Initialiser un tableau pour stocker les résultats
$searchResults = [];

// Obtenir la connexion à la base de données
$conn = mysqli_connect('localhost', 'root', '', 'bibliotheque'); // Adapté à votre configuration

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Vérifier si une recherche est effectuée
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['query'])) {
    $query = trim($_GET['query']);
    
    // Échapper la requête pour éviter les injections SQL
    $queryEscaped = mysqli_real_escape_string($conn, $query);

    // Requête pour chercher par titre ou auteur
    $sql = "SELECT * FROM livres WHERE titres LIKE '%$queryEscaped%' OR auteur LIKE '%$queryEscaped%'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
} else {
    // Requête pour charger tous les livres par défaut
    $sql = "SELECT * FROM livres";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un Livre</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            color: #333;
            padding: 20px;
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

        .container {
            max-width: 90%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #2e7d32;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .search-bar form {
            display: flex;
            justify-content: center;
        }

        .search-bar input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #2e7d32;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #1b5e20;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #343a40;
            color: white;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .etat-reserve {
            color: white;
            background-color: #ffc107;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .etat-emprunte {
            color: white;
            background-color: #dc3545;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .etat-disponible {
            color: white;
            background-color: #28a745;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .btn {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin: 0 5px;
    color: #fff;
    text-align: center;
}

.btn-emprunter {
    background-color: #79f784; /* Vert */
}

.btn-emprunter:hover {
    background-color: #218838;
}

.btn-reserver {
    background-color: #f5aeae; /* Bleu */
}

.btn-reserver:hover {
    background-color: #f56e6e;
}

.etat-non-disponible {
    color: #6c757d;
    font-weight: bold;
}

    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Bibliothèque Centrale</h1>
            <nav>
                <a href="rechercher.php">Rechercher un Livre</a>
                <a href="emprunter.php">Emprunter un Livre</a>
                <a href="profile.php">Profil</a>
                <a href="logout.php">Déconnexion</a>
            </nav>
        </div>
        
    </header>
    
    <div class="container">
        <h1>Rechercher un Livre</h1>
        <div class="search-bar">
            <form method="GET" action="rechercher.php">
                <input type="text" name="query" placeholder="Rechercher par titre ou auteur..." value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                <button type="submit">Rechercher</button>
            </form>
        </div>

        <table id="booksTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>État</th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($searchResults as $book): ?>
        <tr>
            <td><?php echo htmlspecialchars($book['id']); ?></td>
            <td><?php echo htmlspecialchars($book['titres']); ?></td>
            <td><?php echo htmlspecialchars($book['auteur']); ?></td>
            <td><?php echo htmlspecialchars($book['categorie']); ?></td>
            <td>
                <?php if (strtolower($book['etat']) === 'disponible'): ?>
                    <span class="etat-disponible">Disponible</span>
                <?php elseif (strtolower($book['etat']) === 'emprunte'): ?>
                    <span class="etat-emprunte">Emprunté</span>
                <?php elseif (strtolower($book['etat']) === 'reserve'): ?>
                    <span class="etat-reserve">Réservé</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if (strtolower($book['etat']) === 'disponible'): ?>
                    <form method="POST" action="emprunter.php" style="display:inline;">
                        <input type="hidden" name="id_livre" value="<?php echo $book['id']; ?>">
                        <button type="submit" class="btn-emprunter">Emprunter</button>
                    </form>
                    <form method="POST" action="reserver.php" style="display:inline;">
                        <input type="hidden" name="id_livre" value="<?php echo $book['id']; ?>">
                        <button type="submit" class="btn-reserver">Réserver</button>
                    </form>
                <?php else: ?>
                    <span class="etat-non-disponible">Non disponible</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#booksTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/French.json'
            },
            pageLength: 10,
            searching: false // Désactiver la barre de recherche automatique de DataTables
        });
    });
</script>
<footer>
        <p>&copy; 2024 Bibliothèque Centrale. Tous droits réservés. | <a href="#contact">Contactez-nous</a></p>
    </footer>
</body>
</html>
