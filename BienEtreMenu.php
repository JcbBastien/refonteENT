<?php
include "db_connect.php";

session_start();

if (empty($_SESSION['id'])){
    header("Location:Connexion.php");
    exit();
};

if (!$_SESSION['isAdmin']){
    header("Location:index.php");
    exit();
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes - Menu</title>
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
        <h2>Liste des recettes</h2>
        <div id="AllRecette">
            <?php
                if(isset($_POST['deleteRecipe'])){
                    $deleteId = $_POST['idDelete'];

                    $deleteRecipe = $db->prepare('DELETE FROM recipe WHERE recipe_id = '.$deleteId);
                    $deleteRecipe->execute();
                        

                    echo '<script language="Javascript">
                        <!--
                        document.location.replace("BienEtreMenuRedirect.php");
                        // -->
                        </script>';
                }

                $selectRecipes = $db->prepare("SELECT * FROM recipe");
                $selectRecipes->execute();
                $recipes = $selectRecipes->fetchall(PDO::FETCH_ASSOC);

                foreach($recipes as $recipe){
                    echo '
                    <form method="POST">
                        <h3>'.$recipe['title'].'<h3>
                        <input type="hidden" name="idDelete" value="' . $recipe['recipe_id'] . '"></input>
                        <button type="submit" name="deleteRecipe">Supprimer</button>
                    </form>
                    ';
                }
            ?>
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