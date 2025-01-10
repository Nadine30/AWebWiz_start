<?php

function main_reading_times()
{
    $articles = get_all_article_a();
    
    // Calculer les temps de lecture pour chaque article
    $reading_times = [];
    foreach ($articles as $article) {
        $reading_times[] = [
            'title' => $article['title'],
            'reading_time' => calculate_reading_time($article['content']),
        ];
    }

    return join("\n", [
        ctrl_head(),
        html_reading_times_main($reading_times),
        html_foot(),
    ]);
}
