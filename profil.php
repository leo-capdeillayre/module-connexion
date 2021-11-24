<?php
session_start();

$bdd = new PDO('mysql:host=localhost:3306 ;dbname=leo-capdeillayre_moduleconnexion', 'leo-capdeillayre', 'azerty13700');
$getid = $_SESSION['id'];
if (isset($_POST['edit'])) {
    if (!empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);
        $recupNom = $bdd->prepare('UPDATE utilisateurs SET nom = ? WHERE id = ?');
        $recupNom->execute(array($nom, $getid));
    }
}
if (isset($_POST['edit'])) {
    if (!empty($_POST['firstname'])) {
        $prenom = htmlspecialchars($_POST['firstname']);
        $recupPrenom = $bdd->prepare('UPDATE utilisateurs SET prenom = ? WHERE id = ?');
        $recupPrenom->execute(array($prenom, $getid));
    }
}
if (isset($_POST['edit'])) {
    if (!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
        $recupLogin = $bdd->prepare('UPDATE utilisateurs SET login = ? WHERE id = ?');
        $recupLogin->execute(array($login, $getid));
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
    <title>Espace profil</title>
</head>

<body class="body-profil">
    <a style="color: black;" href="./index.php">Retour</a>
    <h2 class="titre-admin">Espace membre</h2>
    <h3 class="sous-titre-profil">Gerer les membres du site</h3>

    <?php
    $recupUsers = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $recupUsers->execute(array($getid));
    $recupUserInfo = $recupUsers->fetch();
    ?>
        <br>
        <span>
            <div class="contener-profil">
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="<?php echo $recupUserInfo['nom']; ?>">
                    <input type="text" name="firstname" placeholder="<?php echo $recupUserInfo['prenom'] ?>">
                    <input type="text" name="login" placeholder="<?php echo $recupUserInfo['login'] ?>">
                    <input style="color: green;" type="submit" name="edit" value="Edit">
                </form>
            </div>
        </span>

   
    <div class="contener-connect">
        <img class="img-profil" src="./img/etit.gif" alt="">
    </div>
</body>

</html>