<?php

/**
 * build <body>
 * @param $user
 * @param $role
 */
function html_home_main($articles, $bottom_article_a)
{
    ob_start();
    ?>
    <section class="breaking">
        <?php foreach ($articles as $article): ?>
            <article>
            
                <a href="?page=article&art_id=<?= $article['id'] ?>">
                <div class="media_article ">
                        <img src="<?= MEDIA_ARTICLE_PATH . htmlspecialchars($article['image_name']) ?>" 
                             alt="<?= htmlspecialchars($article['title']) ?>" 
                             width="600">
                    </div>
                    <h1><?= htmlspecialchars($article['title']) ?></h1>
                </a>
                <a href="?page=favorite&action=add&article_id=<?= $article['id'] ?>">Ajouter aux favoris</a>
                <h2><?= htmlspecialchars($article['hook']) ?></h2>
            </article>
        <?php endforeach; ?>
    </section>
    <?php
    // echo html_all_articles_main($bottom_article_a);

    return ob_get_clean();
    // $title = $article_a['title'];
    // $hook = $article_a['hook'];
    // $art_id = $article_a['id'];

	// ob_start();
	//?>
    <!-- <section class="breaking">
        <article>
            <a href="?page=article&art_id=<?=$art_id?>"><h1><?=$title?></h1></a>
            <h2><?=$hook?></h2>
        </article>
    </section> -->
    <?php
    // echo html_all_articles_main($bottom_article_a);
   
	// return ob_get_clean();
}

