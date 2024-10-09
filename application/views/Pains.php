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
<body>

	<h1>Pains :</h1>
	<div class="produits-info">
		<?php
			foreach($pains as $row) {	
				echo "<div class='produit'>";
				echo "<div class='produit-info'>";
				echo "<img src='" . base_url($row['Photo']) . "' alt='Produit'><br><br>"; // Ajout de l'attribut alt pour l'image
				echo '<strong>Désignation : </strong>';
				echo $row['Designation'] . '<br><br>';
				echo '<strong>Prix : </strong>';
				echo $row['Prix'] .'€'. '<br><br>';
				echo '<strong>Poids : </strong>';
				echo $row['Poids'] .'g'. '<br><br>';
				echo '<strong>Description : </strong>';
				echo $row['Description'] . '<br><br>';
				echo '<strong>Allergènes : </strong>';
				echo $row['Allergene'] . '<br><br>';
				echo "<strong>Traces possibles d'allergènes : </strong>";
				echo ($row["traces possibles"] ? "Oui" : "Non") . "<br><br>";
				echo "</div>"; // Fermer produit-info
				echo "</div>"; // Fermer produit
			}
		?>
	</div>
</body>
</html>
