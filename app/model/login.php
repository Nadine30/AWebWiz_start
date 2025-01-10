<?php
function login_validate($login, $password)
{
    try {
        $url = 'http://playground.burotix.be/login';
        $query = http_build_query([
            'login' => $login,
            'passwd' => $password
        ]);
        $final_url = $url . '?' . $query;

        $response = file_get_contents($final_url);

        if ($response === false) {
            return [false, null, null];
        }

        $result = json_decode($response, true);

        if (isset($result['identified']) && $result['identified'] === true) {
            return [true, $result['name'], $result['role']];
        } else {
            return [false, null, null];
        }
    } catch (Exception $e) {
        return [false, null, null];
    }
}

function set_user_cookies($name, $role)
{
    // Définir les cookies pour l'utilisateur identifié
    setcookie('name', $name, time() + 3600, '/'); 
    setcookie('role', $role, time() + 3600, '/'); 
}

function clear_user_cookies()
{
    // Supprimer les cookies de l'utilisateur
    setcookie('name', '', time() - 3600, '/');
    setcookie('role', '', time() - 3600, '/');
}
?>
