# leHangar.local - Atelier du 02/11/2021 au 06/11/2021

## Installation
- `composer install`
- `npm install`
- [Setup BDD côté PHP](config/)
- Setup DBB côté Docker

Créer le fichier docker-compose.env à la racine du projet comme suit :
```
MYSQL_ROOT_PASSWORD=
MYSQL_USER=
MYSQL_PASSWORD=
MYSQL_DATABASE=
```
- `composer run build`

## Démarrage
- `composer run start` ou `composer run restart`

## Identifiants
* Tous les mots de passe sont `azer1234`
* Producteur
    - bocage1u
    - earl1u
    - mpetit1u
* Coopération
    - employe1
    - employe2
## Documents fournis
- [Présentation du sujet](https://arche.univ-lorraine.fr/pluginfile.php/2676892/mod_resource/content/0/prez-cc.pdf "Présentation du sujet sous forme de slides hébergé sur Arches")
- [Cahier des charges](https://arche.univ-lorraine.fr/pluginfile.php/2676864/mod_resource/content/0/atelier-1-2021-CC.pdf "Cachier des charges sous forme PDF hébergé sur Arches")
- [Critères d'évaluation](https://arche.univ-lorraine.fr/pluginfile.php/2668108/mod_resource/content/0/atelier-1-2021-criteres.pdf "Critères d'évaluation sous forme PDF hébergé sur Arches")

## Contributions
- Hugo Bernard `bernar323u`
    *   Modèles de donnée `UML`
    *   Modèles de Base de Donnée `PHP`
    *   Setup Git, workflows et linters
    *   Review du Front et améliorations `HTML, CSS, JS, Twig`
    *   Validation W3C `HTML, CSS`
    *   Conversion de la navbar en twig `Twig`
    *   Update DBB et données initiales `PHP, SQL`
    *   Authentification coopérative `PHP`
- Tritan Blot `blot32u`
    *   Scénarios d'usage `UML`
    *   Maquette Web `Schema`
    *   Setup Slim `PHP`
    *   Setup Docker `Docker`
    *   Script de jeu de donnée `SQL`
    *   Conversion des pages statiques en pages dynamiques `HTML, Twig, PHP`
- Bastien Hohler `hohler3u`
    *   Scénarios d'usage `UML`
    *   Modèles de Base de Donnée `PHP`
    *   Controlleurs et routes `PHP`
    *   Maquette Web Logging `HTML, CSS, JS`
    *   Conversion des pages statiques en pages dynamiques `HTML, Twig, PHP` (Panier, catalogue et détails)
    *   Ajout à un panier, validation et création de la commande `HTML, PHP`
- Geoffrey Porayko `porayko1u`
    *   Scénarios d'usage `UML`
    *   Maquette Web `Schema`
    *   Maquette Web Client `HTML, CSS, JS`
    *   Style.css et stylework.css `HTML, CSS`
    *   Conversion des pages statiques en pages dynamiques `HTML, Twig, PHP`
    *   Controlleur UserProducer et routes signIn `PHP`
    *   Controlleur Product et filtrage par catégories dans index.html  `HTML, Twig, PHP, JS`
    *   Controlleur Producer, page liste producteur et gestion de la liste des producteurs `HTML, Twig, PHP, JS`
