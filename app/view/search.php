<?php

function html_search_form($min_date = null, $max_date = null)
{
    // Convertir les dates en format SQL (YYYY-MM-DD) si elles ne sont pas nulles
    $min_date = $min_date ? date('Y-m-d', strtotime($min_date)) : null;
    $max_date = $max_date ? date('Y-m-d', strtotime($max_date)) : null;

    ob_start();
    ?>
    <div class="search-form container my-4 p-4 bg-light rounded shadow">
        <form method="GET" class="row g-3">
            <div class="col-md-5">
                <label for="min_date" class="form-label">Date Min :</label>
                <input type="date" id="min_date" name="min_date" class="form-control" value="<?= htmlspecialchars($min_date) ?>">
            </div>
            <div class="col-md-5">
                <label for="max_date" class="form-label">Date Max :</label>
                <input type="date" id="max_date" name="max_date" class="form-control" value="<?= htmlspecialchars($max_date) ?>">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" name="b_search" class="btn btn-warning w-100">Rechercher</button>
            </div>
        </form>
    </div>
    <?php
    return ob_get_clean();
}

function html_article_search_main($article_aa)
{
    ob_start();
    ?>
    <section class="search-results container my-4">
        <?php
        if (empty($article_aa)) {
            echo "<p class='text-center text-danger'>Pas d'articles pour ces dates.</p>";
        } else {
            echo "<div class='row'>";
            foreach ($article_aa as $art_a) {
                $title = htmlspecialchars($art_a['title']);
                $art_id = $art_a['id'];
                $hook = htmlspecialchars($art_a['hook'] ?? '');
                $image = htmlspecialchars($art_a['image_name'] ?? 'default.png');

                echo <<<HTML
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="path/to/media/{$image}" class="card-img-top" alt="{$title}">
                            <div class="card-body">
                                <h5 class="card-title">{$title}</h5>
                                <p class="card-text text-muted">{$hook}</p>
                                <a href="?page=article&art_id={$art_id}" class="btn btn-primary">Lire l'article</a>
                            </div>
                        </div>
                    </div>
                HTML;
            }
            echo "</div>";
        }
        ?>
    </section>
    <?php
    return ob_get_clean();
}
