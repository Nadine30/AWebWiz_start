<?php

function html_favorite_main($favorites, $message)
{
    ob_start();
    ?>
    <section class="favorites container my-5">
        <h1 class="text-center text-warning mb-4">Vos articles favoris</h1>
        <p class="text-center text-secondary"><?= htmlspecialchars($message) ?></p>
        
        <div class="row justify-content-center">
            <div class="col-md-8 bg-light p-4 rounded shadow">
                <?php if (!empty($favorites)): ?>
                    <p class="text-center text-success mb-4">Total des articles favoris : <strong><?= count($favorites) ?></strong></p>
                    <ul class="list-unstyled">
                        <?php foreach ($favorites as $article): ?>
                            <li class="mb-4 pb-3 border-bottom text-center">
                                <a href="?page=article&art_id=<?= $article['id'] ?>" class="h4 text-primary text-decoration-none">
                                    <?= htmlspecialchars($article['title']) ?>
                                </a>
                                <form method="post" action="?page=favorite&action=remove&article_id=<?= $article['id'] ?>" class="mt-2">
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
