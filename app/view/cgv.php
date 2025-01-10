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
            <div>$content</div>
        </article>
    </section>
    HTML;

    return $out;
}

/**
 * Génère le contenu HTML pour afficher d'autres sections ou liens associés.
 * @param array $sections Liste des autres sections.
 * @return string Contenu HTML.
 */
function html_other_cgv_sections($sections)
{
    ob_start();
    ?>
    <section class="other-sections">
        <?php
        foreach ($sections as $section) {
            $title = $section['title'];
            $id = $section['id'];

            echo <<<HTML
                <article>
                    <a href="?page=section&id=$id"><h2>{$title}</h2></a>
                </article>
            HTML;
        }
        ?>
    </section>
    <?php
    return ob_get_clean();
}
?>
