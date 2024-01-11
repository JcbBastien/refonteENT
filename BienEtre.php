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
                if(isset($_POST['submitRecipe'])){
                    $titreRecette = $_POST['titreRecette'];
                    $tempsPreparation = $_POST['tempsPreparation'];
                    $prixRecette = $_POST['prixRecette'];
                    $imageRecette = $_POST['imageRecette'];
                    $lienRecette = $_POST['lienRecette'];
        
                    $insertRecipe = $db->prepare("INSERT INTO recipe (title, prepare_time, price, image_link, recipe_link) VALUES (?, ?, ?, ?, ?)");
                    $insertRecipe->execute(array($titreRecette, $tempsPreparation, $prixRecette, $imageRecette, $lienRecette));
        
                    echo '<script language="Javascript">
                    <!--
                    document.location.replace("BienEtreRedirect.php");
                    // -->
                    </script>';
                };

                $selectRecipes = $db->prepare('SELECT * FROM recipe');
                $selectRecipes->execute();
                $recipes = $selectRecipes->fetchall(PDO::FETCH_ASSOC);

                foreach($recipes as $recipe){
                    echo '
                        <a  href="'.$recipe['recipe_link'].'" id="Recette" target="_blank">
                            <img src="'.$recipe['image_link'].'" alt="">
                            <h3>'.$recipe['title'].'</h3>
                            <div id="RecetteTXT"><p>'.$recipe['prepare_time'].'</p>
                                <img src="img/raphael_dollar.png" alt=""> <p>'.$recipe['price'].'$</p>
                            </div>
                        </a>
                    ';
                }
            ?>
        </div>
        
        <form method="post" id="RecetteForm">
            <label for="titreRecette"></label>
            <input type="text" id="titreRecette" name="titreRecette"  required placeholder="Le titre de la recette" maxlength="30">
        
            <div id="formTXTligne">
                <label for="tempsPreparation"></label>
                <input type="text" id="tempsPreparation" name="tempsPreparation" required placeholder="Temps de préparation" maxlength="10">
                <label for="prixRecette"></label>
                <input type="number" id="prixRecette" name="prixRecette" required placeholder="Prix de la recette" min="0">
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