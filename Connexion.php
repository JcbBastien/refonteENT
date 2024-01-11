<?php
include "db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="header">
            <a href="index.php"><img src="img/LogoAccueil.png" alt="Retour a l'accueil"></a>
        </div>
    </header>
    <section>
        <div id="HeaderProfil" >
            <h1>Se connecter</h1>
            <p>Veuillez vous connecter pour accèder à la plateforme.</p>
        </div>

        <div>
            <p style="color:red;">
                <?php
                    session_start();
                    if (!empty($_SESSION['id'])){
                        header("Location:index.php");
                        exit();
                    };

                    if(isset($_POST['submit'])){
                        $login = htmlspecialchars($_POST['login']);
                        $pwd = htmlspecialchars($_POST['pwd']);
                    
                        $errorMsg = "Nom d'utilisateur ou mot de passe invalide.";

                        $selectUsers = $db->prepare("SELECT * FROM account WHERE login = '$login'");
                        $selectUsers->execute();
                        $selectedUsers = $selectUsers->fetchall(PDO::FETCH_ASSOC);

                        $rightUserId = false;
                        foreach($selectedUsers as $user){
                            if($login === $user['login']){
                                $rightUserId = $user['account_id'];
                                break;
                            }
                        }
                        if($rightUserId){
                            $selectRightUser = $db->prepare("SELECT * FROM account WHERE account_id = '$rightUserId'");
                            $selectRightUser->execute();
                            $result = $selectRightUser->fetch();

                            if(password_verify($pwd, $result['password'])){

                                $_SESSION['displayName'] = $result['displayName'];
                                $_SESSION['description'] = $result['description'];
                                $_SESSION['isTeacher'] = $result['isTeacher'];
                                $_SESSION['isAdmin'] = $result['isAdmin'];
                                $_SESSION['id'] = $result['account_id'];

                                header('Location: index.php');

                            }else{
                                echo $errorMsg;
                            }
                        }else{
                            echo $errorMsg;
                        }
                    }
                ?>
            </p>
        </div>


        <form method="POST">
            <input required type="text" name="login" placeholder="Identifiant" maxlength="100"/>
            <input required type="password" name="pwd" placeholder="Mot de passe" autocomplete="off" maxlength="60"/>
            <button type="submit" name="submit">Se connecter</button>
        </form>
    </section>
</body>
</html>