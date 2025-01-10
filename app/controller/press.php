<?php

function main_press()
{
    $all_article_a = get_all_article_a();

    if (!empty($all_article_a)) {
        // Sélectionner le premier article
        $first_article = $all_article_a[0];

        return join("\n", [
            ctrl_head(),
            html_article_main($first_article),
            html_foot(),
        ]);
    }
}
