<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Accueil.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style2.css'); ?>">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-thin-rounded/css/uicons-thin-rounded.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-straight/css/uicons-regular-straight.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>
    <style>
    /* Styles pour le tableau */
        table {
            width: 80%; /* Réduit la largeur du tableau */
            border-collapse: collapse; /* Fusionner les bordures des cellules */
            margin: 20px auto; /* Centrer le tableau avec une marge en haut et en bas */
            background-color: #ffffff; /* Couleur de fond blanche */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Ombre portée plus légère */
            border-radius: 5px; /* Coins arrondis */
        }

        th, td {
            padding: 10px; /* Réduit le rembourrage pour les cellules */
            text-align: left; /* Alignement du texte à gauche */
            border-bottom: 1px solid #f2f2f2; /* Bordure inférieure légère */
            font-size: 14px; /* Taille de police réduite */
        }

        th {
            background-color: #b5673a; /* Couleur de fond marron foncé pour l'en-tête */
            color: white; /* Couleur du texte blanche */
            font-weight: bold; /* Gras pour l'en-tête */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Couleur de fond pour les lignes paires */
        }

        tr:hover {
            background-color: #f1f1f1; /* Couleur au survol pour les lignes */
            cursor: pointer; /* Curseur de pointeur au survol */
        }

        .btn {
            background-color: #b5673a; /* Couleur de fond du bouton */
            color: white; /* Couleur du texte */
            padding: 8px 12px; /* Réduit le rembourrage du bouton */
            border: none; /* Pas de bordure */
            border-radius: 5px; /* Coins arrondis */
            cursor: pointer; /* Curseur de pointeur */
            transition: background-color 0.3s; /* Transition pour la couleur de fond */
            font-size: 14px; /* Taille de police réduite pour le bouton */
        }

        .btn:hover {
            background-color: #a2562c; /* Couleur plus foncée au survol */
        }

    </style>
</head>
<div class="container">
        <h2>Votre Commande</h2>

        <div class="messages">
            <?php if ($this->session->flashdata('success')): ?>
                <div style="color: green;"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('error')): ?>
                <div style="color: red;"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-container">
            
        <form action="<?php echo site_url('welcome/passerCommande'); ?>" method="post">
            <table id ="commandeProduit">
                <thead>
                    <tr>
                        <th>Référence produit</th>
                        <th>Désignation du Produit</th>
                        <th>Prix Unitaire</th>
                        <th>Quantité</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($produit as $row) {
                    echo "<tr>";
                    echo '<td><input type="hidden" name="reference[]" value="'.$row['Reference'].'">'.$row['Reference'].'</td>'; // Champs caché pour référence
                    echo '<td>'.$row['Designation'].'</td>';
                    echo '<td class="prixP">'.$row['Prix'].'</td>';
                    echo '<td class="quantiteP"><input type="number" id="quantiteP" name="quantite[]" min="0" value="0"></td>'; // Assurez-vous que le name est "quantite[]"
                    echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="Total">Prix total (€)</th>
                        <td id="prixTotal" name ="total">0</td>
                    </tr>
                </tfoot>
            </table>
            <!-- Champ caché pour le montant total -->
            <input type="hidden" id="hiddenTotal" name="total" value="0">
            <div class="button-container"> 
                <input type="submit" value="Commander" class="btn">
                <input type="reset" value="Annuler" class="btn reset">
            </div>
        </form>

        </div>

        <footer>
            <p><a href="<?php echo site_url(); ?>">Retourner à l'accueil</a></p>
        </footer>
    </div>

    <footer>
        <p><a href="<?php echo site_url(); ?>">Retourner à l'accueil</a></p>
    </footer>
</body>
<script>
   function calculerTotal() {
    let total = 0;
    const table = document.getElementById("commandeProduit");
    const lignes = table.querySelectorAll('tbody tr');

    lignes.forEach(ligne => {
        const prix = parseFloat(ligne.querySelector(".prixP").textContent);
        const champQuantite = ligne.querySelector('.quantiteP input');
        const quantite = parseInt(champQuantite.value) || 0; // Valeur par défaut : 0 si vide ou invalide

        if (!isNaN(prix) && !isNaN(quantite)) {
            const sousTotal = prix * quantite;
            total += sousTotal;
        }
    });

    // Mettre à jour le total dans le pied de la table
    document.getElementById('prixTotal').textContent = total.toFixed(2);

    // Mettre à jour le champ caché pour le montant total
    document.getElementById('hiddenTotal').value = total.toFixed(2);
}

// Attacher l'événement 'input' à chaque champ de quantité
document.querySelectorAll('.quantiteP input').forEach(input => {
    input.addEventListener('input', calculerTotal);
});

// Calcul initial au chargement de la page
calculerTotal();

</script>
</html>
