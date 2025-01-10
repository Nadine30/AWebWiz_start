<?php

/**
 * Bouton de déconnexion à afficher
 */
function html_logout_button()
{
    ob_start();
    ?>
    <a href="?page=login&action=logout">Se déconnecter</a>
    <?php
    return ob_get_clean();
}

/**
 * Formulaire d'ouverture
 */
function html_open_form()
{
    ob_start();
    ?>
    <form method="post" class="form-group w-50 mx-auto">
    <?php
    return ob_get_clean();
}

/**
 * Formulaire de fermeture
 */
function html_close_form()
{
    ob_start();
    ?>
    </form>
    <?php
    return ob_get_clean();
}

/**
 * Utilisateur non identifié (affichage du formulaire de connexion)
 */
function html_unidentified_user()
{
    ob_start();
    ?>
    <div class="form-group">
        <label for="login">Identifiez-vous :</label>
        <input type="text" name="login" id="login" class="form-control form-control-sm" placeholder="Login">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-sm mt-2" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-2">Se connecter</button>
    <?php
    return ob_get_clean();
}




/**
 * Lien vers la page d'accueil (ou autre)
 */
function html_link_home()
{
    ob_start();
    ?>
    <a href="?page=home" class="text-primary">Accueil</a>
    <?php
    return ob_get_clean();
}

?>
