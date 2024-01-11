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
    <title>Matière - Menu</title>
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
        <p style=color:red;>
            <?php
                if(isset($_POST['submitSubject'])){
                    $subjectName = htmlspecialchars($_POST['subjectName']);
                    $abreviation = htmlspecialchars($_POST['abreviation']);

                    $insertSubject = $db->prepare("INSERT INTO subject (name, abreviation) VALUES (?, ?)");
                    $insertSubject->execute(array($subjectName, $abreviation));
                            

                    echo '<script language="Javascript">
                        <!--
                        document.location.replace("MatiereMenuRedirect.php");
                        // -->
                        </script>';
                }

                if(isset($_POST['deleteSubject'])){
                    $deleteId = $_POST['subjectIdDelete'];

                    $deleteSubject = $db->prepare('DELETE FROM subject WHERE subject_id = '.$deleteId);
                    $deleteSubject->execute();
                        

                    echo '<script language="Javascript">
                        <!--
                        document.location.replace("MatiereMenuRedirect.php");
                        // -->
                        </script>';
                }
            ?>
        </p>
        <form method="POST">
            <h2>Ajouter une matière</h2>
            <input required type="text" name="subjectName" placeholder="Nom de la matière" maxlength="100"/>
            <input required type="text" name="abreviation" placeholder="Numéro" maxlength="50"/>
            <button type="submit" name="submitSubject">Ajouter
            </button>
        </form>
        <form method="POST">
            <h2>Supprimer une matière</h2>
            <select required name="subjectIdDelete">
                <?php
                    $selectAllSubjects = $db->prepare("SELECT * FROM subject");
                    $selectAllSubjects->execute();
                    $allSubjects = $selectAllSubjects->fetchall(PDO::FETCH_ASSOC);

                    foreach($allSubjects as $subject){
                            echo '
                                <option value="'.$subject['subject_id'].'">' . $subject['name'] . ' (' . $subject['abreviation'] . ')</option>
                            ';
                    }
                ?>
            </select>
            <button type="submit" name="deleteSubject">Supprimer
            </button>
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