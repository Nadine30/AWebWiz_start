<?php

function html_article_main($article_a)
{
    $title = $article_a['title'];
    $hook = $article_a['hook'];
    $art_id = $article_a['id'];
    $content = $article_a['content'];
    $date = $article_a['date_published'];
    $image_path = MEDIA_ARTICLE_PATH .$article_a['image_name'];

	$out = <<<HTML
    
    <section class="article">
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1>$title</h1>
                    <h4>$hook</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-3">
                    <a href="?page=favorite&action=add&article_id=$art_id" class="favorite-link btn btn-warning m-2">Ajouter aux favoris</a>
                </div>
            </div>

            <div class="row justify-content-center">    
                <div class="col-md-8">
                    <div class="media_article"> <img src="$image_path" alt="$title" width="800"> </div>
                    <div class="text-primary">$date</div>
                    <div>$content</div>
                </div>                        
            </div>
            

        </div>
    </section>
    HTML;

	return $out;
}

