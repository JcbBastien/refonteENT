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
    <title>Bien-Etre Etudiant</title>
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

    <section id="BienEtre">
        <h1>LES RECETTES DES ETUDIANTS</h1>
        <div id="AllRecette">
            <?php
                $selectRecipes = $db->prepare('SELECT * FROM recipe');
                $selectRecipes->execute();
                $recipes = $selectRecipes->fetchall(PDO::FETCH_ASSOC);

                foreach($recipes as $recipe){
                    echo '
                        <a  href="'.$recipe['recipe_link'].'" id="Recette">
                            <img src="'.$recipe['image_link'].'" alt="">
                            <h3>'.$recipe['title'].'</h3>
                            <div id="RecetteTXT"><p>'.$recipe['title'].'</p>
                                <img src="img/raphael_dollar.png" alt=""> <p>'.$recipe['price'].'$</p>
                            </div>
                        </a>
                    ';
                }

            ?>
            <a  href="" id="Recette">
                <img src="img/repas2.png" alt="">
                <h3>Poulet au Curry</h3>
                <div id="RecetteTXT"><p>20 min</p>
                    <img src="img/raphael_dollar.png" alt=""> <p>10$</p>
                </div>
            </a>
        </div>
        
        <form method="post" id="RecetteForm">
            <label for="titreRecette"></label>
            <input type="text" id="titreRecette" name="titreRecette"  required placeholder="Le titre de la recette">
        
            <div id="formTXTligne">
                <label for="tempsPreparation"></label>
                <input type="text" id="tempsPreparation" name="tempsPreparation" required placeholder="Temps de préparation">
                <label for="prixRecette"></label>
                <input type="text" id="prixRecette" name="prixRecette" required placeholder="Prix de la recette">
            </div>
        
            <label for="imageRecette">Ajouter une image</label>
            <input type="text" id="imageRecette" name="imageRecette" required placeholder="Lien de l'image">

            <label for="lienRecette">Ajouter un lien</label>
            <input type="text" id="lienRecette" name="lienRecette" required placeholder="Lien de la recette">
        
            <button type="submit" name="submitRecipe" id="Butt2">Soumettre</button>
        </form>
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