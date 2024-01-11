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
$currentDate = date("Y-m-d");
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

        if(isset($_POST['addAbsence'])){
            $personId = $_POST['person'];
            $hours = $_POST['hours'];
            $date = $_POST['date'];

            $insertAbsence = $db->prepare("INSERT INTO absence (time, date, teacher_id, student_id) VALUES (?, ?, ?, ?)");
            $insertAbsence->execute(array($hours, $date, $_SESSION['id'], $personId));

            echo '<script language="Javascript">
            <!--
            document.location.replace("AbsMenuRedirect.php");
            // -->
            </script>';
        };

    ?>

    <section id="contact">
        <h1>Ajouter des abscences</h1>
        <form method="POST">
            <select required name="person">
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
            <input required type="number" placeholder="Nombre d'heures" name="hours" min="0"/>
            <input required type="date" name="date" value="<?php echo $currentDate;?>" max="<?php echo $currentDate;?>"/>
            <button type="submit" name="addAbsence">Ajouter l'absence</button>
        </form>

        <h1>Liste des absences</h1>
        <?php
            if(isset($_POST['justifyAbsence'])){
                $absenceId = $_POST['idJustify'];
    
                $justifyAbscence = $db->prepare('UPDATE absence SET justified = 1 WHERE absence_id = '.$absenceId);
                $justifyAbscence->execute();
    
                echo '<script language="Javascript">
                <!--
                document.location.replace("AbsMenuRedirect.php");
                // -->
                </script>';
            };

            if(isset($_POST['unjustifyAbsence'])){
                $absenceId = $_POST['idUnjustify'];
    
                $unjustifyAbscence = $db->prepare('UPDATE absence SET justified = 0 WHERE absence_id = '.$absenceId);
                $unjustifyAbscence->execute();
    
                echo '<script language="Javascript">
                <!--
                document.location.replace("AbsMenuRedirect.php");
                // -->
                </script>';
            };

            if(isset($_POST['deleteAbsence'])){
                $absenceId = $_POST['idDelete'];
    
                $deleteAbscence = $db->prepare('DELETE FROM absence WHERE absence_id = '.$absenceId);
                $deleteAbscence->execute();
    
                echo '<script language="Javascript">
                <!--
                document.location.replace("AbsMenuRedirect.php");
                // -->
                </script>';
            };

            if($_SESSION['isAdmin']){
                $selectAbsences = $db->prepare("SELECT * FROM absence");
                $selectAbsences->execute();
                $absences = $selectAbsences->fetchall(PDO::FETCH_ASSOC);

                foreach($absences as $absence){

                    $selectTeacher = $db->prepare('SELECT * FROM account WHERE account_id = '. $absence['teacher_id']);
                    $selectTeacher->execute();
                    $teacher = $selectTeacher->fetch();

                    $selectStudent = $db->prepare('SELECT * FROM account WHERE account_id = '. $absence['student_id']);
                    $selectStudent->execute();
                    $student = $selectStudent->fetch();

                    $justified = "Non";
                    
                    if($absence['justified']){
                        $justified = "Oui";
                    };

                    echo '
                        <div>
                            <h3>
                                ' . $student['displayName'] . ' (' . $student['login'] . ')
                            </h3>
                            <p>
                                Ajouté par: ' . $teacher['displayName'] . ' (' . $teacher['login'] . ')
                            </p>
                            <p>
                                le ' . $absence['date'] . ' pendant: ' . $absence['time'] . 'h
                            </p>
                            <p>
                                Justifiée: '.$justified.'
                            </p>
                            <form method="POST">
                                <input type="hidden" name="idJustify" value="' . $absence['absence_id'] . '"></input>
                                <button type="submit" name="justifyAbsence">Justifiée</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="idUnjustify" value="' . $absence['absence_id'] . '"></input>
                                <button type="submit" name="unjustifyAbsence">Non justifiée</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="idDelete" value="' . $absence['absence_id'] . '"></input>
                                <button type="submit" name="deleteAbsence">Supprimer</button>
                            </form>
                        </div>
                    ';
                }
            }else{
                $currentId = $_SESSION['id'];

                $selectAbsences = $db->prepare('SELECT * FROM absence WHERE teacher_id = '.$currentId);
                $selectAbsences->execute();
                $absences = $selectAbsences->fetchall(PDO::FETCH_ASSOC);

                foreach($absences as $absence){

                    $selectTeacher = $db->prepare('SELECT * FROM account WHERE account_id = '. $absence['teacher_id']);
                    $selectTeacher->execute();
                    $teacher = $selectTeacher->fetch();

                    $selectStudent = $db->prepare('SELECT * FROM account WHERE account_id = '. $absence['student_id']);
                    $selectStudent->execute();
                    $student = $selectStudent->fetch();

                    $justified = "Non";
                    
                    if($absence['justified']){
                        $justified = "Oui";
                    };

                    echo '
                        <div>
                            <h3>
                                ' . $student['displayName'] . ' (' . $student['login'] . ')
                            </h3>
                            <p>
                                Ajouté par: ' . $teacher['displayName'] . ' (' . $teacher['login'] . ')
                            </p>
                            <p>
                                le ' . $absence['date'] . ' pendant: ' . $absence['time'] . 'h
                            </p>
                            <p>
                                Justifiée: '.$justified.'
                            </p>
                            <form method="POST">
                                <input type="hidden" name="idDelete" value="' . $absence['absence_id'] . '"></input>
                                <button type="submit" name="deleteAbsence">Supprimer</button>
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