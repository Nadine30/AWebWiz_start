<?php

function main_login()
{
    $action = $_GET['action'] ?? "";
    $msg = "";

    // Déconnexion de l'utilisateur
    if ($action === 'logout') {
        session_unset(); // Supprimer les variables de session
        session_destroy(); // Détruire la session
        $msg = "Vous êtes déconnecté.";
    }

    // Identification de l'utilisateur
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        list($isValid, $userName, $userRole) = login_validate($_POST['login'], $_POST['password']);

        if ($isValid) {
            // Identification réussie
            $_SESSION['name'] = $userName; // Stocker le nom d'utilisateur
			$_SESSION['role'] = $userRole;
            $msg = "Bienvenue, vous êtes identifié comme " . $_SESSION['name'];
            $msg .= html_logout_button(); // Ajouter bouton de déconnexion
        } else {
            // Échec de l'identification
            session_unset(); // Réinitialiser la session en cas d'échec
            $msg = "Échec de l'identification : Login ou mot de passe incorrect.";
        }
    }

    // Vérification si l'utilisateur est identifié
    if (isset($_SESSION['name'])) {
        // Utilisateur identifié
        $msg .= html_logout_button();
    } else {
        // Utilisateur non identifié : afficher le formulaire de connexion
        $msg .= html_unidentified_user();
    }

    // Retourner la page complète
    return join("\n", [
        ctrl_head(),
        html_open_form(),
        $msg,
        html_link_home(),
        html_close_form(),
        html_foot()
    ]);
}

?>
