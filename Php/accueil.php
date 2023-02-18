<?php
    session_start();

/*     if (!isset($_SESSION['login'])) {
        header('Location: index.php');
        exit;
    }
    
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    
    if (!isset($_SESSION['login'])) {
        header('Location: index.php');
        exit;
    }

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    } */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <style>
        /* Mise en forme générale */
        body {
            font-family: Arial, sans-serif;
            background-color: #778899;
        }

        /* Mise en forme du titre */
        h1 {
            text-align: center;
            margin-top: 50px;
        }

        /* Mise en forme de la liste de comptes */
        .list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }

        .account {
            margin: 10px;
            background-color: #ffff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 5px #999;
        }

        /* Mise en forme du bouton de déconnexion */
        .logout-btn {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Page d'accueil</h1>
    <p style="text-align: center; margin-top: 50px;">Bonjour <?= $_SESSION['login']; ?>, vous êtes connecté.</p>

    <div class="list">
        <!-- Affichage de la liste des comptes -->
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=account;charset=utf8', 'root', '');
            $reponse = $bdd->query('SELECT * FROM users');

            while ($donnees = $reponse->fetch()) {
                echo '<div class="account">';
                echo $donnees['login'];
                echo '</div>';
            }
        ?>
    </div>

    <form method="post">
        <input class="logout-btn" type="submit" name="logout" value="Se déconnecter">
    </form>
</body>
</html>
