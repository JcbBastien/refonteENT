<?php
include "db_connect.php";

session_start();
    if (empty($_SESSION['id'])){
        header("Location:Connexion.php");
        exit();
    };
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ressource</title>
</head>
<body>
    <header>
        <div id="header">
            <a href="index.php"><img src="img/LogoAccueil.png" alt="Retour a l'accueil"></a>
            <?php
                if ($_SESSION['isTeacher'] || $_SESSION['isAdmin']){
                    echo '<a href="Pannel.php">Pannel</a>';
                }
            ?>
            <a href="Profil.php"> <img src="img/person.svg" alt=""></a>
        </div>
    </header>

    <section id="Ressource">
        <h1>Ressource</h1>
        <div id="RessourcePC">
            <div id="protocole">
                <h2>Protocoles</h2>
                <div id="protocoleContent">
                    <div id="protocoleTXT">
                        <p>LES SONS DE L’HORRIFIQUE EN BD & DE L’ILLUSTRATION DE ROMAN</p>
                        <p>KP CHABANE</p>
                    </div>
                    <div id="arrondis">
                        <p>SAE 302</p>
                    </div>
                </div>
                <div id="emdash"></div>
                <div id="protocoleContent">
                    <div id="protocoleTXT">
                        <p>Concevoir et développer un ENT</p>
                        <p>Fatima Laoufi</p>
                    </div>
                    <div id="arrondis">
                        <p>SAE 301</p>
                    </div>
                </div>
                <div id="emdash"></div>
                <div id="protocoleContent">
                    <div id="protocoleTXT">
                        <p>Les sons de l’horrifique en BD & de l’illustration de romanFichier</p>
                        <p>Tony Houziaux</p>
                    </div>
                    <div id="arrondis">
                        <p>SAE 301</p>
                    </div>
                </div>
            </div>
            <div id="Cours">
                <h2>Cours</h2>
                <div id="CoursContent">
                    <div id="CoursHeader">
                        <img src="img/Doc.svg" alt="">
                        <div id="CheaderTXT">
                            <h3>Concevoir et développer un ENT</h3>
                            <p>Fatima Laoufi</p>
                        </div>
                        <img src="img/statusDev.svg" alt="">
                    </div>
                    <div id="CoursStatues">
                        <p>Date de rendu :</p>
                        <p>14/04/2024</p>
                        <p>Etat:</p>
                        <p>en attente</p>
                    </div>
                    <div id="CoursDesc">
                        <p>Description: <br>Dans le cadre de notre cursus axé sur les métiers du multimédia, les étudiants sont chargés de concevoir un projet multimédia interactif novateur. Le devoir implique la création d'une expérience immersive qui intègre des éléments audio, visuels et interactifs, mettant en avant les compétences polyvalentes propres à ce domaine.</p>
                    </div>
                    <div id="CoursFichier">
                        <p>Fichiers :</p>
                        <a href="#">COURS</a>
                        <a href="https://elearning.univ-eiffel.fr/?redirect=0" id="Butt">En savoir plus</a>
                    </div>
                </div>
                <div id="CoursContent">
                    <div id="CoursHeader">
                        <img src="img/Doc.svg" alt="">
                        <div id="CheaderTXT">
                            <h3>Concevoir et développer un ENT</h3>
                            <p>Fatima Laoufi</p>
                        </div>
                        <img src="img/statusDev.svg" alt="">
                    </div>
                </div>
            </div>
        </div>

        
    </section>
    
    <nav>
        <div id="navbar">
            <a href="index.php"><img src="img/home.png" alt="Accueil"></a>
            <a href="Etudes.php"><img src="img/Gestion.png" alt="Gestion d'etude"></a>
            <a href="Ressource.php"><img src="img/Ressource.png" alt="Ressource"></a>
            <a href="VieEtudiante.php"><img src="img/VieEtudiante.png" alt="Vie Etudiant"></a>
        </div>
    </nav>
</body>
</html>