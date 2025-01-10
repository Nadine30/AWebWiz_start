<?php

function main_favorite()
{
    // Vérifier l'action demandée
    $action = $_GET['action'] ?? 'view';
    $article_id = $_GET['article_id'] ?? null;

    // Initialiser les favoris dans la session s'ils n'existent pas encore
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    $message = "";

    switch ($action) {
        case 'add':
            // Ajouter l'article aux favoris
            if ($article_id) {
                if (!in_array($article_id, $_SESSION['favorites'])) {
                    $_SESSION['favorites'][] = $article_id;
                    $message = "L'article a été ajouté aux favoris.";
                } else {
                    $message = "L'article est déjà dans vos favoris.";
                }
            } 
            break;

        case 'remove':
            // Supprimer l'article des favoris
            if ($article_id) {
                remove_from_favorites($article_id);
                $message = "L'article a été supprimé des favoris.";
            } 
            break;

        case 'view':
            default:
            // Vérifier si les favoris sont vides
            if (empty($_SESSION['favorites'])) {
                $message = "Aucun article pour le moment.";
            } else {
                $message = ""; 
            }
            break;
    }

    // Obtenir les articles favoris
    $favorites = get_favorites_details($_SESSION['favorites']);

    return join( "\n", [
		ctrl_head( ),
		html_favorite_main($favorites, $message),
		html_foot(),
	]);
    
}


/**
 * Récupère les détails des articles favoris depuis la base de données ou un fichier CSV.
 */
function get_favorites_details($favorites)
{
    $articles = get_all_articles_a_sql(); 
    $favorite_articles = [];

    foreach ($articles as $article) {
        if (in_array($article['id'], $favorites)) {
            $favorite_articles[] = $article;
        }
    }

    return $favorite_articles;
}
