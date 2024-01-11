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
    <title>Absences</title>
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
    

    <section id="Absences">
        <h1>VOS ABSENCES</h1>
        <div id="ABSPC">
            <div id="ABSContent">
                        <?php
                            $selectAbsences = $db->prepare('SELECT * FROM absence WHERE student_id = '.$_SESSION['id']);
                            $selectAbsences->execute();
                            $absences = $selectAbsences->fetchall(PDO::FETCH_ASSOC);
                            foreach($absences as $absence){
                                $selectTeacher = $db->prepare('SELECT * FROM account WHERE account_id = '. $absence['teacher_id']);
                                $selectTeacher->execute();
                                $teacher = $selectTeacher->fetch();

                                if(!$absence['justified']){
                                    $colorClass = 'style="background-color:salmon"';
                                }else{
                                    $colorClass = '';
                                }
                                echo '
                                    <div id="ABSTXT" '.$colorClass.'>
                                        <img src="img/Icon Abs.png" alt="">
                                        <div id="ColAbsTXT">
                                        <h3>HEURE</h3>
                                        <p>'.$absence['time'].'h</p>
                                        </div>
                                        <div id="ColAbsTXT">
                                            <h3>PROFESSEUR</h3>
                                            <p>'.$teacher['displayName'].'</p>
                                        </div>
                                        <div id="ColAbsTXT">
                                            <h3>DATE</h3>
                                            <p>le '.$absence['date'].'</p>
                                            </div>
                                    </div>
                                ';
                            }
                        ?>
            </div>
            <div id="emdash2"></div>
            <div id="NombreAbs">
            <h2>NOMBRE D'ABSENCES</h2>
                <div id="RondAbs" >
                    <p>
                        <?php
                            $absenceNumberJustified = 0;
                            $absenceNumberUnjustified = 0;
                            foreach($absences as $absence){
                                if(!$absence['justified']){
                                    $absenceNumberUnjustified += $absence['time'];
                                }else{
                                    $absenceNumberJustified += $absence['time'];
                                }
                            }
                            echo $absenceNumberUnjustified + $absenceNumberJustified.'H';
                        ?>
                    </p>
                </div>
                <h2>DETAILS DES ABSENCES</h2>
                <div id="detailsABS">
                    <div id="LeftABS">
                        <p>Justifiée</p>
                        <p>non Justifiée</p>
                    </div>
                    <div id="RightABS">
                        <p><?php echo $absenceNumberJustified .'h';?></p>
                        <p><?php echo $absenceNumberUnjustified .'h';?></p>
                    </div>
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