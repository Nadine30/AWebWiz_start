<?php

/*
 * Ici se trouverait le code des bibliothèques externes,
 * téléchargées du web, reçues d'un partenaire, etc.
 *
 * Interdiction de modifier ce code => permettre les mises à jour
 */


 /**
  * Récupère les données JSON depuis une URL externe.
  * 
  * @return array Les données JSON décodées.
  */
 function get_sponsor_banner() {
     $url = 'http://playground.burotix.be/adv/banner_for_isfce.json';
     $json_data = file_get_contents($url);
     return json_decode($json_data, true);
 }
 