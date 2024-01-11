<?php
include "db_connect.php";

session_start();
    if (empty($_SESSION['id'])){
        header("Location:Connexion.php");
        exit();
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Devoirs</title>
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

    <section id="Devoirs">
        <h1>MES DEVOIRS</h1>
        <div id="deveee">
            <div>
                <div id="DevoirsInfo">
                    <div id="devoirstatue">
                        <img src="img/jaune.svg" alt="">
                        <p>En attente</p>
                    </div>
                    <div id="devoirstatue">
                        <img src="img/Rouge.svg" alt="">
                        <p>Non rendu</p>
                    </div>
                    <div id="devoirstatue">
                        <img src="img/vert.svg" alt="">
                        <p>Rendu</p>
                    </div>
                </div>
                <div id="Cours">
                    <div id="CoursContent">
                        <div id="CoursHeader">
                            <img src="img/Doc.svg" alt="">
                            <div id="CheaderTXT">
                                <h3>Concevoir et développer un ENT</h3>
                                <p>Fatima Laoufi</p>
                            </div>
                            <img src="img/jaune.svg" alt="">
                        </div>
                        <div id="CoursStatues">
                            <p>Date de rendu :</p>
                            <p>14/04/2023</p>
                            <p>Etat:</p>
                            <p>en attente</p>
                        </div>
                        <div id="CoursDesc">
                            <p>Description: <br>Dans le cadre de notre cursus axé sur les métiers du multimédia, les étudiants sont chargés de concevoir un projet multimédia interactif novateur. Le devoir implique la création d'une expérience immersive qui intègre des éléments audio, visuels et interactifs, mettant en avant les compétences polyvalentes propres à ce domaine.</p>
                        </div>
                        <div id="CoursFichier">
                            <p>Fichiers :</p>
                            <a href="#">Protocole</a>
                            <input type="file" id="Butt">
                        </div>
                    </div>
                    <div id="CoursContent">
                        <div id="CoursHeader">
                            <img src="img/Doc.svg" alt="">
                            <div id="CheaderTXT">
                                <h3>Concevoir et développer un ENT</h3>
                                <p>Fatima Laoufi</p>
                            </div>
                            <img src="img/jaune.svg" alt="">
                        </div>
                    </div>
                    <div id="CoursContent">
                        <div id="CoursHeader">
                            <img src="img/Doc.svg" alt="">
                            <div id="CheaderTXT">
                                <h3>Concevoir et développer un ENT</h3>
                                <p>Fatima Laoufi</p>
                            </div>
                            <img src="img/vert.svg" alt="">
                        </div>
                    </div>
                    <div id="CoursContent">
                        <div id="CoursHeader">
                            <img src="img/Doc.svg" alt="">
                            <div id="CheaderTXT">
                                <h3>Concevoir et développer un ENT</h3>
                                <p>Fatima Laoufi</p>
                            </div>
                            <img src="img/Rouge.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div id="RightDev">
                <h2>DETAILS</h2>
            <div id="CoursStatues">
                            <p>Date de rendu :</p>
                            <p>14/04/2023</p>
                            <p>Etat:</p>
                            <p>en attente</p>
                        </div>
                        <div id="CoursDesc">
                            <p>Description: <br>Dans le cadre de notre cursus axé sur les métiers du multimédia, les étudiants sont chargés de concevoir un projet multimédia interactif novateur. Le devoir implique la création d'une expérience immersive qui intègre des éléments audio, visuels et interactifs, mettant en avant les compétences polyvalentes propres à ce domaine.</p>
                        </div>
                        <div id="CoursFichier">
                            <a href="https://elearning.univ-eiffel.fr/?redirect=0" id="ButtPC">Rendre le Devoirs </a>
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