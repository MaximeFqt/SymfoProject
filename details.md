**Détails du projet :**

**API possible :**

**[API](https://www.api-football.com/pricing)**

+ **<u>Sujet :</u>**
  
    Le sujet choisi concerne le football. J'affectionne particulièrement ce sport que je pratique depuis maintenant 13 ans.
    
    Je souhaite donc faire un site pouvant afficher n'importe qu'elle équipe actuelle de ligue 1 ainsi que tous ses joueurs. 

    Il me faudra donc au minimum trois entités pour gérer cela : 
    
    + Une entité **Equipe** :

        Composé d' :
        
        - un **id**
        - un **nom**
        - un **nbjoueur**
        - un **entraineur** (id de l'entité Entraineur)

    <br>
    <br>

    + Une entité **Joueur** :

        Composé d' :
        
        - un **id** unique
        - un **numéro** unique par équipe
        - un **nom**
        - un **prénom**
        - un **poste**
        - une **nationnalité**
        - une **equipe** (OneToOne)

    <br>
    <br>

    + Une entité **Entraineur** :

        Composé d' :
        
        - un **id** unique
        - un **nom**
        - un **prénom**
        - une **equipe** (OneToOne)


<br>

**Installations effectuées des composants :**
```bash
composer require --dev profiler maker

composer require twig annotations form validator orm asset

composer req php:^8.0 (affiche une erreur)

php bin/console make:controller DefaultController



composer require --dev orm-fixtures
```

Retrouver le projet sur **[GitHub](https://github.com/MaximeFqt/SymfoProject)**

Source pour les Equipe et effectif : **[Ici](https://www.transfermarkt.fr/ligue-1/startseite/wettbewerb/FR1)**

**Equipe dont les joueurs sont TOUS rentrés**

+ PSG
+ OM
