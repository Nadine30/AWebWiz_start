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
    $fn = DATABASE_NAME; // Nom du fichier JSON
    $data = file_get_contents($fn); // Charger le contenu du fichier
    $content = json_decode($data, true); // Décoder en tableau PHP
    
    // Trouver l'entrée associée au contenu "À propos"
    foreach ($content as $entry) {
        if (isset($entry['id']) && $entry['id'] === 'cgv') {
            return $entry;
        }
    }

    // Retour par défaut si le contenu "À propos" est introuvable
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
    FROM static_content
    WHERE id = :id;
SQL;

    try {
        $pdo = get_pdo(); // Récupérer la connexion PDO
        $stmt = $pdo->prepare($q);

        // Exécuter la requête avec l'ID spécifié (par défaut, ID = 1 pour "À propos")
        $stmt->execute(['id' => 2]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // echo var_dump($result);
        // die();

        // Si aucun contenu n'est trouvé, retourner une valeur par défaut
        if (!$result) {
            return [
                'title' => 'À propos introuvable',
                'content' => 'Le contenu demandé est introuvable.',
            ];
        }

        return $result;
    } catch (PDOException $e) {
        // Gérer les erreurs de requête SQL
        error_log("Erreur dans get_cgv_content_sql: " . $e->getMessage());
        return [
            'title' => 'Erreur de base de données',
            'content' => 'Impossible de récupérer le contenu pour le moment.',
        ];
    }
}
?>
