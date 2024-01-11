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
    <link rel="stylesheet" href="style.css">
    <title>Notes</title>
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

    <section id="notes">
        <h1>MES NOTES</h1>
        <div id="NotePC">
        <?php
                    $selectSubjects = $db->prepare('SELECT * FROM subject');
                    $selectSubjects->execute();
                    $subjects = $selectSubjects->fetchall(PDO::FETCH_ASSOC);

                    foreach($subjects as $subject){
                        $sum = 0;

                        $selectGrades = $db->prepare('SELECT * FROM grade WHERE subject_id = ' . $subject['subject_id'] . ' AND student_id = '.$_SESSION['id']);
                        $selectGrades->execute();
                        $grades = $selectGrades->fetchall(PDO::FETCH_ASSOC);
                        
                        if(empty($grades)){
                            echo '
                                    <div id="emdash2"></div>
                                    <div id="notesDiv">
                                        <div id="notesHeader">
                                            <p><strong>'.$subject['abreviation'].'</strong> -  '.$subject['name'].'</p>
                                            <strong>N/A</strong>
                                        </div>
                                    </div>
                                ';
                        }else{

                            $sumAmount = 0;
                            foreach($grades as $grade){
                                $sumAmount++;
                                $sum += $grade['value'];
                            }

                            echo '
                                <div id="emdash2"></div>
                                
                                <div id="notesDiv">
                                    <div id="notesHeader">
                                        <p><strong>'.$subject['abreviation'].'</strong> -  '.$subject['name'].'</p>
                                        <strong>'.round($sum/$sumAmount, 2).'/20</strong>
                                    </div>
                                
                                ';

                            foreach($grades as $grade){
                                $selectTeacher = $db->prepare('SELECT * FROM account WHERE account_id = '. $grade['teacher_id']);
                                $selectTeacher->execute();
                                $teacher = $selectTeacher->fetch();

                                echo '
                                <div id="notesContent">
                                    <p>'.$teacher['displayName'].'</p>
                                    <strong>'.$grade['value'].'/20</strong>
                                </div>'
                                ;
                            }

                            echo '</div>';
                        }
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