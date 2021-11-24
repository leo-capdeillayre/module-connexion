<?php
session_start();

$bdd = new PDO('mysql:host=localhost:3306 ;dbname=leo-capdeillayre_moduleconnexion', 'leo-capdeillayre', 'azerty13700');


if (isset($_POST['button'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);
    

    if (!empty($_POST['login']) and !empty($_POST['password'])) {

        $sql = $bdd->prepare("SELECT * FROM utilisateurs where login = ? and password = ? ");
        $sql->execute(array($login, $password));
        $sqlcount = $sql->rowCount();
        $sqlinfos = $sql->fetch();

        

        if ($sqlcount == 1 && $sqlinfos['admin'] == 1) {
            $_SESSION['id'] = $sqlinfos['id'];
            header('Location: ./admin.php');
        } elseif ($sqlcount == 1 && $sqlinfos['admin'] == 0) {
            $_SESSION['id'] = $sqlinfos['id'];
            // var_dump($_SESSION['id']);
            header('Location: ./profil.php');
        } else {
            $erreur = 'Compte introuvable';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Connexion</title>
</head>

<body class="body-con">
    <a style="color: white;" href="./index.php">Retour</a>
    <div class="contener-accueil">
    <h2 class="titre-con">Page de connexion</h2>
    <img class="img-con" src="./img/pouce.gif" alt="">
</div>
    <div class="contener-connect">
        <form class="style-form" action="" method="POST">
            <section class="MC-log">
                <label for="MC-log">Login</label>
                <input class="input-text" type="text" name="login" value="">
            </section>
            <br>
            <section class="MC-mdp">
                <label for="MC-mdp">Password</label>
                <input class="input-text" type="text" name="password" value="">
            </section>
            <input class="button2" type="submit" name="button" value="connexion">
        </form>
    </div>
    <?php
    if (isset($erreur)) { ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php
    }
    ?>

</body>

</html>