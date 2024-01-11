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
    <title>Gestion des Etudes</title>
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
    <section id="Etudes">
        <h1>GESTION DES ETUDES</h1>
        <div id=absEtudePC>
            <div id="NbAbs">
                <h2>NOMBRE D'ABSENCES</h2>
                <div id="RondAbs" >
                    <p>
                        <?php
                            $selectAbsences = $db->prepare('SELECT * FROM absence WHERE student_id = '.$_SESSION['id']);
                            $selectAbsences->execute();
                            $absences = $selectAbsences->fetchall(PDO::FETCH_ASSOC);
                            $absenceNumber = 0;
                            foreach($absences as $absence){
                                if(!$absence['justified']){
                                    $absenceNumber += $absence['time'];
                                }
                            }
                            echo $absenceNumber.'H';
                        ?>
                    </p>
                </div>
                <a href="Absences.php" id="Butt">Mes absences</a>
            </div>
            <div id="DevoirsEtu">
                <h2>MES DEVOIRS</h2>
                <div id="DevoirStatus">
                    <div id="DevoirContent">
                        <img src="img/Doc.svg" alt="">
                        <p>Dev. Back <br>DataViz</p>
                        <img src="img/statusDev.svg" alt="">
                    </div>
                    <div id="DevoirContent">
                        <img src="img/Doc.svg" alt="">
                        <p>Dev. Front <br>ResaWeb</p>
                        <img src="img/statusDev.svg" alt="">
                    </div>
                    <div id="DevoirContent">
                        <img src="img/Doc.svg" alt="">
                        <p>Vidéo <br>Podcast</p>
                        <img src="img/statusDev.svg" alt="">
                    </div>
                </div>
                <a href="Devoirs.php" id="Butt">Voir Plus</a>
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