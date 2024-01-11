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
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="header">
            <a href="index.php"><img src="img/LogoAccueil.png" alt="Retour a l'accueil"></a>
            <a href="Profil.php"> <img src="img/person.svg" alt=""></a>
        </div>
    </header>

    <section id="contact">
        <div id="SearchContact">
            <!-- <input type="search"> -->
            <h1>Contacts</h1>
        </div>

        <div id="User">
            <img src="img/Userpic.png" alt="">
            <div id="UserTXT">
                <h2>Anne Tasso</h2>
                <p>Mail / Numero</p>
            </div>
        </div>
        <div id="User">
            <img src="img/Userpic.png" alt="">
            <div id="UserTXT">
                <h2>Anne Tasso</h2>
                <p>Mail / Numero</p>
            </div>
        </div>
        <div id="User">
            <img src="img/Userpic.png" alt="">
            <div id="UserTXT">
                <h2>Anne Tasso</h2>
                <p>Mail / Numero</p>
            </div>
        </div>
        <div id="User">
            <img src="img/Userpic.png" alt="">
            <div id="UserTXT">
                <h2>Anne Tasso</h2>
                <p>Mail / Numero</p>
            </div>
        </div>
        <div id="User">
            <img src="img/Userpic.png" alt="">
            <div id="UserTXT">
                <h2>Anne Tasso</h2>
                <p>Mail / Numero</p>
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