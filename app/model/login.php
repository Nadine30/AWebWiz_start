<?php
function login_validate($login, $password)
{
    try {
        // Construire l'URL avec les paramètres GET
        $url = 'http://playground.burotix.be/login';
        $query = http_build_query([
            'login' => $login,
            'passwd' => $password
        ]);
        $final_url = $url . '?' . $query;

        // Envoyer la requête GET
        $response = file_get_contents($final_url);

        // Vérifier si la requête a échoué
        if ($response === false) {
            return [false, null];
        }

        // Décoder la réponse JSON
        $result = json_decode($response, true);

        // Traiter le résultat
        if (isset($result['identified']) && $result['identified'] === true) {
            return [true, $result['name'], $result['role']];
        } else {
            return [false, null];
        }
    } catch (Exception $e) {
        // Gestion des erreurs
        return [false, null];
    }
}
?>
