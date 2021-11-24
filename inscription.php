<?php
$bdd = new PDO('mysql:host=localhost:3306 ;dbname=leo-capdeillayre_moduleconnexion', 'leo-capdeillayre', 'azerty13700');
if (isset($_POST['signin'])) {
    $login = htmlspecialchars($_POST['login']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $password = sha1($_POST['password']);
    $confpassword = sha1($_POST['conf']);
    if (!empty($_POST['login']) and !empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['password'])) {
        if ($password == $confpassword) {
            $insertusers = $bdd->prepare('INSERT INTO utilisateurs (login, nom, prenom, password, admin) VALUES (?, ?, ?, ?, ?)');
            $insertusers->execute(array($login, $nom, $prenom, $password, 0));
            header('location: ./connexion.php');
        } else {
            $erreur = 'Mot de passe different';
        }
    } else {
        $erreur = 'Champs vide !';
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

    <title>Accueil</title>
</head>

<body class="body-inscri">
    <a style="color: white;" href="./index.php">Retour</a>
    <div class="contener-accueil">
    <h1 class="titre">Module d'inscription</h1>
    <img class="img-inscri" src="./img/Vault_81.gif" alt="">
</div>
    <br>
    <div class="contener-flex">
        <form class="form-inscri" action="" method="post">
            <section class="MC-log">
                <label for="MC-login">Login</label>
                <br>
                <input type="text" id="Log" name="login">
            </section>
            <section class="MC-nom">
                <label for="nom">Nom</label>
                <br>
                <input type="text" id="nom" name="nom">
            </section>
            <section class="MC-pre">
                <label for="MC-prenom">Prenom</label>
                <br>
                <input type="text" id="prenom" name="prenom">
            </section>
            <section class="MC-mdp">
                <label for="MC-password">Password</label>
                <br>
                <input type="text" id="mdp" name="password">
            </section>
            <section class="MC-conf">
                <label for="MC-conf">Confirm Password</label>
                <br>
                <input type="text" id="conf" name="conf">
            </section>
            <input type="submit" name="signin" value="Inscription">
            <br>

        </form>
    </div>
    <br>
    <?php
    if (isset($erreur)) { ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php
    }
    ?>

</body>

</html>