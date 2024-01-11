<?php
include "db_connect.php";

session_start();
    if (empty($_SESSION['id'])){
        header("Location:Connexion.php");
        exit();
    };
$currentDate = date("d-m-Y");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tableau de bord</title>
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

    <nav>
        <div id="navbar">
            <a href="index.php"><img src="img/home.png" alt="Accueil"></a>
            <a href="Etudes.php"><img src="img/Gestion.png" alt="Gestion d'etude"></a>
            <a href="Ressource.php"><img src="img/Ressource.png" alt="Ressource"></a>
            <a href="VieEtudiante.php"><img src="img/VieEtudiante.png" alt="Vie Etudiant"></a>
        </div>
    </nav>
    
    <section id="Tableau">
        <h1>TABLEAU DE BORD</h1>
        <div class="bord">
            <a href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt" class="buttBord" target="_blank">
                <div>
                    <img src="img/calendar.png" alt="">
                    <p>Emploi du temps</p>
                </div>
            </a>
            <div id="PCBord">
                <h2>Emplois du temps</h2>
                <p><strong>Aujourd'hui</strong> - <?php echo $currentDate?></p>
                <div id="PCEmploi">
                    <div id="FirstCours">
                        <h3>14 :00 - 15:00</h3>
                        <p>SAE 3.02</p>
                        <p>Poisson 124-125</p>
                    </div>
                    <div id="SecondCours">
                        <h3>14 :00 - 15:00</h3>
                        <p>SAE 3.02</p>
                        <p>Poisson 124-125</p>
                    </div>
                </div>
                <a href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt" target="_blank" id="ButtPC">Voir le planning complet</a>
            </div>

            
            <a href="Crous.php" class="buttBord">
                <div>
                    <img src="img/restaurant.png" alt="">
                    <p>Menu crous</p>
                </div>
            </a>
            <div id="PCBord">
                <h2>Menu CROUS</h2>
                <p><strong>Aujourd'hui</strong> - <?php echo $currentDate?></p>
                <div id="PCCrous">
                    <div id="BordCrous">
                        <div id="MenuBord">
                            <h4>Entrée</h4>
                            <p>- Oeuf Dur</p>
                            <p>- Patée en croute</p>
                        </div>
                        <div id="MenuBord">
                            <h4>Plat</h4>
                            <p>- Fonds d'artichauts gratinés</p>
                            <p>- Pizza</p>
                        </div>
                        <div id="MenuBord">
                            <h4>Dessert</h4>
                            <p>- Beignet</p>
                            <p>- Donuts</p>
                        </div>
                    </div>
                </div>
                <a href="Crous.php" id="ButtPC">En savoir en plus  </a>
            </div>


            <a href="https://partage.univ-eiffel.fr/" class="buttBord" target="_blank">
                <div>
                    <img src="img/messagerie.png" alt="">
                    <p>Messagerie</p>
                </div>
            </a>
            <div id="PCBord">
                <h2>Messagerie</h2>
                <p><strong>Aujourd'hui</strong>- <?php echo $currentDate?></p>
                <div id="PCmsg">
                    <div id="msgPV">
                        <p><strong>A.Leroy</strong> - Etude</p>
                        <p>Bonjour à tous, merci de prendre le temps de lire ce message.</p>
                    </div>
                    <div id="msgPV">
                        <p><strong>A.Leroy</strong> - Etude</p>
                        <p>Bonjour à tous, merci de prendre le temps de lire ce message.</p>
                    </div>
                    <div id="msgPV">
                        <p><strong>A.Leroy</strong> - Etude</p>
                        <p>Bonjour à tous, merci de prendre le temps de lire ce message.</p>
                    </div>
                </div>
                <div id="botBord"><a href="https://partage.univ-eiffel.fr/" target="_blank" id="ButtPC">Boîte de réception</a></div>
            </div>

            <div id="ActuPC">
    
                <div class="slider">
                    <div class="js-navigation">
                        <button class="js-btn-decale-droite">
                            <span class="arrow"></span>
                        </button>
                    </div>
                    <div class="js-slider">
                        <h1>Les dernières actualités</h1>
    
                        <div class="js-photos">
                                <div class="js-photo">
                                    <div class="card">
                                        <div class="card-photo"><img src="img/actu.png" alt="car"></div>
                                        <div class="card-data">
                                            <div>
                                                <h5>INFORMATION : Fermeture de la Bibliothèque Georges Perec</h5>
                                                <p>Nous vous informons que la Bibliothèque Georges Perec sera fermée temporairement pour des travaux de maintenance. Nous vous prions de nous excuser pour tout inconvénient et vous remercions de votre compréhension. Nous faisons de notre mieux pour assurer une réouverture rapide et vous tiendrons informés de toute évolution. Merci de votre collaboration.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <img src="img/actu.png" alt="car">
                                        <div class="card-data">
                                            <div>
                                                <h5>Fermeture de la Bibliothèque  Georges Perec</h5>
                                                <p>Nous vous informons que la Bibliothèque Georges Perec sera fermée temporairement pour des travaux de maintenance. Nous vous prions de nous excuser pour tout inconvénient et vous remercions de votre compréhension. Nous faisons de notre mieux pour assurer une réouverture rapide et vous tiendrons informés de toute évolution. Merci de votre collaboration.</p>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                        </div>
        
                           
                    </div>
                        
                    <div class="js-navigation">
                        <button class="js-btn-decale-gauche">
                            <span class="arrow"></span>
                        </button>
                    </div>
                </div>
            </div>

            <a href="Notes.php" class="buttBord">
                <div>
                    <img src="img/note.png" alt="">
                    <p>Mes notes</p>
                </div>
            </a>
            <div id="PCBord">
                <h2>Mes notes</h2>
                <?php
                    $selectSubjects = $db->prepare('SELECT * FROM subject');
                    $selectSubjects->execute();
                    $subjects = $selectSubjects->fetchall(PDO::FETCH_ASSOC);

                    $i = 0;
                    foreach($subjects as $subject){
                        $i++;
                        $sum = 0;

                        $selectGrades = $db->prepare('SELECT * FROM grade WHERE subject_id = ' . $subject['subject_id'] . ' AND student_id = '.$_SESSION['id']);
                        $selectGrades->execute();
                        $grades = $selectGrades->fetchall(PDO::FETCH_ASSOC);
                        
                        if(empty($grades)){
                            echo '
                                <div id="notesBord">
                                    <p><strong>'.$subject['abreviation'].'</strong> -  '.$subject['name'].'</p>
                                    <div id="notesBordContent">
                                        <p>Votre moyenne :</p>
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
                            <div id="notesBord">
                                <p><strong>'.$subject['abreviation'].'</strong> -  '.$subject['name'].'</p>
                                <div id="notesBordContent">
                                    <p>Votre moyenne : </p>
                                    <strong>'.round($sum/$sumAmount, 2).'/20</strong>
                                </div>
                            </div>
                            ';
                        }

                        if ($i == 2){
                            break;
                        }
                    }
                ?>
            <div id="botBord"><a href="Notes.php" id="ButtPC">Voir mes notes</a></div>

        </div>

        
    </section>
    <section id="ActuMOB">
        <h1>Les dernières actualités</h1>

        <div class="slider">
            <div class="js-navigation">
                <button class="js-btn-decale-droite">
                    <span class="arrow"></span>
                </button>
            </div>
            <div class="js-slider">
                <div class="js-photos">
                        <div class="js-photo">
                            <div class="card">
                                <div class="card-photo"><img src="img/actu.png" alt="car"></div>
                                <div class="card-data">
                                    <div>
                                        <h5>Fermeture de la Bibliothèque Georges Perec</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <img src="img/actu.png" alt="car">
                                <div class="card-data">
                                    <div>
                                        <h5>Fermeture de la Bibliothèque  Georges Perec</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                </div>

                   
            </div>
                
            <div class="js-navigation">
                <button class="js-btn-decale-gauche">
                    <span class="arrow"></span>
                </button>
            </div>
        </div>
    </section>


</body>
<script src="slider.js" defer type="module"></script>
</html>