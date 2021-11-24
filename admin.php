<?php
session_start();
$bdd = new PDO('mysql:host=localhost:3306 ;dbname=leo-capdeillayre_moduleconnexion', 'leo-capdeillayre', 'azerty13700');

if (isset($_POST['supprimer'])) {
    $getidamin = intval($_GET['idadmin']);

    $sql = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
    $sql->execute(array($getidamin));
}

if (isset($_POST['edit'])) {
    $getidamin = $_GET['idadmin'];
    if (!empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);
        $recupNom = $bdd->prepare('UPDATE utilisateurs SET nom = ? WHERE id = ?');
        $recupNom->execute(array($nom, $getidamin));
    }
}
if (isset($_POST['edit'])) {
    $getidamin = $_GET['idadmin'];
    if (!empty($_POST['firstname'])) {
        $prenom = htmlspecialchars($_POST['firstname']);
        $recupPrenom = $bdd->prepare('UPDATE utilisateurs SET prenom = ? WHERE id = ?');
        $recupPrenom->execute(array($prenom, $getidamin));
    }
}
if (isset($_POST['edit'])) {
    $getidamin = $_GET['idadmin'];
    if (!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
        $recupLogin = $bdd->prepare('UPDATE utilisateurs SET login = ? WHERE id = ?');
        $recupLogin->execute(array($login, $getidamin));
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
    <title>Page admin</title>
</head>

<body class="body-admin">
    <a style="color: black;" href="./index.php">Retour</a>
    <h2 class="titre-admin">Espace admin</h2>
    <h3 class="sous-titre">Gerer les membres du site</h3>






    <!-- afficher les membres -->


    <?php
    $recupUsers = $bdd->query('SELECT * FROM utilisateurs');
    while ($utilisateurs = $recupUsers->fetch()) {
    ?>
        <br>
        <span>
            <div class="contener-admin">
                <form action="?idadmin=<?php echo $utilisateurs['id'] ?>" method="POST">
                    <input type="text" name="name" placeholder="<?php echo $utilisateurs['nom']; ?>">
                    <input type="text" name="firstname" placeholder="<?php echo $utilisateurs['prenom'] ?>">
                    <input type="text" name="login" placeholder="<?php echo $utilisateurs['login'] ?>">
                    <input style="color: red;" type="submit" name="supprimer" value="Supprimer">
                    <input style="color: green;" type="submit" name="edit" value="Edit">
                </form>
            </div>
        </span>
    <?php
    }
    ?>
<div class="contener-connect">
    <img class="img-admin" src="./img/kingpin.gif" alt="">
</div>

</body>

</html>