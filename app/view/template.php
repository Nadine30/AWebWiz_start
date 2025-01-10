<?php
function html_head($menu_a = [])
{
    $debug = false;
    // Définir la couleur de fond par défaut ou récupérer celle de la session
    $bg_color = isset($_SESSION['bg_color']) ? $_SESSION['bg_color'] : '#ffffff';
    $border_theme = $_SESSION['border_theme'] ?? 'none'; // Thème par défaut : sans bordure
    $font_policy = $_SESSION['font_policy'] ?? 'Arial, sans-serif';

    // Récupérer les informations de l'utilisateur depuis les cookies
    $cookie_user_name = $_COOKIE['name'] ?? null;
    $cookie_user_role = $_COOKIE['role'] ?? null;
    ob_start();
    
    ?>
    <html lang="fr">
    <head>
        <title>AWebWiz Template (MVC)</title>
        <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css" />  <!-- lib externe -->
        <link rel="stylesheet" href="./css/internal/main.css" /> <!-- lib interne / perso -->
        <script
                src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
        <script src="./js/quirks/QuirksMode.js"></script>
        <script src="./js/internal/favorite.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
       <style>
           body { 
            background-color: <?=$bg_color?>; 
            font-family: <?= $font_policy ?>;
            }
           img
           {
            <?php
                if ($border_theme === 'thin') {
                    echo 'border: 2px solid black;';
                } elseif ($border_theme === 'thick') {
                    echo 'border: 7px solid black;';
                } else {
                    echo 'border: none;';
                }
            ?>
           }
        </style> 
    </head>
    <body>
    <header>
        <h1>
            France 24 (MVC)
            <img src="./media/icon3.png">
        </h1>
        <!-- Formulaire pour changer la couleur de fond -->
        <form method="post" action="?action=change_bg_color" style="display: inline-block; margin-left: 20px;">
            <label for="bg_color">Couleur de fond :</label>
            <input type="color" id="bg_color" name="bg_color" value="<?= $bg_color ?>">
            <button type="submit">Appliquer</button>
        </form>
        <!-- Formulaire pour changer le thème -->
        <form method="post"  action="?action=theme_change" style="display:inline;">
            <label for="border_theme">Thème :</label>
            <select id="border_theme" name="border_theme">
                <option value="none" <?= $border_theme === 'none' ? 'selected' : '' ?>>Aucun</option>
                <option value="thin" <?= $border_theme === 'thin' ? 'selected' : '' ?>>Fin</option>
                <option value="thick" <?= $border_theme === 'thick' ? 'selected' : '' ?>>Épais</option>
            </select>
            <button type="submit">Appliquer</button>
        </form>
        <!-- Formulaire pour changer la police -->
        <form method="post" action="?action=font_policy_change" style="display: inline-block; margin-left: 20px;">
            <label for="font_policy">Choisir une police :</label>
            <select id="font_policy" name="font_policy">
                <option value="Arial, sans-serif" <?= $font_policy === 'Arial, sans-serif' ? 'selected' : '' ?>>Arial</option>
                <option value="'Poppins'" <?= $font_policy === "'Poppins'" ? 'selected' : '' ?>>Poppins</option>
                <option value="'Courier New', monospace" <?= $font_policy === "'Courier New', monospace" ? 'selected' : '' ?>>Courier New</option>
            </select>
            <button type="submit">Appliquer</button>
        </form>
        <!-- Menu -->
        <?php
        foreach($menu_a as $menu)
        {
            $text = $menu[0];
            $link = $menu[1];
            $option = isset($menu[2]) ? "&name={$menu[2]}" : "";
            echo <<< HTML
                <a href="?page=$link$option">$text</a> |
HTML;
        }
        ?>
        
        <!-- Message personnalisé pour l'utilisateur identifié -->
        <?php if ($cookie_user_name): ?>
            Bonjour, <?= htmlspecialchars($cookie_user_name) ?> (<?= htmlspecialchars($cookie_user_role) ?>).
        <?php else: ?>
            Utilisateur non identifié.
        <?php endif; ?>
       
    </header>
    <main>
    <?php

    if($debug)
    {
        var_dump($_COOKIE);
        var_dump($_SESSION);
        var_dump($_GET);
        var_dump($_POST);
    }
    return ob_get_clean();
}
function html_foot()
{
    ob_start();
    ?>
    </main>
    <footer>
        Made with the amazing AWebWiz framework
        <img src="./media/awebwiz.png" alt="AWebWiz logo">
    </footer>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
