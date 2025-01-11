<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign_up'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $role = $_POST['role'];
    $id = mysqli_connect("localhost", "root", "", "bibliotheque");

    $req = "SELECT * FROM utilisateurs WHERE email='$mail'";
    $res = mysqli_query($id, $req);

    if (mysqli_num_rows($res) == 0) {
        $req = "INSERT INTO utilisateurs (nom, prenom, email, `mot de passe`, role) 
                VALUES ('$nom', '$prenom', '$mail', '$mdp', '$role')";
        $res = mysqli_query($id, $req);

        if ($res) {
            echo "<script>alert('Inscription réussie, connectez-vous maintenant.');</script>";
        } else {
            echo "<script>alert('Erreur : Impossible de vous inscrire.');</script>";
        }
    } else {
        echo "<script>alert('Erreur : Cet email est déjà utilisé.');</script>";
    }
}

?>
