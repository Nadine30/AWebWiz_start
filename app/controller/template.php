<?php

function ctrl_head()
{
    $user_id = $_SESSION['id'] ?? '';
    $user_name = $_SESSION['name'] ?? '';
	$user_role = $_SESSION['role'] ?? '';

    // Appeler la fonction pour gérer le changement de couleur si nécessaire
    handle_bg_color_change();
    handle_theme_change();
    handle_font_policy_change();

	//get menu array from csv
	$menu_a = get_menu_csv();

    return html_head($menu_a);

}
/**
 * Fonction pour gérer la soumission du formulaire de changement de couleur
 */
function handle_bg_color_change()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bg_color'])) {
        $_SESSION['bg_color'] = htmlspecialchars($_POST['bg_color']);

        // Rediriger pour éviter une resoumission du formulaire
        $redirect_url = $_SERVER['REQUEST_URI'] ?? '?page=home';
        header("Location: $redirect_url");
        exit;
    }
}

/**
 * Fonction pour gérer la soumission du formulaire de changement de thème (bordures)
 */
function handle_theme_change()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['border_theme'])) {
        $valid_themes = ['none', 'thin', 'thick']; // Les thèmes valides
        $theme = htmlspecialchars($_POST['border_theme']);
        if (in_array($theme, $valid_themes, true)) {
            $_SESSION['border_theme'] = $theme;
        }
        header("Location: " . ($_SERVER['REQUEST_URI'] ?? '?page=home'));
        exit;
    }
}

/**
 * Fonction pour gérer la soumission du formulaire de changement de police
 */
function handle_font_policy_change()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['font_policy'])) {
        
        $valid_fonts = [
            'arial',
            "poppins",
            "nunito"
        ]; 
        $font = htmlspecialchars($_POST['font_policy']);
        if (in_array($font, $valid_fonts, true)) {
            $_SESSION['font_policy'] = $font; // Stocker la police sélectionnée
        }
        header("Location: " . ($_SERVER['REQUEST_URI'] ?? '?page=home'));
        exit;
    }
}

/**
  * Récupère les données JSON depuis une URL externe.
  * 
  * @return array Les données JSON décodées.
  */
  function get_sponsor_banner() {
    $url = 'http://playground.burotix.be/adv/banner_for_isfce.json';
    $json_data = file_get_contents($url);
    return json_decode($json_data, true);
}