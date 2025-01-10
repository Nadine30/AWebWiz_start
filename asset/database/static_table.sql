CREATE TABLE t_static_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL
);

-- Insertion du premier contenu
INSERT INTO t_static_content (content) VALUES (
    "<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos de notre Application Web</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="text-white text-center py-3">
        <h1>À Propos de notre Application Web</h1>
    </header>

    <main class="container my-4">
        <section class="mb-4">
            <p class="lead text-center">
                Bienvenue sur notre site web interactif ! Ce projet a été conçu dans le cadre du cours 4IPW3 pour mettre en pratique l'architecture 
                Model-View-Controller (MVC) et intégrer différentes technologies web. Vous trouverez ci-dessous un aperçu des fonctionnalités disponibles, 
                les informations utiles pour naviguer, ainsi que des instructions pour optimiser votre expérience utilisateur.
            </p>
        </section>

        <section class="mb-4 text-center">
            <h2 class="text-primary">Fonctionnalités disponibles</h2>
            <div class="d-flex flex-column align-items-center">
                <ol class="text-left">
                    <li><strong>Menu de navigation intuitif :</strong>
                        <ul>
                            <li>Accès rapide aux pages principales : accueil, presse, recherche, favoris, temps de lecture, login, CGV et à propos.</li>
                        </ul>
                    </li>
                    <li><strong>Affichage dynamique des articles de presse :</strong>
                        <ul>
                            <li>Présentation de 10 articles maximum datés du 15 décembre 2023 sur la page d'accueil.</li>
                            <li>Sur la page presse, nous avons la présentation complète de l’article principale.</li>
                        </ul>
                    </li>
                    <li><strong>Recherche d'articles :</strong>
                        <ul>
                            <li>Recherchez des articles par plage de dates (min-max) grâce à un formulaire dédié.</li>
                            <li>Exemple de recherche :
                                <ul>
                                    <li>Date minimale : 01/12/2023</li>
                                    <li>Date maximale : 20/12/2023</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><strong>Panier d’articles favoris :</strong>
                        <ul>
                            <li>Ajoutez des articles à un panier personnel pour consultation ultérieure.</li>
                            <li>Sauvegarde du panier via SESSION.</li>
                            <li>Affichage des favoris avec leur nombre total sur une page dédiée.</li>
                            <li>Un bouton destiné à la suppression des articles ajoutées dans le panier.</li>
                        </ul>
                    </li>
                    <li><strong>Identification des utilisateurs :</strong>
                        <ul>
                            <li>Connexion sécurisée via un API externe (<a href="http://playground.burotix.be/login" target="_blank">Lien API</a>).</li>
                            <li>Gestion des rôles :
                                <ul>
                                    <li><strong>Admin :</strong> accès privilégié pour des tâches spécifiques.</li>
                                    <li><strong>Utilisateur :</strong> accès standard.</li>
                                </ul>
                            </li>
                            <li>Sauvegarde de l’état d’identification via COOKIE.</li>
                        </ul>
                    </li>
                    <li><strong>Personnalisation visuelle :</strong>
                        <ul>
                            <li>Options pour modifier l’apparence du site :</li>
                            <li>Épaisseur des bordures : none, thin, thick.</li>
                            <li>Police de caractères : trois choix disponibles.</li>
                            <li>Couleur de fond.</li>
                            <li>Préférences sauvegardées via SESSION.</li>
                        </ul>
                    </li>
                    <li><strong>Temps de lecture estimés :</strong>
                        <ul>
                            <li>La page présente la liste des articles avec le temps estimé pour la lecture de chaque article.</li>
                            <li>Il est évalué en divisant le nombre de mots contenu dans chaque article par la vitesse de lecture (le nombre de mots lus par minute).</li>
                        </ul>
                    </li>
                    <li><strong>Contenu statique :</strong>
                        <ul>
                            <li>Une page "À propos" pour documenter les fonctionnalités et guider les utilisateurs et une page CGV.</li>
                            <li>Ces pages proviennent d’une table `t_static_content` que nous avons créé dans la base de données `press_2024_v03`.</li>
                        </ul>
                    </li>
                    <li><strong>Publicité dynamique :</strong>
                        <ul>
                            <li>Intégration d’une bannière publicitaire sponsorisée via un fichier JSON externe.</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </section>

        <section class="mb-4 text-center">
            <h2 class="text-primary">Identifiants de connexion</h2>
            <ul class="d-inline-block text-left">
                <li><strong>Administrateur :</strong>
                    <ul>
                        <li>Login : admin</li>
                        <li>Mot de passe : admin</li>
                    </ul>
                </li>
                <li><strong>Utilisateur simple :</strong>
                    <ul>
                        <li>Login : user</li>
                        <li>Mot de passe : user</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section class="mb-4 text-center">
            <h2 class="text-primary">Liens d’intérêt</h2>
            <ul class="d-inline-block text-left">
                <li><strong>Publicité sponsorisée :</strong>
                    <a href="http://playground.burotix.be/adv/banner_for_isfce.json" target="_blank">
                        Lien vers la bannière publicitaire sponsorisée
                    </a>
                </li>
                <li><strong>API de connexion :</strong>
                    <a href="http://playground.burotix.be/login" target="_blank">
                        Lien vers l'API de connexion
                    </a>
                </li>
            </ul>
        </section>

        <section class="text-center">
            <p>Merci d'utiliser notre application web. Si vous avez des questions ou des suggestions, n’hésitez pas à nous contacter !</p>
        </section>
    </main>

    <footer class="bg-secondary text-white text-center py-3">
        <p>&copy; 2025 Notre Application Web. Tous droits réservés.</p>
    </footer>
</body>
</html>"

);

-- Insertion du deuxième contenu
INSERT INTO t_static_content (content) VALUES (
    '<h2>Conditions Générales de Vente</h2>
    <p>Voici les CGV ...</p>'
);
