<?php
    // include 'urlshortener.sql'; ici ça me display la base de données je vous la mets en commentaire 
    $bddservername = "localhost";
    $bddusername = "root";
    $bddpassword = "";
    $bddname = "urlshortener";
    $conn = mysqli_connect($bddservername, $bddusername, $bddpassword, $bddname);

    session_start();
        if(isset($_POST['formconnexion'])) 
        {
            if(!empty($_POST['email']) AND !empty($_POST['mdp']))
            {
                $email = htmlspecialchars($_POST['email']);
                $mdp = htmlspecialchars($_POST['mdp']);

                $sql="SELECT * FROM user WHERE email = '$email' AND mdp = '$mdp'";
                $rs = mysqli_query($conn, $sql);
                
                if(mysqli_num_rows($rs) != 0)
                {
                    $datas = mysqli_fetch_array($rs,MYSQLI_ASSOC);
                    $_SESSION['mdp'] = $mdp;
                    $_SESSION['email'] = $email;

                }
                else
                {
                    $erreur = "Connection failed";
                }
            }
            else
            {
                $erreur = "Tous les champs ne sont pas remplis";
            }
        }           

        ?>
        <html>
        <head>
        <title>FormulaireInscription</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./app_test.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=K2D&display=swap" rel="stylesheet"> 
    </head>
    <header>
            <h1>Yelienix</h1>
            <div class="containerMenu">
            <ul class="menu">
            <?php
                echo '<li><p><a class="link" href="./Inscription.php"> Inscription</a></p></li>';
            ?>
            </ul>
            </div>
        </header>   
        <body>
            
        <body style="display : flex" style="justify-content : center">
            <div class="formulaire">
                <h2>Connexion</h2>
                <br /><br />
                <form method="POST" action="" class="infos">
                    <h3>Adresse email</h3>
                    <input type="email" name="email" placeholder="Email"  style="margin-bottom: 20px" class="write"/><br>
                    <h3>Mot de passe</h3>
                    <input type="password" name="mdp" placeholder="Mot de passe" class="write" />
                    <br /><br />
                    <input type="submit" name="formconnexion" value="Se connecter !" class="submit" />
                </form>
                <?php
                if(isset($erreur))
                {
                    echo '<font color="red">'.$erreur.'</font>';
                }
                else
                {
                    echo'<a href="index.php"> <p> test </p>';

                }
                ?>
            </div>
            <div class="float">
                    <div class="floater" style="--i:1"></div>
                    <div class="floater" style="--i:2"></div>
                    <div class="floater" style="--i:3"></div>
                    <div class="floater" style="--i:4" ></div>
                </div>
        </body>
            
            
            
            
            
            
            
            
            
        </body>
        </html>