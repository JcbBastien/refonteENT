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
    <title>Salle</title>
    <link rel="stylesheet" href="style.css">
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

    <section id="ResaSalle">
        <h1>RESERVATION <br>D'UNE SALLE</h1>
        <div id="SalleInfo">
            <div id="rectRed"></div>
            <p>Cours</p>
            <div id="rectGreen"></div>
            <p>Disponible</p>
            <div id="rectBlue"></div>
            <p>Occupé</p>
        </div>

        <div id="EtatSalle">
            <div id="SalleOcc">
                <h2>Salles De Cours</h2>
                <div id="BoxOcc">
                    <div id="rectRed"> 120</div>
                    <div id="rectRed"> 122</div>
                    <div id="rectRed"> 123</div>
                    <div id="rectRed"> 124</div>
                    <div id="rectRed"> 125</div>
                    <div id="rectRed"> 126</div>
                </div>
            </div>
            <div id="SalleOcc">
                <h2>Salles Disponibles</h2>
                <div id="BoxOcc">
                    <div id="rectGreen"> 120</div>
                    <div id="rectGreen"> 122</div>
                    <div id="rectGreen"> 123</div>
                    <div id="rectGreen"> 124</div>
                    <div id="rectGreen"> 125</div>
                    <div id="rectGreen"> 126</div>
                </div>
            </div>
            <div id="SalleOcc">
                <h2>Salles Occupées</h2>
                <div id="BoxOcc">
                    <div id="rectBlue"> 120</div>
                    <div id="rectBlue"> 122</div>
                    <div id="rectBlue"> 123</div>
                    <div id="rectBlue"> 124</div>
                    <div id="rectBlue"> 125</div>
                    <div id="rectBlue"> 126</div>
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