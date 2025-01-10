<?php

/**
 * Retourne le contenu "À propos" depuis la base de données.
 * @return array Les données de la section "À propos".
 */
function get_cgv_content()
{
    switch (DATABASE_TYPE) {
        case "SQL":
            return get_cgv_content_sql();
        case "JSON":
            return get_cgv_content_json();
    }
}

/**
 * Récupérer le contenu "À propos" à partir d'un fichier JSON.
 * @return array Les données de la section "À propos".
 */
function get_cgv_content_json()
{
    $fn = DATABASE_NAME; 
    $data = file_get_contents($fn); 
    $content = json_decode($data, true); 
    
    // Trouver l'entrée associée au contenu "À propos"
    foreach ($content as $entry) {
        if (isset($entry['id']) && $entry['id'] === 'cgv') {
            return $entry;
        }
    }
    return [
        'title' => 'À propos introuvable',
        'content' => 'Le contenu demandé est introuvable.',
    ];
}

/**
 * Récupérer le contenu "À propos" à partir de la base de données SQL.
 * @return array Les données de la section "À propos".
 */
function get_cgv_content_sql(): array
{
    $q = <<<SQL
    SELECT 
        id, 
        content
    FROM t_static_content
    WHERE id = :id;
SQL;

    try {
        $pdo = get_pdo(); 
        $stmt = $pdo->prepare($q);

        // Exécuter la requête avec l'ID spécifié (par défaut, ID = 1 pour "À propos")
        $stmt->execute(['id' => 2]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return [
                'title' => 'À propos introuvable',
                'content' => 'Le contenu demandé est introuvable.',
            ];
        }

        return $result;
    } catch (PDOException $e) {
        error_log("Erreur dans get_cgv_content_sql: " . $e->getMessage());
        return [
            'title' => 'Erreur de base de données',
            'content' => 'Impossible de récupérer le contenu pour le moment.',
        ];
    }
}
?>
