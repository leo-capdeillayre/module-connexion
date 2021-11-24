<?php
if (isset($_POST["inscription"])) {
    header('Location: ./inscription.php');

}
elseif (isset($_POST["connexion"])) {
    header('Location: ./connexion.php');
}
elseif (isset($_POST["github"])) {
    header('Location: https://github.com/leo-capdeillayre');
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Page d'accueil</title>
</head>
<body class="body-index">
    <div class="contener-accueil">
    <h2>Page d'accueil</h2>
    <br>
    <h3>Bienvenue sur notre site internet</h3>
    <br>
    <img class="img-accueil" src="./img/156269-full.gif" alt="">
    <div class="formulaire">
    <form class="css-button" action="" method="POST">
        <input class="button1" type="submit" name="inscription" value="Inscription">
        <input class="button2" type="submit" name="connexion" value="Connexion">
        <input class="button2" type="submit" name="github" value="Github">
    </form>
    </div>
    </div>
</body>
</html>