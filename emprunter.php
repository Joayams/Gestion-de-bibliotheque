<?php
session_start();
require 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_utilisateur'])) {
    die("Erreur : Vous devez être connecté.");
}

$id_utilisateur = $_SESSION['id_utilisateur'];
$id_livre = intval($_POST['id_livre'] ?? 0);

// Vérifier si le livre est disponible
$check_sql = "SELECT etat FROM livres WHERE id = $id_livre";
$result = mysqli_query($conn, $check_sql);
$book = mysqli_fetch_assoc($result);

if ($book && $book['etat'] === 'disponible') {
    // Insérer dans la table emprunt avec la date de retour calculée
    $insert_sql = "INSERT INTO emprunts (id_livre, id_utilisateur, date_emprunt, date_retour, etat) 
                   VALUES ($id_livre, $id_utilisateur, NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH), 'emprunte')";
    if (mysqli_query($conn, $insert_sql)) {
        // Mettre à jour l'état du livre
        $update_sql = "UPDATE livres SET etat = 'emprunte' WHERE id = $id_livre";
        mysqli_query($conn, $update_sql);

        echo "<script>alert('Le livre a été emprunté avec succès.'); window.location.href = 'rechercher.php';</script>";
    } else {
        echo "<script>alert('Le livre n\'est pas disponible'); window.location.href = 'rechercher.php';</script>";
    }
}
?>
