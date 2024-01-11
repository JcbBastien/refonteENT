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
    <title>Absences - Menu</title>
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

    <?php

        if(isset($_POST['insertGrade'])){
            $studentId = $_POST['studentId'];
            $subjectId = $_POST['subjectId'];
            $grade = $_POST['grade'];

            $insertGrade = $db->prepare("INSERT INTO grade (value, subject_id, teacher_id, student_id) VALUES (?, ?, ?, ?)");
            $insertGrade->execute(array($grade, $subjectId, $_SESSION['id'], $studentId));

            echo '<script language="Javascript">
            <!--
            document.location.replace("MenuNotesRedirect.php");
            // -->
            </script>';
        };

    ?>

    <section id="contact">
        <form method="POST">
            <h2>Ajouter une note</h2>
            <input required type="number" placeholder="Note sur 20" name="grade" min="0" max="20"/>
            <select required name="studentId">
                <?php
                    $selectUsers = $db->prepare("SELECT * FROM account");
                    $selectUsers->execute();
                    $users = $selectUsers->fetchall(PDO::FETCH_ASSOC);

                    foreach($users as $user){
                        echo '
                            <option value="'.$user['account_id'].'">'.$user['displayName'].' ('.$user['login'].')</option>
                        ';
                    }
                ?>
            </select>
            <select required name="subjectId">
                <?php
                    $selectSubjects = $db->prepare("SELECT * FROM subject");
                    $selectSubjects->execute();
                    $subjects = $selectSubjects->fetchall(PDO::FETCH_ASSOC);

                    foreach($subjects as $subject){
                        echo '
                            <option value="'.$subject['subject_id'].'">'.$subject['name'].' ('.$subject['abreviation'].')</option>
                        ';
                    }
                ?>
            </select>
            <button type="submit" name="insertGrade">Ajouter
            </button>
        </form>
        
        <h2>Liste des notes</h2>
        <?php
            if(isset($_POST['deleteGrade'])){
                $gradeId = $_POST['idDelete'];
    
                $deleteGrade = $db->prepare('DELETE FROM grade WHERE grade_id = '.$gradeId);
                $deleteGrade->execute();
    
                echo '<script language="Javascript">
                <!--
                document.location.replace("MenuNotesRedirect.php");
                // -->
                </script>';
            };

            if($_SESSION['isAdmin']){
                $selectGrades = $db->prepare("SELECT * FROM grade");
                $selectGrades->execute();
                $AllGrades = $selectGrades->fetchall(PDO::FETCH_ASSOC);

                foreach($AllGrades as $SingleGrade){

                    $selectTeacher = $db->prepare('SELECT * FROM account WHERE account_id = '. $SingleGrade['teacher_id']);
                    $selectTeacher->execute();
                    $teacher = $selectTeacher->fetch();

                    $selectStudent = $db->prepare('SELECT * FROM account WHERE account_id = '. $SingleGrade['student_id']);
                    $selectStudent->execute();
                    $student = $selectStudent->fetch();

                    $selectSubject = $db->prepare('SELECT * FROM subject WHERE subject_id = '. $SingleGrade['subject_id']);
                    $selectSubject->execute();
                    $singleSubject = $selectSubject->fetch();

                    echo '
                        <div>
                            <h3>
                                ' . $student['displayName'] . ' (' . $student['login'] . ')
                            </h3>
                            <p>
                                Ajouté par: ' . $teacher['displayName'] . ' (' . $teacher['login'] . ')
                            </p>
                            <p>
                                Note: ' . $SingleGrade['value'] . '/20 dans '.$singleSubject['name'].' ('.$singleSubject['abreviation'].')
                            </p>
                            <form method="POST">
                                <input type="hidden" name="idDelete" value="' . $SingleGrade['grade_id'] . '"></input>
                                <button type="submit" name="deleteGrade">Supprimer
                                </button>
                            </form>
                        </div>
                    ';
                }
            }else{
                $selectGrades = $db->prepare('SELECT * FROM grade WHERE teacher_id = '.$_SESSION['id']);
                $selectGrades->execute();
                $AllGrades = $selectGrades->fetchall(PDO::FETCH_ASSOC);

                foreach($AllGrades as $SingleGrade){

                    $selectTeacher = $db->prepare('SELECT * FROM account WHERE account_id = '. $SingleGrade['teacher_id']);
                    $selectTeacher->execute();
                    $teacher = $selectTeacher->fetch();

                    $selectStudent = $db->prepare('SELECT * FROM account WHERE account_id = '. $SingleGrade['student_id']);
                    $selectStudent->execute();
                    $student = $selectStudent->fetch();

                    $selectSubject = $db->prepare('SELECT * FROM subject WHERE subject_id = '. $SingleGrade['subject_id']);
                    $selectSubject->execute();
                    $singleSubject = $selectSubject->fetch();

                    echo '
                        <div>
                            <h3>
                                ' . $student['displayName'] . ' (' . $student['login'] . ')
                            </h3>
                            <p>
                                Ajouté par: ' . $teacher['displayName'] . ' (' . $teacher['login'] . ')
                            </p>
                            <p>
                                Note: ' . $SingleGrade['value'] . '/20 dans '.$singleSubject['name'].' ('.$singleSubject['abreviation'].')
                            </p>
                            <form method="POST">
                                <input type="hidden" name="idDelete" value="' . $SingleGrade['grade_id'] . '"></input>
                                <button type="submit" name="deleteGrade">Supprimer
                                </button>
                            </form>
                        </div>
                    ';
                }
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