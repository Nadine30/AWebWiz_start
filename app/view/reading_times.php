<?php

function html_reading_times_main()
{
    // Récupérer tous les articles
    $articles = get_all_article_a();

    ob_start();
    ?>
    <main>
        <h1>Temps de lecture des articles</h1>
        <ul>
            <?php foreach ($articles as $article): ?>
                <li>
                    <?= htmlspecialchars($article['title']) ?> => 
                    <?= calculate_reading_time($article['content']) ?> minutes
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <?php
    return ob_get_clean();
}

