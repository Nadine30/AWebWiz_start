<?php

/**
 * retourne l'article à afficher sur la home page
 * en première position
 * temporairement c'est l'article d'id 1
 * @param $art_id id de l'article à getter dans la db
 * @return assoc array avec les données de l'article
 */

function get_article_a($art_id = null)
{
    switch(DATABASE_TYPE)
    {
        case "SQL":
            return get_article_a_sql($art_id);
        case "JSON":
            return get_article_a_json($art_id);
    }
    
}
function get_article_a_json($art_id)
{

    $fn = DATABASE_NAME;
    $art_db_s = file_get_contents($fn);
    $art_db_a = json_decode($art_db_s, true);
    foreach ($art_db_a as $art_a)
    {
        if ($art_a['id'] == $art_id) break;

    }
    // $art_a possède les données de l'article id 1
    return $art_a;
}

function get_article_a_sql($art_id) : array
{
    $q = <<<SQL
    SELECT 
        ident_art as id,
        title_art as title, 
        hook_art as hook, 
        content_art as content,
        'fk_category_art' as category,
        date_art as date_published,
        image_art as image_name
    FROM t_article 
    WHERE ident_art = :ident_art;
SQL;

    $pdo = get_pdo(); // création de l'objet PDO
    $stmt = $pdo->prepare($q);

    // Associer le paramètre `art_id` à la requête
    $stmt->execute(['ident_art' => $art_id]);

    // Récupérer le résultat
    $result = $stmt->fetch();

    // Si aucun article n'est trouvé, retourner un tableau vide
    if (!$result) {
        return [
            'title' => 'Article introuvable',
            'hook' => 'Désolé, cet article est introuvable.',
            'content' => '',
            'date_published' => '',
            'image_name' => 'default.png',
        ];
    }

    return $result;
}
//     $q = <<<SQL
//     SELECT 
//         ident_art as id,
//         title_art as title, 
//         hook_art as hook, 
//         content_art as content,
//         'fk_category_art' as category,
//         date_art as date_published,
//         image_art as image_name
//     FROM t_article 
//     WHERE DATE(date_art) = '2023-12-15'
//     ORDER BY ident_art DESC
//     LIMIT 10;
// SQL;
//     $pdo = get_pdo(); 
//     $stmt = $pdo->prepare($q);

//     $stmt->execute();

//     // Récupérer les résultats
//     $result = $stmt->fetchAll();

//     return $result;

    
//     $q = <<<SQL
//     SELECT 
//         ident_art as id,
//         title_art as title, 
//         '' as hook, 
//         content_art as content,
//         'fk_category_art' as category,
//         date_art as date_published,
//         image_art as image_name
//     FROM t_article 
//     WHERE ident_art = :ident_art;
// SQL;

//     $pdo = get_pdo(); // création de l'objet PDO si besoin
//     $stmt = $pdo->prepare($q);
//     $param = ['ident_art' => $art_id ];
//     $stmt->execute($param);

//     $result = $stmt->fetch();
//     return $result;
// Préparer une requête SQL pour récupérer les articles du 15 décembre 2023



function get_bottom_article_a()
{
    $art_aa = [];
    foreach ([ 2, 3, 4] as $art_id)
    {
        $art_aa[] = get_article_a($art_id);
    }
    return $art_aa;
}

/**
 * retourne tous les articles de la db
 */
function get_all_article_a()
{
    switch(DATABASE_TYPE)
    {
        case "SQL":
            return get_all_articles_a_sql();
        case "JSON":
            return get_all_articles_a_json();
    }
    
}

function get_all_articles_a_json()
{
    $fn = DATABASE_NAME;  
    $art_db_s = file_get_contents($fn);
    $art_db_a = json_decode($art_db_s, true);
    return $art_db_a;
}

function get_all_articles_a_sql(): array
{
    $q = <<<SQL
    SELECT 
        ident_art as id,
        title_art as title, 
        hook_art as hook, 
        content_art as content,
        fk_category_art as category,
        date_art as date_published,
        image_art as image_name
    FROM t_article 
    WHERE DATE(date_art) BETWEEN '2023-12-15' AND '2023-12-15'
    ORDER BY ident_art DESC
    LIMIT 10;
SQL;
    $pdo = get_pdo(); 
    $stmt = $pdo->prepare($q);

    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->fetchAll();

    return $result;

//     $q = <<<SQL
//     SELECT 
//         ident_art as id,
//         title_art as title, 
//         hook_art as hook, 
//         content_art as content,
//         'fk_category_art' as category,
//         date_art as 'date'
//     FROM t_article 
//     ORDER BY ident_art DESC 
//     LIMIT 10;
// SQL;

//     $pdo = get_pdo(); 
//     $stmt = $pdo->query($q);

//     $result = $stmt->fetchAll();
//     return $result;
}


function get_articles_by_date_range($min_date, $max_date)
{
    // // Vérifier si les dates sont valides
    // if (empty($min_date) || empty($max_date)) {
    //     return []; // Retourne une liste vide si les dates sont invalides
    // }

    $q = <<<SQL
    SELECT 
        ident_art as id,
        title_art as title, 
        hook_art as hook, 
        content_art as content,
        fk_category_art as category,
        date_art as date_published,
        image_art as image_name
    FROM t_article 
    WHERE date_art BETWEEN :min_date AND :max_date
    ORDER BY ident_art DESC;
SQL;

    try {
        $pdo = get_pdo(); // Récupérer la connexion PDO
        $stmt = $pdo->prepare($q);

        // Exécuter la requête avec les dates fournies
        $stmt->execute([
            'min_date' => $min_date,
            'max_date' => $max_date
        ]);

        // Récupérer et retourner les résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Gérer les erreurs en journalisant ou en affichant un message
        error_log("Erreur dans get_articles_by_date_range: " . $e->getMessage());
        return [];
    }
}

/**
 * Calcule le temps de lecture estimé d'un article
 * @param string $content Le contenu de l'article
 * @return int Le temps estimé en minutes
 */
function calculate_reading_time($content)
{
    $word_count = str_word_count(strip_tags($content)); // Nombre de mots
    $reading_speed = 200; // Nombre moyen de mots lus par minute
    return ceil($word_count / $reading_speed);
}


