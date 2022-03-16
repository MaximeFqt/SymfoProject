<?php

namespace App\DataFixtures;

use App\Entity\Equipe;
use App\Entity\Favoris;
use App\Entity\Joueur;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher) { }

    public function load(ObjectManager $manager): void
    {
        // Stats du 01/03/2022

        // Création des équipes
        $team1  = new Equipe(); $team1->setNom("Paris St-Germain");
        $team1->setNbJoueur(35);
        $team1->setEcusson("psg.png");
        $manager->persist($team1);

        $team2  = new Equipe(); $team2->setNom("Olympique de Marseille");
        $team2->setNbJoueur(28);
        $team2->setEcusson("om.png");
        $manager->persist($team2);

        $team3  = new Equipe(); $team3->setNom("OGC Nice");
        $team3->setNbJoueur(27);
        $team3->setEcusson("nice.png");
        $manager->persist($team3);

        $team4  = new Equipe();  $team4->setNom("Rennes");
        $team4->setNbJoueur(26);
        $team4->setEcusson("rennes.png");
        $manager->persist($team4);

        $team5  = new Equipe(); $team5->setNom("RC Strasbourg");
        $team5->setNbJoueur(24);
        $team5->setEcusson("strasbourg.png");
        $manager->persist($team5);

        $team6  = new Equipe(); $team6->setNom("RC Lens");
        $team6->setNbJoueur(25);
        $team6->setEcusson("lens.png");
        $manager->persist($team6);

        $team7  = new Equipe(); $team7->setNom("FC Nantes");
        $team7->setNbJoueur(26);
        $team7->setEcusson("nantes.png");
        $manager->persist($team7);

        $team8  = new Equipe(); $team8->setNom("LOSC Lille");
        $team8->setNbJoueur(22);
        $team8->setEcusson("lille.png");
        $manager->persist($team8);

        $team9  = new Equipe(); $team9->setNom("AS Monaco");
        $team9->setNbJoueur(28);
        $team9->setEcusson("monaco.png");
        $manager->persist($team9);

        $team10 = new Equipe(); $team10->setNom("Olympique Lyonnais");
        $team10->setNbJoueur(26);
        $team10->setEcusson("lyon.png");
        $manager->persist($team10);

        $team11 = new Equipe(); $team11->setNom("Montpellier");
        $team11->setNbJoueur(25);
        $team11->setEcusson("montpellier.png");
        $manager->persist($team11);

        $team12 = new Equipe(); $team12->setNom("Brest");
        $team12->setNbJoueur(26);
        $team12->setEcusson("brest.png");
        $manager->persist($team12);

        $team13 = new Equipe(); $team13->setNom("Reims");
        $team13->setNbJoueur(27);
        $team13->setEcusson("reims.png");
        $manager->persist($team13);

        $team14 = new Equipe(); $team14->setNom("SCO Angers");
        $team14->setNbJoueur(25);
        $team14->setEcusson("angers.png");
        $manager->persist($team14);

        $team15 = new Equipe();$team15->setNom("Clermont");
        $team15->setNbJoueur(27);
        $team15->setEcusson("clermont.png");
        $manager->persist($team15);

        $team16 = new Equipe(); $team16->setNom("FC Lorient");
        $team16->setNbJoueur(27);
        $team16->setEcusson("lorient.png");
        $manager->persist($team16);

        $team17 = new Equipe(); $team17->setNom("ESTAC Troyes");
        $team17->setNbJoueur(32);
        $team17->setEcusson("troyes.png");
        $manager->persist($team17);

        $team18 = new Equipe(); $team18->setNom("FC Metz");
        $team18->setNbJoueur(29);
        $team18->setEcusson("metz.png");
        $manager->persist($team18);

        $team19 = new Equipe(); $team19->setNom("AS Saint-Etienne");
        $team19->setNbJoueur(30);
        $team19->setEcusson("asse.png");
        $manager->persist($team19);

        $team20 = new Equipe(); $team20->setNom("Bordeaux Troyes");
        $team20->setNbJoueur(30);
        $team20->setEcusson("bordeaux.png");
        $manager->persist($team20);


        // Création des joueurs (nom, nationnalite, poste, numero)

        /* ************
              PSG
         ************ */

        // Gardiens
        $psg1  = new Joueur("Gianluigi Donnaruma", "Italie", "Gardien", 50, $team1);                $manager->persist($psg1);
        $psg2  = new Joueur("Keylor Navas", "Costa Rica", "Gardien", 1, $team1);                    $manager->persist($psg2);
        $psg3  = new Joueur("Alexandre Letellier", "France", "Gardien", 60, $team1);                $manager->persist($psg3);
        $psg4  = new Joueur("Garissone Innocent" , "France", "Gardien", null, $team1);              $manager->persist($psg4);
        $psg5  = new Joueur("Denis Franchi", "Italie", "Gardien", 40, $team1);                      $manager->persist($psg5);
        $psg6  = new Joueur("Lucas Lavallée", "France", "Gardien", 70, $team1);                     $manager->persist($psg6);
        // Défenseurs
        $psg7  = new Joueur("Marquinhos", "Brésil", "Défenseur central", 5, $team1);                $manager->persist($psg7);
        $psg8  = new Joueur("Presnel Kimpembe", "France", "Défenseur central", 3, $team1);          $manager->persist($psg8);
        $psg9  = new Joueur("Thilo Kehrer", "Allemagne", "Défenseur central", 24, $team1);          $manager->persist($psg9);
        $psg10 = new Joueur("Sergio Ramos", "Espagne", "Défenseur central", 4, $team1);             $manager->persist($psg10);
        $psg11 = new Joueur("El Chadaille Bitshiabu", "France", "Défenseur central", 31, $team1);   $manager->persist($psg11);
        $psg12 = new Joueur("Numo Mendes", "Portugal", "Défenseur gauche", 25, $team1);             $manager->persist($psg12);
        $psg13 = new Joueur("Abdou Diallo", "Sénégal", "Défenseur gauche", 22, $team1);             $manager->persist($psg13);
        $psg14 = new Joueur("Juan Bernat", "Espagne", "Défenseur gauche", 14, $team1);              $manager->persist($psg14);
        $psg15 = new Joueur("Levyn Kurzawa", "France", "Défenseur gauche", 20, $team1);             $manager->persist($psg15);
        $psg16 = new Joueur("Achraf Hakimi", "Maroc", "Défenseur droit", 2, $team1);                $manager->persist($psg16);
        $psg17 = new Joueur("Colin Dagba", "France", "Défenseur droit", 17, $team1);                $manager->persist($psg17);
        $psg18 = new Joueur("Nathan Bitumazala", "France", "Défenseur droit", 39, $team1);          $manager->persist($psg18);
        // Milieux
        $psg19 = new Joueur("Leandros Paredes", "Argentine", "Milieu Défensif", 8, $team1);         $manager->persist($psg19);
        $psg20 = new Joueur("Danilo Pereira", "Portugal", "Milieu Défensif", 15, $team1);           $manager->persist($psg20);
        $psg21 = new Joueur("Idrissa Gueye", "Sénégal", "Milieu Défensif", 27, $team1);             $manager->persist($psg21);
        $psg22 = new Joueur("Anfane Ahamada", "France", "Milieu Défensif", 41, $team1);             $manager->persist($psg22);
        $psg23 = new Joueur("Marco Verrati", "Italie", "Milieu Central", 6, $team1);                $manager->persist($psg23);
        $psg24 = new Joueur("Georginio Wijnaldum", "Pays-Bas", "Milieu Central", 18, $team1);       $manager->persist($psg24);
        $psg25 = new Joueur("Ander Herrera", "Espagne", "Milieu Central", 21, $team1);              $manager->persist($psg25);
        $psg26 = new Joueur("Junior Dina Ebimbe", "France", "Milieu Central", 28, $team1);          $manager->persist($psg26);
        $psg27 = new Joueur("Xavi Simons", "Pays-Bas", "Milieu Offensif", 34, $team1);              $manager->persist($psg27);
        $psg28 = new Joueur("Edouars Michut", "France", "Milieu Offensif", 38, $team1);             $manager->persist($psg28);
        $psg29 = new Joueur("Ismaël Gharbi", "France", "Milieu Offensif", 35, $team1);              $manager->persist($psg29);
        // Attaquants
        $psg30 = new Joueur("Neymar Jr", "Brésil", "Ailier gauche", 10, $team1);                    $manager->persist($psg30);
        $psg31 = new Joueur("Julian Draxler", "Allemagne", "Ailier gauche", 23, $team1);            $manager->persist($psg31);
        $psg32 = new Joueur("Lionel Messi", "Argentine", "Ailier droit", 30, $team1);               $manager->persist($psg32);
        $psg33 = new Joueur("Angel Di Maria", "Argentine", "Ailier droit", 11, $team1);             $manager->persist($psg33);
        $psg34 = new Joueur("Kylian Mbappé", "France", "Avant-centre", 7, $team1);                  $manager->persist($psg34);
        $psg35 = new Joueur("Mauro Icardi", "Argentine", "Avant-centre", 9, $team1);                $manager->persist($psg35);

        /* ************
              OM
         ************ */

        // Gardiens
        $om1  = new Joueur("Pau lopez", "Espagne", "Gardien", 16, $team2);                      $manager->persist($om1);
        $om2  = new Joueur("Steve Mandanda", "France", "Gardien", 30, $team2);                  $manager->persist($om2);
        $om3  = new Joueur("Simon Ngapandouetnbu", "France", "Gardien", 1, $team2);             $manager->persist($om3);
        // Défenseurs
        $om4  = new Joueur("William Saliba" , "France", "Défenseur central", 2, $team2);        $manager->persist($om4);
        $om5  = new Joueur("Duje Caleta-car", "Croatie", "Défenseur central", 15, $team2);      $manager->persist($om5);
        $om6  = new Joueur("Leonardo Balerdi", "Argentine", "Défenseur central", 5, $team2);    $manager->persist($om6);
        $om7  = new Joueur("Luan Peres", "Brésil", "Défenseur central", 14, $team2);            $manager->persist($om7);
        $om8  = new Joueur("Alavro Gonzales", "France", "Défenseur central", 3, $team2);        $manager->persist($om8);
        $om9  = new Joueur("Sead Kolasinac", "Bosnie", "Défenseur gauche", 23, $team2);         $manager->persist($om9);
        $om10 = new Joueur("Pol Lirola", "Espagne", "Défenseur droit", 29, $team2);             $manager->persist($om10);
        // Milieux
        $om11 = new Joueur("Boubacar Kamara", "France", "Milieu défensif", 4, $team2);          $manager->persist($om11);
        $om12 = new Joueur("Pape Gueye", "Sénégal", "Milieu défensif", 22, $team2);             $manager->persist($om12);
        $om13 = new Joueur("Paolo Sciortino", "France", "Milieu défensif", 34, $team2);         $manager->persist($om13);
        $om14 = new Joueur("Mattéo Guendouzi", "France", "Milieu central", 6, $team2);          $manager->persist($om14);
        $om15 = new Joueur("Gerson", "Brésil", "Milieu central", 8, $team2);                    $manager->persist($om15);
        $om16 = new Joueur("Valentin Vongier", "France", "Milieu central", 21, $team2);         $manager->persist($om16);
        $om17 = new Joueur("Oussama Targhalline", "Maroc", "Milieu central", 26, $team2);       $manager->persist($om17);
        $om18 = new Joueur("Bilal Nadir", "France", "Milieu central", 39, $team2);              $manager->persist($om18);
        $om19 = new Joueur("Amine Harit", "Maroc", "Milieu Offensif", 7, $team2);               $manager->persist($om19);
        $om20 = new Joueur("Dimitri Payet", "France", "Milieu Offensif", 10, $team2);           $manager->persist($om20);
        $om21 = new Joueur("Ugo Bertelli", "France", "Milieu Offensif", 31, $team2);            $manager->persist($om21);
        // Attaquants
        $om22 = new Joueur("Luis Henrique", "Brésil", "Ailier gauche", 11, $team2);             $manager->persist($om22);
        $om23 = new Joueur("Konrad de la Fuente", "Etats-Unis", "Ailier gauche", 20, $team2);   $manager->persist($om23);
        $om24 = new Joueur("Salim Ben Seghir", "France", "Ailier gauche", 32, $team2);          $manager->persist($om24);
        $om25 = new Joueur("Cengiz Ünder", "Turquie", "Ailier droit", 17, $team2);              $manager->persist($om25);
        $om26 = new Joueur("Arkaduisz Milik", "Pologne", "Avant-centre", 9, $team2);            $manager->persist($om26);
        $om27 = new Joueur("Cédric Bakambu", "Congo", "Avant-centre", 13, $team2);              $manager->persist($om27);
        $om28 = new Joueur("Bamba Dieng", "Sénégal", "Avant-centre", 12, $team2);               $manager->persist($om28);

        /* ************
              Nice
         ************ */

        // Gardiens
        $nice1  = new Joueur("Walter Benitez", "Argentine", "Gardien", 40, $team3);         $manager->persist($nice1);
        $nice2  = new Joueur("Marcin Bulka", "Pologne", "Gardien", 1, $team3);              $manager->persist($nice2);
        $nice3  = new Joueur("Teddy Boulhendi", "Algérie", "Gardien", 16, $team3);          $manager->persist($nice3);

        /* ************
             Rennes
         ************ */

        // Gardiens
        $rennes1 = new Joueur("Alfred Gomis", "Sénégal", "Gardien", 16, $team4);    $manager->persist($rennes1);
        $rennes2 = new Joueur("Gogan Alemdar", "Turquie", "Gardien", 40, $team4);   $manager->persist($rennes2);
        $rennes3 = new Joueur("Romain Salin", "France", "Gardien", 1, $team4);      $manager->persist($rennes3);
        $rennes4 = new Joueur("Pépé Bonet", "Congo", "Gardien", 30, $team4);        $manager->persist($rennes4);

        /* ************
           Strasbourg
         ************ */

        // Gardiens
        $stra1 = new Joueur("Matz Sels", "Belgique", "Gardien", 1, $team5);     $manager->persist($stra1);
        $stra2 = new Joueur("Eiji Kawashima", "Japon", "Gardien", 16, $team5);  $manager->persist($stra2);

        /* ************
              Lens
         ************ */

        // Gardiens
        $lens1 = new Joueur("Wuilker Fariñez", "Venezuela", "Gardien", 1, $team6);      $manager->persist($lens1);
        $lens2 = new Joueur("Jean-Louis Leca", "France", "Gardien", 16, $team6);        $manager->persist($lens2);
        $lens3 = new Joueur("Valentino Lesieur", "Portugal", "Gardien", 30, $team6);    $manager->persist($lens3);

        /* ************
             Nantes
         ************ */

        // Gardiens
        $nantes1 = new Joueur("Alban Lafont", "France", "Gardien", 1, $team7);      $manager->persist($nantes1);
        $nantes2 = new Joueur("Rémy Descamps", "France", "Gardien", 16, $team7);    $manager->persist($nantes2);
        $nantes3 = new Joueur("Denis Petric", "Slovénie", "Gardien", 30, $team7);   $manager->persist($nantes3);

        /* ************
              Lille
         ************ */

        // Gardiens
        $lille1 = new Joueur("Ivo Grbic", "Croatie", "Gardien", 1, $team8);         $manager->persist($lille1);
        $lille2 = new Joueur("Léo Jardim", "Brésil", "Gardien", 30, $team8);        $manager->persist($lille2);
        $lille3 = new Joueur("Adam Jakubech", "Slovaquie", "Gardien", 16, $team8);  $manager->persist($lille3);

        /* ************
             Monaco
         ************ */

        // Gardiens
        $mona1 = new Joueur("Alexander Nübel", "Allemagne", "Gardien", 16, $team9); $manager->persist($mona1);
        $mona2 = new Joueur("Radoslaw Majecki", "Pologne", "Gardien", 1, $team9);   $manager->persist($mona2);
        $mona3 = new Joueur("Vito Mannone", "Italie", "Gardien", 30, $team9);       $manager->persist($mona3);

        /* ************
              Lyon
         ************ */

        // Gardiens
        $lyon1 = new Joueur("Anthony Lopes", "Portugal", "Gardien", 1, $team10);            $manager->persist($lyon1);
        $lyon2 = new Joueur("Julian Pollersbeck", "Allemange", "Gardien", 30, $team10);     $manager->persist($lyon2);
        $lyon3 = new Joueur("Malcolm Barcola", "Togo", "Gardien", 16, $team10);             $manager->persist($lyon3);

        /* ************
           Montpellier
         ************ */

        // Gardiens
        $mont1 = new Joueur("Jonas Omlin", "Suisse", "Gardien", 1, $team11);        $manager->persist($mont1);
        $mont2 = new Joueur("Dimitry Bertaud", "France", "Gardien", 16, $team11);   $manager->persist($mont2);
        $mont3 = new Joueur("Matis Carvalho", "Portugal", "Gardien", 30, $team11);  $manager->persist($mont3);

        /* ************
             Brest
         ************ */

        // Gardiens
        $brest1 = new Joueur("Marco Bizot", "Pays-Bas", "Gardien", 40, $team12);        $manager->persist($brest1);
        $brest2 = new Joueur("Gautier Larsonneur", "France", "Gardien", 1, $team12);    $manager->persist($brest2);
        $brest3 = new Joueur("Sébastien Cibois", "France", "Gardien", 16, $team12);     $manager->persist($brest3);
        $brest4 = new Joueur("Grégoire Coudert", "France", "Gardien", 30, $team12);     $manager->persist($brest4);

        /* ************
             Reims
         ************ */

        // Gardiens
        $reims1 = new Joueur("Predrag Rajkovic", "Serbie", "Gardien", 1, $team13);      $manager->persist($reims1);
        $reims2 = new Joueur("Yehvann Diouf", "France", "Gardien", 16, $team13);        $manager->persist($reims2);
        $reims3 = new Joueur("Nicolas Penneteau", "France", "Gardien", 30, $team13);    $manager->persist($reims3);

        /* ************
             Angers
         ************ */

        // Gardiens
        $angers1 = new Joueur("Danijel Petkovic", "Maroc", "Gardien", 30, $team14); $manager->persist($angers1);
        $angers2 = new Joueur("Anthony Mandréa", "France", "Gardien", 16, $team14); $manager->persist($angers2);

        /* ************
            Clermont
         ************ */

        // Gardiens
        $cler1 = new Joueur("Arthur Desmas", "France", "Gardien", 1, $team15);      $manager->persist($cler1);
        $cler2 = new Joueur("Ouparine Djoco", "France", "Gardien", 40, $team15);    $manager->persist($cler2);
        $cler3 = new Joueur("Lucas Margueron", "France", "Gardien", 16, $team15);   $manager->persist($cler3);

        /* ************
            Lorient
         ************ */

        // Gardiens
        $lor1 = new Joueur("Paul Nardi", "France", "Gardien", 30, $team16);         $manager->persist($lor1);
        $lor2 = new Joueur("Matthieu Dreye", "France", "Gardien", 1, $team16);      $manager->persist($lor2);
        $lor3 = new Joueur("Teddy Bartouche", "France", "Gardien", 16, $team16);    $manager->persist($lor3);
        $lor4 = new Joueur("Thomas Callens", "France", "Gardien", 40, $team16);     $manager->persist($lor4);

        /* ************
             Troyes
         ************ */

        // Gardiens
        $tro1 = new Joueur("Gauthier Gallon", "France", "Gardien", 30, $team17);    $manager->persist($tro1);
        $tro2 = new Joueur("Jessy Moulin", "France", "Gardien", 40, $team17);       $manager->persist($tro2);
        $tro3 = new Joueur("Sébastien Renot", "France", "Gardien", 16, $team17);    $manager->persist($tro3);
        $tro4 = new Joueur("Ryan Bouallak", "France", "Gardien", 1, $team17);       $manager->persist($tro4);

        /* ************
              Metz
         ************ */

        // Gardiens
        $metz1 = new Joueur("Alexandre Oukidja", "Algérie", "Gardien", 16, $team18);    $manager->persist($metz1);
        $metz2 = new Joueur("Marc-Aurèle Caillard", "France", "Gardien", 30, $team18);  $manager->persist($metz2);
        $metz3 = new Joueur("David Oberhauser", "France", "Gardien", 1, $team18);       $manager->persist($metz3);
        $metz4 = new Joueur("Ousmane Ba", "Sénégal", "Gardien", 40, $team18);           $manager->persist($metz4);

        /* ************
          Saint-Etienne
         ************ */

        // Gardiens
        $asse1 = new Joueur("Etienne Green", "Angleterre", "Gardien", 40, $team19); $manager->persist($asse1);
        $asse2 = new Joueur("Paul Bernardoni", "France", "Gardien", 50, $team19);   $manager->persist($asse2);
        $asse3 = new Joueur("Boubacar Fall", "Sénégal", "Gardien", 16, $team19);    $manager->persist($asse3);

        /* ************
            Bordeaux
         ************ */

        // Gardiens
        $bord1 = new Joueur("Benoît Costil", "France", "Gardien", 1, $team20);      $manager->persist($bord1);
        $bord2 = new Joueur("Gaëtan Poussin", "France", "Gardien", 16, $team20);    $manager->persist($bord2);
        $bord3 = new Joueur("Davy Rouyard", "France", "Gardien", 30, $team20);      $manager->persist($bord3);


        /* USER */
        $usr = new User();

        $usr->setEmail("admin@email.fr");
        $usr->setPassword(
            $this->passwordHasher->hashPassword(
                $usr, "admin"
            )
        );
        $usr->setRoles(["ROLE_ADMIN"]); $manager->persist($usr);

        $usr2 = new User();

        $usr2->setEmail("user2@email.fr");
        $usr2->setPassword(
            $this->passwordHasher->hashPassword(
                $usr2, "user2"
            )
        );
        $usr2->setRoles(["ROLE_USER"]); $manager->persist($usr2);

        /* FAVORIS */
        $fav = new Favoris();
        $fav->setEquipe($team1);
        $fav->setUser($usr2);
        $fav->setDate('%d %B %Y');

        $manager->persist($fav);

        $manager->flush();
    }

}
