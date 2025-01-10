<?php
/**
 * Génère la page avec un article complet
 * @return string html
 */
function main_article()
{
    $art_id = $_GET['art_id'];
    
    $article_a = get_article_a($art_id);

    return join( "\n", [
		ctrl_head( ),
		html_article_main($article_a),
		html_foot(),
	]);
}