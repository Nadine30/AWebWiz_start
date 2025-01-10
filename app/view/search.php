<?php

function html_search_form($min_date = null, $max_date = null)
{
    // Convertir les dates en format SQL (YYYY-MM-DD) si elles ne sont pas nulles
    $min_date = $min_date ? date('Y-m-d', strtotime($min_date)) : null;
    $max_date = $max_date ? date('Y-m-d', strtotime($max_date)) : null;

    ob_start();
    ?>
    <form method="GET">
        <label for="min_date">Date Min :</label>
        <input type="date" id="min_date" name="min_date" value="<?= htmlspecialchars($min_date) ?>">
        
        <label for="max_date">Date Max :</label>
        <input type="date" id="max_date" name="max_date" value="<?= htmlspecialchars($max_date) ?>">
        
        <button name="b_search">Rechercher</button>
    </form>
    <?php
    return ob_get_clean();
}


function html_article_search_main($article_aa)
{
    ob_start();
    ?>
    <section class="search-results">
        <?php
        if (empty($article_aa)) {
            echo "<p>Pas d'articles pour ces dates.</p>";
        } else {
            foreach ($article_aa as $art_a) {
                $title = $art_a['title'];
                $art_id = $art_a['id'];
                echo <<<HTML
                    <article>
                        <a href="?page=article&art_id=$art_id"><h1>{$title}</h1></a>
                    </article>
                HTML;
            }
        }
        ?>
    </section>
    <?php
    return ob_get_clean();
}
