<?php

/**
 * Génère le contenu HTML pour la section "À propos".
 * @param array $about_data Données de la section "À propos".
 * @return string Contenu HTML.
 */
function html_about_main($about_data)
{
    $content = $about_data['content'];


    $out = <<<HTML
    <section class="about">
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
function html_other_sections($sections)
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
