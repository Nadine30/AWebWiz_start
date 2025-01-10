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
    <form method="post">
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
    return <<<HTML
        Identifiez-vous :
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Mot de passe">
        <button type="submit">Se connecter</button>
    HTML;
}

/**
 * Lien vers la page d'accueil (ou autre)
 */
function html_link_home()
{
    ob_start();
    ?>
    <a href="?page=home">Accueil</a>
    <?php
    return ob_get_clean();
}

?>
