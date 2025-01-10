<?php

function html_reading_times_main()
{
    $articles = get_all_article_a();

    ob_start();
    ?>
    <main class="container my-4">
        <h1 class="text-center mb-4">Temps de lecture des articles</h1>
        <div class="list-group">
            <?php foreach ($articles as $article): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= htmlspecialchars($article['title']) ?></span>
                    <span class="badge bg-primary rounded-pill">
                        <?= calculate_reading_time($article['content']) ?> minutes
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php
    return ob_get_clean();
}
