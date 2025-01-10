<?php

function main_login()
{
    $action = $_GET['action'] ?? "";
    $msg = "";

    // Déconnexion de l'utilisateur
    if ($action === 'logout') {
        clear_user_cookies(); 
        $msg = "Vous êtes déconnecté.";
    }

    // Identification de l'utilisateur
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        list($isValid, $userName, $userRole) = login_validate($_POST['login'], $_POST['password']);

        if ($isValid) {
            set_user_cookies($userName, $userRole); 
            $msg = "Bienvenue, vous êtes identifié comme " . htmlspecialchars($userName);
            $msg .= html_logout_button(); // Ajouter le bouton de déconnexion après le message
        } else {
            clear_user_cookies(); 
            $msg = "Échec de l'identification : Login ou mot de passe incorrect.";
            $msg .= html_unidentified_user(); // Afficher le formulaire de connexion
        }
    }

    // Vérification si l'utilisateur est identifié via les cookies
    if (isset($_COOKIE['name']) && isset($_COOKIE['role'])) {
        $msg .= html_logout_button();
    } else if (empty($msg)) {
        $msg .= html_unidentified_user();
    }

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
