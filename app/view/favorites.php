<?php

function html_favorite_main($favorites, $message)
{
    ob_start();
    ?>
    <section class="favorites">
        <h1>Vos articles favoris</h1>
        <p><?= htmlspecialchars($message) ?></p>
        <ul>
            <?php foreach ($favorites as $article): ?>
                <li>
                    <a href="?page=article&art_id=<?= $article['id'] ?>">
                        <?= htmlspecialchars($article['title']) ?>
                    </a>
                    <!-- Bouton pour supprimer l'article des favoris -->
                    <form method="post" action="?page=favorite&action=remove&article_id=<?= $article['id'] ?>" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <?php
    return ob_get_clean();
}
