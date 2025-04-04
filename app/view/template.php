<?php
function html_head($menu_a = [])
{
    // Définir la couleur de fond par défaut ou récupérer celle des cookies
    $bg_color = isset($_SESSION['bg_color']) ? $_SESSION['bg_color'] : '#ffffff';
    $border_theme = $_SESSION['border_theme'] ?? 'none'; 
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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
        <img src="./media/icon3.png" alt="icon france24" class="icon img-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="d-flex justify-content-center mb-3">
                    <?php foreach ($menu_a as $menu): ?>
                        <a href="?page=<?= $menu[1] ?>" class="mx-2"><?= $menu[0] ?></a> |
                    <?php endforeach; ?>
                    <?php if ($cookie_user_name): ?>
                        Bonjour, <?= htmlspecialchars($cookie_user_name) ?> (<?= htmlspecialchars($cookie_user_role) ?>).
                    <?php else: ?>
                        Utilisateur non identifié.
                    <?php endif; ?>
                </nav>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 d-flex justify-content-center">
                <form method="post" action="?action=change_bg_color" style="display: inline-block; margin-left: 20px;">
                    <label for="bg_color">Couleur de fond :</label>
                        <input type="color" id="bg_color" name="bg_color" value="<?= $bg_color ?>">
                        <button type="submit" class="btn btn-primary">Appliquer</button>
                </form>             
                <form method="post" action="?action=theme_change" style="display:inline;margin-left: 20px;">
                    <label for="border_theme">Thème :</label>
                        <select id="border_theme" name="border_theme">
                            <option value="none" <?= $border_theme === 'none' ? 'selected' : '' ?>>Aucun</option>
                            <option value="thin" <?= $border_theme === 'thin' ? 'selected' : '' ?>>Fin</option>
                            <option value="thick" <?= $border_theme === 'thick' ? 'selected' : '' ?>>Épais</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Appliquer</button>
                </form>
                <form method="post" action="?action=font_policy_change" style="display: inline-block; margin-left: 20px;">
                    <label for="font_policy">Choisir une police :</label>
                        <select id="font_policy" name="font_policy">
                            <option value="arial" <?= $font_policy === 'arial' ? 'selected' : '' ?>>Arial</option>
                            <option value="poppins" <?= $font_policy === 'poppins' ? 'selected' : '' ?>>Poppins</option>
                            <option value="nunito" <?= $font_policy === 'nunito' ? 'selected' : '' ?>>Nunito</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Appliquer</button>
                </form>
            </div>
        </div>
                   
    </header>
    <main>
    <?php
    
    return ob_get_clean();
}

function html_foot()
{
    ob_start();
    // Récupération des données JSON pour la bannière
    $sponsor_banner = get_sponsor_banner();
    $banner = $sponsor_banner['banner_4IPDW'];

    ?>
    </main>
    <footer class="text-dark py-4">
        <div class="container">
            <div class="row text-center align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <a href="https://www.france24.com/fr/" target="_blank">
                        <img src="./media/icon3.png" alt="logo-France24" class="img-fluid" style="max-width: 150px;">
                    </a>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <a href="https://www.france24.com/fr/" target="_blank" class="text-dark text-decoration-none">
                        <p class="mb-0">
                            Tous les droits réservés. Cliquez ici pour visiter le site original de France24.
                        </p>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" target="_blank" class="mx-2">
                        <img src="./media/facebook.svg" alt="facebook-logo" class="img-fluid" style="max-width: 30px;">
                    </a>
                    <a href="#" target="_blank" class="mx-2">
                        <img src="./media/whatsapp.svg" alt="whatsapp-logo" class="img-fluid" style="max-width: 30px;">
                    </a>
                    <a href="#" target="_blank" class="mx-2">
                        <img src="./media/linkedin.svg" alt="linkedin-logo" class="img-fluid" style="max-width: 30px;">
                    </a>
                </div>
            </div>

            <div class="text-center mt-3">
                <p class="mb-0">Made with the amazing AWebWiz framework</p>
            </div>

            <div class="mt-4" style="background-color: <?= htmlspecialchars($banner['color']) ?>; border-radius: 15px; padding: 15px;">
                <a href="<?= htmlspecialchars($banner['link']) ?>" class="text-decoration-none text-white">
                    <img src="<?= htmlspecialchars($banner['image']) ?>" alt="Sponsor Banner" class="img-fluid rounded" style="max-width: 100%;">
                    <p class="text-center mt-2 mb-0"><?= htmlspecialchars($banner['text']) ?></p>
                </a>
            </div>
        </div>
    </footer>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
