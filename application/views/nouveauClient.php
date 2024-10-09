<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Créer un compte - Boulangerie</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script>
        function validate() {
            let pass = document.getElementById('login-password1').value;
            let passConfirm = document.getElementById('login-password2').value;
            if (pass !== passConfirm) {
                alert("Les deux mots de passe ne correspondent pas");
                return false; // Empêche la soumission du formulaire
            }else if((pass.length < 12)||!pass.match(/[a-z]/) && !pass.match(/[A-Z]/)||!pass.match(/\d/)||!pass.match(/[^a-zA-Z\d]/)){
                alert("Votre mot de passe doit comprendre :\n- Minimum 12 caractères\n- Minimum 1 majuscules et 1 minuscule\n- Minimum un chiffre \n- Minimum un caractère spécial");
                return false;
            }
            return true; // Permet la soumission du formulaire
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Créer un compte client</h2>
        <?php echo form_open('welcome/nouveauClients', ['class' => 'formI', 'onsubmit' => 'return validate()']); ?>
            <fieldset>
                <legend>Informations du client</legend>
                <div class="form-group">
                    <label for="nom-user">Nom Client</label>
                    <input type="text" id="nom-user" name="nomClient" required />
                </div>
                
                <div class="form-group">
                    <label for="email-user">Email</label>
                    <input type="text" id="email-user" name="email" required />
                </div>
                <div class="form-group">
                    <label for="phone-user">Téléphone</label>
                    <input id="phone" type="text" name="phone" required />
                </div>
                <div class="form-group">
                    <label for="numRue-user">N° rue</label>
                    <input id="numRue" type="text" name="numRue" required />
                </div>
                <div class="form-group">
                    <label for="rue-user">Rue</label>
                    <input id="rue" type="text" name="rue" required />
                </div>
                <div class="form-group">
                    <label for="cp-user">Code Postal</label>
                    <input id="cp" type="text" name="codePostal" required />
                </div>
                <div class="form-group">
                    <label for="ville-user">Ville</label>
                    <input id="ville" type="text" name="ville" required />
                </div>  
                <div class="form-group">
                <label for="clientPro">
                        <input type="radio" name="pro" value="1" required /> Professionnel
                        <input type="radio" name="pro" value="0" required /> Particulier
                    </label>
                </div>
                <div class="form-group">
                    <label for="id-user">Identifiant du compte</label>
                    <input type="text" id="id-user" name="idClient" required />
                </div>
                <div class="form-group">
                    <label for="login-password1">Mot de passe</label>
                    <input type="password" id="login-password1" name="password" required />
                </div>
              
                <div class="form-group">
                    <label for="login-password2">Confirmer votre Mot de passe</label>
                    <input type="password" id="login-password2" name="confirm_password" required />
                </div>
                <div class="button-container">
                    <input type="submit" value="Créer un compte" class="btn">
                    <input type="reset" value="Annuler" class="btn reset">
                </div>
            </fieldset>
        <?php echo form_close(); ?>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
