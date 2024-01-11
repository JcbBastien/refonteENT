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
    <title>Menu du jour</title>
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

    <section id="SectionCrous">
        <h2>LE MENU DU JOUR</h2>
        <p><strong>Aujourd'hui - </strong>  vendredi 12 janvier</p>

        <div id="Menu">
            <div id="MenuCrous">
                <img src="img/entre.png" alt="">
                <div id="MenuTXT">
                    <h3>Entrées</h3>
                    <i>3 choix disponible</i>
                </div>
                <div class="MenuButt">
                    <button class="js-btn-decale-gauche">
                        <span class="arrow"></span>
                    </button>
                </div>
            </div>
            <div id="MenuCrous">
                <img src="img/plat.png" alt="">
                <div id="MenuTXT">
                    <h3>Plats</h3>
                    <i>2 choix disponible</i>
                </div>
                <div class="MenuButt">
                    <button class="js-btn-decale-gauche">
                        <span class="arrow"></span>
                    </button>
                </div>
            </div>
            <div id="MenuCrous">
                <img src="img/pizza.png" alt="">
                <div id="MenuTXT">
                    <h3>Pizza</h3>
                    <i>2 choix disponible </i>
                </div>
                <div class="MenuButt">
                    <button class="js-btn-decale-gauche">
                        <span class="arrow"></span>
                    </button>
                </div>
            </div>
            <div id="MenuCrous">
                <img src="img/dessert.png" alt="">
                <div id="MenuTXT">
                    <h3>Desserts</h3>
                    <i>2 choix disponible </i>
                </div>
                <div class="MenuButt">
                    <button class="js-btn-decale-gauche">
                        <span class="arrow"></span>
                    </button>
                </div>
            </div>
        </div>

        <div id="MenuSemaine">
            <h1>LE MENU DE LA SEMAINE ! </h1>
            <p>Choisis le prochain menu que tu souhaites déguster !</p>
            <div id="ChoixMenu">
                <h4>15 JANVIER - 19 JANVIER</h4>
                <form action="#" method="post" id="MenuForm">
                    <label>
                        <img src="img/repas.png" alt="">
                        <input type="checkbox" name="choix_image" value="image1">
                    </label>
                
                    <label>
                        <img src="img/repas2.png" alt="">
                        <input type="checkbox" name="choix_image" value="image2">
                    </label>
                
                    <input type="submit" value="Soumettre" id="Butt2">
                </form>
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