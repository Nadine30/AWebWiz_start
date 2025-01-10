<?php
/**
 * Génère la page avec un article complet
 * @return string html
 */
function main_article()
{
    $art_id = $_GET['art_id'];
    
    //récupérer les données de cet article
    $article_a = get_article_a($art_id);

    //afficher la page
    return join( "\n", [
		ctrl_head( ),
        // html_search_form(),
		html_article_main($article_a),
		html_foot(),
	]);
}