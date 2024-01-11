<?php
include "db_connect.php";

session_start();

if (empty($_SESSION['id'])){
    header("Location:Connexion.php");
    exit();
};

if ($_SESSION['isTeacher'] || $_SESSION['isAdmin']){
}else{
    header("Location:index.php");
    exit();
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pannel - Menu</title>
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

    <section id="contact">
        <a href="AbsencesMenu.php">Menu des absences</a>
        <a href="GestionSalle.php">Gestion des salles</a>
        <a href="MenuNotes.php">Gestion des notes</a>
        <?php
            if($_SESSION['isAdmin']){
                echo '
                    <h2>Section administrateur</h3>
                    <a href="ComptesMenu.php">Gestion des comptes</a>
                    <a href="MatiereMenu.php">Menu des matières</a>
                    <a href="BienEtreMenu.php">Gestion des recettes</a>
                ';
            }
        ?>
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