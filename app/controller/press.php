<?php

// function main_press()
// {
//     // get all aticles
//     $all_article_a = get_all_article_a();

//     // get HTML code 
    

// 	return join( "\n", [
// 		ctrl_head( ),
// 		html_all_articles_main($all_article_a),
// 		html_foot(),
// 	]);

// }
function main_press()
{
    // Récupérer tous les articles
    $all_article_a = get_all_article_a();

    // Vérifier si la liste d'articles est non vide
    if (!empty($all_article_a)) {
        // Sélectionner le premier article
        $first_article = $all_article_a[0];

        // Générer la vue pour afficher cet article en entier
        return join("\n", [
            ctrl_head(),
            html_article_main($first_article),
            html_foot(),
        ]);
    }
}
