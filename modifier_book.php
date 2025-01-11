<?php
require 'config.php';
session_start();

// Vérifier si l'utilisateur est connecté et s'il est administrateur
if (!isset($_SESSION['id_utilisateur']) || $_SESSION['role'] !== 'administrateur') {
    die("Accès non autorisé.");
}

// Gérer la suppression du livre
if (isset($_GET['supprimer'])) {
    $id_livre = intval($_GET['supprimer']);
    $delete_sql = "DELETE FROM livres WHERE id = $id_livre";
    if (mysqli_query($conn, $delete_sql)) {
        echo "<script>alert('Livre supprimé avec succès.'); window.location.href = 'admin_dashboard.php';</script>";
        exit;
    } else {
        echo "<script>alert('Erreur lors de la suppression du livre.'); window.location.href = 'admin_dashboard.php';</script>";
        exit;
    }
}

// Gérer la modification d'un livre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier_livre'])) {
    $id = intval($_POST['id']);
    $titres = mysqli_real_escape_string($conn, $_POST['titres']);
    $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);
    $categorie = mysqli_real_escape_string($conn, $_POST['categorie']);
    $etat = mysqli_real_escape_string($conn, $_POST['etat']);

    $update_sql = "UPDATE livres SET titres = '$titres', auteur = '$auteur', categorie = '$categorie', etat = '$etat' WHERE id = $id";
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Livre modifié avec succès.'); window.location.href = 'admin_dashboard.php';</script>";
        exit;
    } else {
        echo "<script>alert('Erreur lors de la modification.'); window.location.href = 'admin_dashboard.php';</script>";
        exit;
    }
}

// Charger les informations du livre à modifier
if (isset($_GET['modifier'])) {
    $id_livre = intval($_GET['modifier']);
    $livre_sql = "SELECT * FROM livres WHERE id = $id_livre";
    $result = mysqli_query($conn, $livre_sql);
    $livre = mysqli_fetch_assoc($result);

    if (!$livre) {
        die("Livre introuvable.");
    }
} else {
    die("Aucun livre sélectionné pour modification.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Livre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5e9;
            padding: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input, form select, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        form button {
            background-color: #09d9ce;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Modifier un Livre</h2>
    <form method="POST" action="modifier.php">
        <input type="hidden" name="id" value="<?php echo $livre['id']; ?>">
        
        <label for="titres">Titre :</label>
        <input type="text" id="titres" name="titres" value="<?php echo htmlspecialchars($livre['titres']); ?>" required>

        <label for="auteur">Auteur :</label>
        <input type="text" id="auteur" name="auteur" value="<?php echo htmlspecialchars($livre['auteur']); ?>" required>

        <label for="categorie">Catégorie :</label>
        <input type="text" id="categorie" name="categorie" value="<?php echo htmlspecialchars($livre['categorie']); ?>" required>

        <label for="etat">État :</label>
        <select id="etat" name="etat" required>
            <option value="disponible" <?php echo $livre['etat'] === 'disponible' ? 'selected' : ''; ?>>Disponible</option>
            <option value="emprunte" <?php echo $livre['etat'] === 'emprunte' ? 'selected' : ''; ?>>Emprunté</option>
            <option value="reserve" <?php echo $livre['etat'] === 'reserve' ? 'selected' : ''; ?>>Réservé</option>
        </select>

        <button type="submit" name="modifier_livre">Enregistrer les modifications</button>
    </form>
</body>
</html>
