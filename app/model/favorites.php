<?php

/**
 * Ajoute un article aux favoris
 */
function add_to_favorites($article_id)
{
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    if (!in_array($article_id, $_SESSION['favorites'], true)) {
        $_SESSION['favorites'][] = $article_id;
    }
}

/**
 * Supprime un article des favoris
 */
function remove_from_favorites($article_id)
{
    if (isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = array_filter(
            $_SESSION['favorites'],
            fn($id) => $id !== $article_id
        );
    }
}

/**
 * Récupère tous les favoris
 */
function get_favorites()
{
    return $_SESSION['favorites'] ?? [];
}
