<?php

/**
 * Génère le contenu HTML pour la section "À propos".
 * @param array $cgv_data Données de la section "À propos".
 * @return string Contenu HTML.
 */
function html_cgv_main($cgv_data)
{
    $content = $cgv_data['content'];


    $out = <<<HTML
    <section class="cgv">  
        <article>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        $content
                    </div>
                </div>
            </div>
            
        </article>
    </section>
    HTML;

    return $out;
}

