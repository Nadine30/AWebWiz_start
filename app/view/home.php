<?php

/**
 * build <body>
 * @param $user
 * @param $role
 */
function html_home_main($articles)
{
    ob_start();
    ?>

    <section class="articles-section">
        <div class="container">
            <div class="row mb-4" style="background-color: rgb(240, 237, 237); padding: 20px; margin: 20px; border-radius: 10px;">
                <div class="col-md-6">
                    <?php if (isset($articles[0])): ?>    
                        <a href="?page=article&art_id=<?= $articles[0]['id'] ?>">
                            <img src="<?= MEDIA_ARTICLE_PATH . htmlspecialchars($articles[0]['image_name']) ?>" 
                            alt="<?= htmlspecialchars($articles[0]['title']) ?>"
                            class="img-fluid img1">
                            <h6 class="bg-info mt-2"><?= htmlspecialchars($articles[0]['title']) ?></h6>
                            <a href="?page=favorite&action=add&article_id=<?= $articles[0]['id'] ?>" class="btn btn-warning btn-sm">Ajouter aux favoris</a>
                            <p><?= htmlspecialchars($articles[0]['hook']) ?></p>
                        </a>                       
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <?php if (isset($articles[$i])): ?>                      
                            <a href="?page=article&art_id=<?= $articles[$i]['id'] ?>">
                                <img src="<?= MEDIA_ARTICLE_PATH . htmlspecialchars($articles[$i]['image_name']) ?>" 
                                    alt="<?= htmlspecialchars($articles[$i]['title']) ?>" class="img-fluid img2"
                                    >
                                <h6 class="bg-info mt-2"><?= htmlspecialchars($articles[$i]['title']) ?></h6>
                            </a>
                            <a href="?page=favorite&action=add&article_id=<?= $articles[$i]['id'] ?>" class="btn btn-warning btn-sm">Ajouter aux favoris</a>
                            <p><?= htmlspecialchars($articles[$i]['hook']) ?></p>
                        </article>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="row justify-content-between ">
                <div class="col-md-5">
                    <?php for ($i = 4; $i <= 6; $i++): ?>
                        <?php if (isset($articles[$i])): ?>                    
                            <a href="?page=article&art_id=<?= $articles[$i]['id'] ?>">
                                <img src="<?= MEDIA_ARTICLE_PATH . htmlspecialchars($articles[$i]['image_name']) ?>" 
                                    alt="<?= htmlspecialchars($articles[$i]['title']) ?>" 
                                    class="img-fluid img2">
                                <h6 class="bg-info mt-2"><?= htmlspecialchars($articles[$i]['title']) ?></h6>
                            </a>
                            <a href="?page=favorite&action=add&article_id=<?= $articles[$i]['id'] ?>" class="btn btn-warning btn-sm">Ajouter aux favoris</a>
                            <p><?= htmlspecialchars($articles[$i]['hook']) ?></p>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="col-md-6">
                    <?php for ($i = 7; $i <= 9; $i++): ?>
                        <?php if (isset($articles[$i])): ?>                            
                            <a href="?page=article&art_id=<?= $articles[$i]['id'] ?>">
                                <img src="<?= MEDIA_ARTICLE_PATH . htmlspecialchars($articles[$i]['image_name']?? 'default.jpg') ?>" 
                                    alt="<?= htmlspecialchars($articles[$i]['title']) ?>" 
                                    class="img-fluid img2">
                                <h6 class="bg-info mt-2"><?= htmlspecialchars($articles[$i]['title']) ?></h6>
                            </a>
                            <a href="?page=favorite&action=add&article_id=<?= $articles[$i]['id'] ?>" class="btn btn-warning btn-sm">Ajouter aux favoris</a>
                            <p><?= htmlspecialchars($articles[$i]['hook']) ?></p>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
