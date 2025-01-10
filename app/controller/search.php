<?php
function main_search()
{  
    $min_date = $_GET['min_date'] ?? null;
    $max_date = $_GET['max_date'] ?? null;

    if ($min_date && $max_date && $min_date <= $max_date) {
        // Vérification des dates dans l'intervalle requis
        if ($min_date <= '2023-12-15' && $max_date >= '2023-12-15') {
            $all_article_a = get_all_articles_a_sql(); // Récupère tous les articles
        } else {
            $all_article_a = [];
        }
    } else {
        $all_article_a = [];
    }

    return join("\n", [
        ctrl_head(),
        html_search_form($min_date, $max_date),
        html_article_search_main($all_article_a),
        html_foot(),
    ]);
}
