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
    <title>Salle - Menu</title>
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

        if(isset($_POST['submitRoom'])){
            $roomNumberId = $_POST['roomNumber'];
            $roomStatus = $_POST['roomStatus'];

            $updateRoom = $db->prepare('UPDATE room SET status = '.$roomStatus.' WHERE room_id = '.$roomNumberId);
            $updateRoom->execute();

            echo '<script language="Javascript">
            <!--
            document.location.replace("GestionSalleRedirect.php");
            // -->
            </script>';
        };

    ?>

    <section id="contact">
        <form method="POST">
            <h2>Gêrer les salles</h2>
            <select required name="roomNumber">
                <?php
                    $selectRooms = $db->prepare('SELECT * FROM room');
                    $selectRooms->execute();
                    $rooms = $selectRooms->fetchall(PDO::FETCH_ASSOC);

                    foreach($rooms as $room){
                        echo '
                            <option value="'.$room['room_id'].'">'.$room['room_number'].'</option>
                        ';
                    }
                ?>
            </select>
            <select required name="roomStatus">
                <option value="0">Cours</option>
                <option value="1">Disponible</option>
                <option value="2">Occupé</option>
            </select>
            <button type="submit" name="submitRoom">Confirmer
            </button>
        </form>
    </section>
    <section id="ResaSalle">
        <div id="ResaSallePC">
            <div id="SalleInfo">
                <div id="rectRed"></div>
                <p>Cours</p>
                <div id="rectGreen"></div>
                <p>Disponible</p>
                <div id="rectBlue"></div>
                <p>Occupé</p>
            </div>
            <div id="EtatSalle">
                <div id="SalleOcc">
                    <h2>Salles De Cours</h2>
                    <div id="BoxOcc">
                        <?php
                            foreach($rooms as $room){
                                if($room['status'] == 0){
                                    echo '
                                        <div id="rectRed">'.$room['room_number'].'</div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div id="SalleOcc">
                    <h2>Salles Disponibles</h2>
                    <div id="BoxOcc">
                        <?php
                            foreach($rooms as $room){
                                if($room['status'] == 1){
                                    echo '
                                        <div id="rectGreen">'.$room['room_number'].'</div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div id="SalleOcc">
                    <h2>Salles Occupées</h2>
                    <div id="BoxOcc">
                        <?php
                            foreach($rooms as $room){
                                if($room['status'] == 2){
                                    echo '
                                        <div id="rectBlue">'.$room['room_number'].'</div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div id="SalleOccPC">
                    <div id="SalleOccH2">
                        <h2>SALLE DISPONIBLES</h2>
                    </div>
                    <div id="BoxRectPc">
                        <?php
                            foreach($rooms as $room){
                                $classStatus = "rectRed";
                                if($room['status'] != 0){
                                    if($room['status'] == 1){
                                        $classStatus = "rectGreen";
                                    }else{
                                        $classStatus = "rectBlue";
                                    }
                                }

                            echo '
                                <div id="'.$classStatus.'">'.$room['room_number'].'</div>
                            ';
                                
                            }
                        ?>
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