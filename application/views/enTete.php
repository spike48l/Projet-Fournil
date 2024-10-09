<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Accueil.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style2.css');?>">
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-thin-rounded/css/uicons-thin-rounded.css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-straight/css/uicons-regular-straight.css'>
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
		<title>Site avec codeigniter</title>
	</head>
	<body>
	<header class="fixed-header">
    <div class="logo">
        <a href="<?php echo site_url('welcome/index'); ?>"> <!-- Ajout du lien ici -->
            <img src="<?php echo base_url('assets/img/logoBoulangerie.png'); ?>" alt="Logo Boulangerie"/>
        </a> <!-- Fermeture de la balise <a> -->
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="<?php echo site_url('welcome/contenu/Pains');?>"><i class="fi fi-tr-baguette"></i>Pains</a></li>
            <li><a href ="<?php echo site_url('welcome/contenu/Viennoiseries');?>"><i class="fi fi-tr-croissant"></i>Viennoiseries</a></li>
            <li><a href ="<?php echo site_url('welcome/contenu/Specialites');?>"><i class="fi fi-rr-cake-birthday"></i>Spécialités</a></li>
            <li><a href="<?php echo site_url('welcome/contenu/seConnecter');?>"><i class="fas fa-sign-in-alt"></i></i>Connexion</a></li>
        </ul>
    </nav>
</header>

</html>




