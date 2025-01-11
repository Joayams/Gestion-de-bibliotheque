<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_livre'])) {
    $id_livre = intval($_POST['id_livre']);
    $id_utilisateur = $_SESSION['id_utilisateur'] ?? null;

    if (!$id_utilisateur) {
        die("Utilisateur non connecté.");
    }

    // Vérifier si le livre est disponible
    $check_sql = "SELECT etat FROM livres WHERE id = $id_livre";
    $result = mysqli_query($conn, $check_sql);
    $book = mysqli_fetch_assoc($result);

    if ($book && $book['etat'] === 'disponible') {
        // Insérer dans la table réservation
        $insert_sql = "INSERT INTO reservations (id_livre, id_utilisateur, date_reservation, etat) 
                       VALUES ($id_livre, $id_utilisateur, NOW(), 'reserve')";
        mysqli_query($conn, $insert_sql);

        // Mettre à jour l'état du livre
        $update_sql = "UPDATE livres SET etat = 'reserve' WHERE id = $id_livre";
        mysqli_query($conn, $update_sql);

        echo "<script>alert('Le livre a été réservé avec succès.'); window.location.href = 'rechercher.php';</script>";
    } else {
        echo "<script>alert('Le livre n\'est pas disponible.'); window.location.href = 'rechercher.php';</script>";
    }
} else {
    die("Requête invalide.");
}
?>
