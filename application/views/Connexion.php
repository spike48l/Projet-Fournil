<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion - Boulangerie</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Accueil.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style2.css'); ?>">
    
</head>
<body>
    <div class="login-container">
        <h2>Se connecter</h2>
        <?php echo form_open('welcome/traitementConnexion', ['class' => 'formI']); ?>
            <fieldset>
                <legend>Se connecter</legend>
                <div class="form-group">
                    <label for="login-user">Identifiant</label>
                    <input type="text" id="login-user" name="user" required />
                </div>
                <div class="form-group">
                    <label for="login-password">Mot de passe</label>
                    <input type="password" id="login-password" name="password" required />
                </div>
                <div class="button-container">
                    <input type="submit" value="Se connecter" class="btn">
                    <input type="reset" value="Annuler" class="btn reset">
                    <a href="<?php echo site_url('welcome/contenu/nouveauClient');?>"><input type="Nouveau" value="Nouveau Client ?" class="btn"></a>
                </div>
            </fieldset>
        <?php echo form_close(); ?>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</body>
<footer>
</footer>
</html>
