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
    <title>Vie Etudiante</title>
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

    <section id="sectionVie">
        <h1>VIE ETUDIANTE</h1>
        <div id="VieContent">
            <div>
                <h2>LE MENU DE LA  <br> SEMAINE !</h2>
                <p>Découvrez nos délicieuses options gastronomiques de la semaine! Consultez notre menu hebdomadaire pour connaître les plats !</p>
                <a href="Crous.php" id="Butt">En savoir plus</a>
            </div>
            <img src="img/resto.svg" alt="" class="resto">
            <img src="img/restoPC.png" alt="" class="restoPC">
        </div>
        <div id="DeuxLigne">
            <div id="sallevie">
                <h2>RESERVATION D'UNE SALLE</h2>
                <p>Profitez d'installations modernes et d'un environnement propice à la productivité. Réservez dès maintenant pour garantir votre espace!</p>
                <a href="Salle.php" id="Butt">Voir les disponibilités</a>
            </div>
            <div id="VieContentPlan">
                <div>
                    <h2>NOS BON PLANS POUR L'ANNEE 2023 !</h2>
                    <p>Chaque mois un bon plan est disponible ! <br>
                        Retrouver également nos bons plans pour cette année </p>
                        <a href="BonPlans.php" id="Butt">En savoir plus</a>
                </div>

                    <div id="ticket">
                        <div id="TicketTXT">
                        </div>
                    </div>
            </div>
        </div>
        <div id="VieBien">
            <div>
                <h2>LE BIEN-ETRE<br>ETUDIANTS</h2>
                <a href="BienEtre.php" id="Butt">En savoir plus</a>
            </div>
            <img src="img/BienPC.png" alt="" id="repasr">
            <img src="img/repas.png" alt="" id="repasf">
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