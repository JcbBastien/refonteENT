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
    <title>Notes</title>
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

    <section id="notes">
        <h1>MES NOTES</h1>
        <div id="notesDiv">
            <div id="notesHeader">
                <p><strong>SAE 3.01</strong> -  Lorem ipsum</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>A.Leroy : Communiquer en Anglais</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>H.Lo : Gestion de projets</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>F.Laoufi : UX UI design</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>Epstein : Coder </p>
                <strong>12/20</strong>
            </div>
        </div>
        <div id="emdash2"></div>
        <div id="notesDiv">
            <div id="notesHeader">
                <p><strong>SAE 3.02</strong> -  Lorem ipsum</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>A.Leroy : Communiquer en Anglais</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>H.Lo : Gestion de projets</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>F.Laoufi : UX UI design</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>Epstein : Coder </p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>A.Leroy : Communiquer en Anglais</p>
                <strong>12/20</strong>
            </div>
            <div id="notesContent">
                <p>H.Lo : Gestion de projets</p>
                <strong>12/20</strong>
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