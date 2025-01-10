<?php

function main_login()
{
    $action = $_GET['action'] ?? "";
    $msg = "";

    // Déconnexion de l'utilisateur
    if ($action === 'logout') {
        clear_user_cookies(); // Supprimer les cookies
        $msg = "Vous êtes déconnecté.";
    }

    // Identification de l'utilisateur
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        list($isValid, $userName, $userRole) = login_validate($_POST['login'], $_POST['password']);

        if ($isValid) {
            // Identification réussie
            set_user_cookies($userName, $userRole); // Définir les cookies
            $msg = "Bienvenue, vous êtes identifié comme " . htmlspecialchars($userName);
            $msg .= html_logout_button(); // Ajouter le bouton de déconnexion après le message
        } else {
            // Échec de l'identification
            clear_user_cookies(); // Réinitialiser les cookies en cas d'échec
            $msg = "Échec de l'identification : Login ou mot de passe incorrect.";
            $msg .= html_unidentified_user(); // Afficher le formulaire de connexion
        }
    }

    // Vérification si l'utilisateur est identifié via les cookies
    if (isset($_COOKIE['name']) && isset($_COOKIE['role'])) {
        // Utilisateur identifié
        $msg .= html_logout_button();
    } else if (empty($msg)) {
        // Utilisateur non identifié : afficher le formulaire de connexion
        $msg .= html_unidentified_user();
    }

    // Retourner la page complète
    return join("\n", [
        html_head(),
        html_open_form(),
        $msg,
        html_link_home(),
        html_close_form(),
        html_foot()
    ]);
}

?>
