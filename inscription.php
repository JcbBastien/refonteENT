<?php
include "db_connect.php"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="acceuil">
    <a href="index.php">Retour</a>
        <p style=color:red;>
            <?php
                session_start();
                if (!empty($_SESSION['id'])){
                    header("Location:articles_liste.php");
                    exit();
                };

                if(isset($_POST['submit'])){
                    if(!empty($_POST['login']) AND !empty($_POST['pwd']) AND !empty($_POST['pwdc'])){
                        $login = htmlspecialchars($_POST['login']);
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
                                $insertUser = $db->prepare("INSERT INTO account (login, password) VALUES (?, ?)");
                                $insertUser->execute(array($login, $pwdHashed));
                                
                                $selectUser = $db->prepare("SELECT * FROM account WHERE login = '$login'");
                                $selectUser->execute();
                                $similarUsers = $selectUser->fetchall(PDO::FETCH_ASSOC);

                                foreach ($similarUsers as $user) {
                                    if ($login === $user['login']) {
                                        $rightUser = $user;
                                        break;
                                    }
                                }

                                $_SESSION['login'] = $rightUser['login'];
                                $_SESSION['id'] = $rightUser['account_id'];

                                header('Location: articles_liste.php');
                            } else {
                                echo "Ce nom d'utilisateur est déjà pris";
                            }

                        }else{
                            echo "Mauvais mot de passe";
                        }
                    }else{
                        echo "Veuillez remplir tous les champs";
                    }
                }
            ?>
        </p>
        <form class="formSignin" method="POST">
            <h2>Inscription</h2>
            <input type="text" name="login" placeholder="Nom d'utilisateur" maxlength="50"/>
            <input type="password" name="pwd" placeholder="Mot de passe" autocomplete="off" maxlength="60"/>
            <input type="password" name="pwdc" placeholder="Confirmer le Mot de passe" autocomplete="off" maxlength="60"/>
            <button type="submit" name="submit">S'inscrire
            </button>
        </form>
    </div>
</body>