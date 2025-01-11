<?php
session_start();

?>

<style>
    .row h1 {
            font-size: 24px;
            color: #2e7d32;
        }
    .innerdiv {
        text-align: center;
        margin: 20px;
    }

    .leftinnerdiv {
        float: left;
        width: 25%;
    }

    .rightinnerdiv {
        float: right;
        width: 70%;
    }

    .greenbtn {
        background-color: #3aa142;
        color: white;
        width: 95%;
        height: 40px;
        margin-top: 8px;
        border: none;
        cursor: pointer;
    }

    .greenbtn:hover {
        background-color: #4db355;
    }

    .form-container {
        border: 2px solid #3aa142;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    .form-container h2 {
        background-color: #3aa142;
        color: white;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        
    }

    label{
        font-size: bold;
    }
    
    .btn-submit {
        background-color: #4db355;
        color: white;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color:  #4db355;
    }

    <style>
    /* Boutons Modifier et Supprimer */
    .btn-modifier {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 5px 10px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-modifier:hover {
        background-color: #218838;
    }

    .btn-supprimer {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-supprimer:hover {
        background-color: #c82333;
    }

    /* Réduire la hauteur des cellules */
    table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }

    th, td {
      
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #343a40;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr td a {
        font-size: 14px;
    }
    .btn-group {
    display: flex;
    gap: 2px; /* Ajoute un espace entre les boutons */
    align-items: center;
}
.btn-modifier,
.btn-supprimer {
    display: inline-block; /* Assurez-vous que les boutons s'affichent comme des blocs en ligne */
    margin: 5px; /* Ajoute un espace entre les boutons */
}


.btn-modifier {
    background-color: #28a745; /* Vert pour le bouton Modifier */
    color: white;
    border: none;
    margin-right: 10px;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 5px;
}

.btn-modifier:hover {
    background-color: #218838; /* Vert plus foncé au survol */
}

.btn-supprimer {
    background-color: #dc3545; /* Rouge pour le bouton Supprimer */
    color: white;
    border: none;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 5px;
}

.btn-supprimer:hover {
    background-color: #c82333; /* Rouge plus foncé au survol */
}


</style>

</style>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mon Tableau de Bord</title>
    <meta name="description" content="Tableau de bord pour la gestion de bibliothèque.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- JavaScript Bootstrap et jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="innerdiv">
            <h1 class="text-center my-4">GESTION DE BIBLIOTHEQUE</h1>
            <div class="row">
            <h1>Bibliothèque Centrale</h1>
            </div>

            <!-- Barre latérale -->
            <div class="leftinnerdiv">
                <button class="greenbtn">Admin</button>
                <button class="greenbtn" onclick="openpart('addBook')">AJOUTE LIVRES</button>
                <button class="greenbtn" onclick="openpart('modifyBook')">LIVRES</button>
                <button class="greenbtn" onclick="openpart('reservations')">RÉSERVATIONS & EMPRUNTS</button>

                <a href="connexion.php"><button class="greenbtn">Déconnexion</button></a>
            </div>

            <!-- Zone principale -->
            <div class="rightinnerdiv">
                <!-- Formulaire Ajouter Livres -->
                <div id="addBook" class="form-container" style="display: none;">
                    <h2>Ajouter les livres</h2>
                    
                    <form action="add_livres.php" method="POST">

                        <label for="titres">Titre du Livre :</label>
                        <input type="text" id="titres" name="titres" class="form-control mb-3" required>

                        <label for="auteur">Auteur :</label>
                        <input type="text" id="auteur" name="auteur" class="form-control mb-3" required>

                        <label for="categorie">Catégorie :</label>
                        <select id="categorie" name="categorie" class="form-control mb-3" required>
                            <option value="">-- Sélectionnez une catégorie --</option>
                            <option value="Roman">Roman</option>
                            <option value="Science/Fiction">Science/fiction</option>
                            <option value="Histoire">Histoire</option>

                        </select>

                        <label for="etat">État :</label>
                        <select id="etat" name="etat" class="form-control mb-3" required>
                            <option value="">-- Sélectionnez l'état --</option>
                            <option value="disponible">Disponible</option>
                            <option value="emprunte">Emprunté</option>
                            <option value="reserve">Réservé</option>
                        </select>


                        <button type="submit" name="submit" class="btn-submit">AJOUTER</button>

                    </form>
                  
                </div>

                

                
               <!-- Section Modifier Livres -->
               <div id="modifyBook" class="form-container" style="display: none;">
                    <h2 class="text-center"> les Livres</h2>
                     <table class="table table-striped">
                        <thead class="thead-dark">
                             <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">État</th>
                                <th scope="col">Actions</th>
                             </tr>
                         </thead>
                    <tbody>
                    <?php
                        require 'config.php';

                        // Récupérer tous les livres
                        $sql = "SELECT * FROM livres";
                         $result = mysqli_query($conn, $sql);

                         while ($row = mysqli_fetch_assoc($result)) {
                         echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['titres']}</td>
                             <td>{$row['auteur']}</td>
                            <td>{$row['categorie']}</td>
                             <td>{$row['etat']}</td>
                            <td>
                        <a href='modifier_book.php?modifier={$row['id']}' class='btn-modifier'>Modifier</a> 
                                        <a href='modifier_book.php?supprimer={$row['id']}' class='btn-supprimer' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce livre ?\")'>Supprimer</a>
                                    </td>
                                </tr>";
                            }
                        
                         ?>
                    </tbody>
                    </table>
                </div>

                <div id="reservations" class="form-container" style="display: none;">
    <h2>Liste des emprunts et réservations</h2>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Emprunt</th>
                <th scope="col">Nom de l'utilisateur</th>
                <th scope="col">Email</th>
                <th scope="col">Titre du livre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date d'emprunt</th>
                <th scope="col">Date de retour</th>
                <th scope="col">État</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'config.php';

            // Récupérer les emprunts et réservations
            $sql = "
            SELECT e.id AS emprunt_id, 
                   u.nom AS utilisateur_nom, 
                   u.email AS utilisateur_email,
                   l.titres AS livre_titre, 
                   l.auteur AS livre_auteur, 
                   e.date_emprunt, 
                   e.date_retour, 
                   e.etat
            FROM emprunts e
            JOIN utilisateurs u ON e.id_utilisateur = u.id
            JOIN livres l ON e.id_livre = l.id
            WHERE e.etat IN ('emprunte', 'reserve');
        ";
        
        $result = $conn->query($sql);
        


            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>{$row['emprunt_id']}</td>
                    <td>{$row['utilisateur_nom']}</td>
                    <td>{$row['utilisateur_email']}</td>
                    <td>{$row['livre_titre']}</td>
                    <td>{$row['livre_auteur']}</td>
                    <td>{$row['date_emprunt']}</td>
                    <td>{$row['date_retour']}</td>
                    <td>{$row['etat']}</td>
                </tr>";
            }
            ?>
        </tbody>
        </table>
        </div> 
</div>

        </div>
            </div>

                
            </div>
            
        </div>
    </div>

    <script>
       
        $(function() {
                $('#ajouter').click(function(event) {
                     event.preventDefault(); // Empêche l'envoi par défaut
                    let form = $(this).closest("form"); // Récupère le formulaire

                Swal.fire({
                title: 'Confirmer l\'ajout',
                text: 'Êtes-vous sûr de vouloir ajouter ce livre ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, ajouter',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Envoie le formulaire si confirmé
                }
            });
        });
        });
        
        function openpart(partId) {
            // Cacher toutes les sections
            document.getElementById('addBook').style.display = 'none';
            document.getElementById('modifyBook').style.display = 'none';
            document.getElementById('reservations').style.display = 'none';
            // Afficher la section sélectionnée
            document.getElementById(partId).style.display = 'block';
        }
    </script>
</body>

</html>
