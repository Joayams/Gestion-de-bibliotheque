<?php

include "config.php";

  if (isset($_POST['submit'])) {

        $titres = $_POST['titres'];
        $auteur = $_POST['auteur'];
        $categorie = $_POST['categorie'];
        $etat = $_POST['etat'];

        if (empty($titres) || empty($auteur) || empty($categorie) || empty($etat)) {
            echo "Erreur : Tous les champs sont obligatoires.";
            exit;
        }

        if (!in_array($etat, ['disponible', 'emprunte', 'reserve'])) {
          echo "Erreur : Valeur de l'état invalide.";
          exit;
      }

        // Vérifier si le livre existe déjà
    $sql_check = "SELECT * FROM livres WHERE titres = '$titres' AND auteur = '$auteur' AND categorie = '$categorie'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Erreur : Ce livre existe déjà dans la base de données.";
    } else {
        // Insérer le livre s'il n'existe pas
        $sql = "INSERT INTO livres (titres, auteur, categorie, etat) 
                VALUES ('$titres', '$auteur', '$categorie', '$etat')";

        if ($conn->query($sql) === TRUE) {
            echo "Livre ajouté avec succès";
        } else {
            echo "Erreur : " . $conn->error;
        }
    }

    $conn->close();
}
?>

