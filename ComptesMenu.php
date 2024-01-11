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
    <title>Comptes - Menu</title>
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
                if(isset($_POST['submitAccount'])){
                        $login = htmlspecialchars($_POST['login']);
                        $displayName = htmlspecialchars($_POST['displayName']);
                        $description = htmlspecialchars($_POST['description']);
                        $isTeacher = htmlspecialchars($_POST['isTeacher']);
                        $pwd = htmlspecialchars($_POST['pwd']);
                        $pwdc = htmlspecialchars($_POST['pwdc']);

                        if($pwd === $pwdc){

                            $selectUser = $db->prepare("SELECT * FROM account WHERE login = '$login'");
                            $selectUser->execute();
                            $similarUsers = $selectUser->fetchall(PDO::FETCH_ASSOC);

                            $userExists = false;
                            foreach ($similarUsers as $user) {
                                if ($login === $user['login']) {
                                    $userExists = true;
                                    break;
                                }
                            }

                            if (!$userExists) {
                                $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
                                $insertUser = $db->prepare("INSERT INTO account (login, password, displayName, description, isTeacher) VALUES (?, ?, ?, ?, ?)");
                                $insertUser->execute(array($login, $pwdHashed, $displayName, $description, $isTeacher));
                            

                                echo '<script language="Javascript">
                                    <!--
                                    document.location.replace("ComptesMenuRedirect.php");
                                    // -->
                                    </script>';
                            } else {
                                echo "Ce nom d'utilisateur est déjà pris";
                            }

                        }else{
                            echo "Mauvais mot de passe";
                        }
                }

                if(isset($_POST['deleteAccount'])){
                    $deleteId = $_POST['accountIdDelete'];

                    $deleteAccount = $db->prepare('DELETE FROM account WHERE account_id = '.$deleteId);
                    $deleteAccount->execute();
                        

                    echo '<script language="Javascript">
                        <!--
                        document.location.replace("ComptesMenuRedirect.php");
                        // -->
                        </script>';
                }
            ?>
        </p>
        <form method="POST">
            <h2>Ajouter un compte</h2>
            <input required type="text" name="login" placeholder="Identifiant" maxlength="100"/>
            <input required type="text" name="displayName" placeholder="Nom d'utilisateur" maxlength="100"/>
            <input required type="text" name="description" placeholder="Descriptif du compte" maxlength="500"/>
            <input required type="password" name="pwd" placeholder="Mot de passe" autocomplete="off" maxlength="60"/>
            <input required type="password" name="pwdc" placeholder="Confirmer le Mot de passe" autocomplete="off" maxlength="60"/>
            <select required name="isTeacher">
                <option value="0">Élève</option>
                <option value="1">Prof</option>
            </select>
            <button type="submit" name="submitAccount">Inscrire
            </button>
        </form>
        <form method="POST">
            <h2>Supprimer un compte</h2>
            <select required name="accountIdDelete">
                <?php
                    $selectAllAccounts = $db->prepare("SELECT * FROM account");
                    $selectAllAccounts->execute();
                    $allAccounts = $selectAllAccounts->fetchall(PDO::FETCH_ASSOC);

                    foreach($allAccounts as $account){
                        if(!$account['isAdmin']){
                            echo '
                                <option value="'.$account['account_id'].'">' . $account['displayName'] . ' (' . $account['login'] . ')</option>
                            ';
                        }
                    }
                ?>
            </select>
            <button type="submit" name="deleteAccount">Supprimer
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