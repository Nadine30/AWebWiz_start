<?php
function html_head($menu_a = [])
{
    $debug = false;
    // Définir la couleur de fond par défaut ou récupérer celle des cookies
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
        <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/internal/main.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
        <script src="./js/quirks/QuirksMode.js"></script>
        <script src="./js/internal/favorite.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Poppins&display=swap" rel="stylesheet">
        <style>
           body {
               background-color: <?= $bg_color ?>;
               font-family: <?= $font_policy ?>;
           }
           img {
               <?= $border_theme === 'thin' ? 'border: 2px solid black;' : ($border_theme === 'thick' ? 'border: 7px solid black;' : 'border: none;') ?>
           }
        </style>
    </head>
    <body>
    <header>
        <h1>France 24 (MVC)</h1>
        <form method="post" action="?action=change_bg_color" style="display: inline-block; margin-left: 20px;">
            <label for="bg_color">Couleur de fond :</label>
            <input type="color" id="bg_color" name="bg_color" value="<?= $bg_color ?>">
            <button type="submit">Appliquer</button>
        </form>
        <form method="post" action="?action=theme_change" style="display:inline;">
            <label for="border_theme">Thème :</label>
            <select id="border_theme" name="border_theme">
                <option value="none" <?= $border_theme === 'none' ? 'selected' : '' ?>>Aucun</option>
                <option value="thin" <?= $border_theme === 'thin' ? 'selected' : '' ?>>Fin</option>
                <option value="thick" <?= $border_theme === 'thick' ? 'selected' : '' ?>>Épais</option>
            </select>
            <button type="submit">Appliquer</button>
        </form>
        <form method="post" action="?action=font_policy_change" style="display: inline-block; margin-left: 20px;">
            <label for="font_policy">Choisir une police :</label>
            <select id="font_policy" name="font_policy">
                <option value="arial" <?= $font_policy === 'arial' ? 'selected' : '' ?>>Arial</option>
                <option value="poppins" <?= $font_policy === 'poppins' ? 'selected' : '' ?>>Poppins</option>
                <option value="nunito" <?= $font_policy === 'nunito' ? 'selected' : '' ?>>Nunito</option>
            </select>
            <button type="submit">Appliquer</button>
        </form>
        <?php foreach ($menu_a as $menu): ?>
            <a href="?page=<?= $menu[1] ?>"><?= $menu[0] ?></a> |
        <?php endforeach; ?>
        <?php if ($cookie_user_name): ?>
            Bonjour, <?= htmlspecialchars($cookie_user_name) ?> (<?= htmlspecialchars($cookie_user_role) ?>).
        <?php else: ?>
            Utilisateur non identifié.
        <?php endif; ?>
    </header>
    <main>
    <?php
    if ($debug) {
        var_dump($_COOKIE);
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
    </footer>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
?>
