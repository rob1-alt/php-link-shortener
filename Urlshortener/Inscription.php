<?php
// include 'urlshortener.sql'; ici ça me display la base de données je vous la mets en commentaire 
$bddservername = "localhost";
$bddusername = "root";
$bddpassword = "";
$bddname = "urlshortener";

$conn = mysqli_connect($bddservername, $bddusername, $bddpassword, $bddname);

if(isset($_POST['formeinscription']))
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp1']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $mdp1 = htmlspecialchars($_POST['mdp1']);
        

        $pseudolength = strlen($pseudo);
        if($pseudolength <= 25)
        {
            $nomlength = strlen($nom);
            if($nomlength <=25)
            {
                $prenomlength = strlen($prenom);
                if($prenomlength <=25)
                {
                    $emaillength = strlen($email);
                    if($emaillength <=50)
                    {
                        $mdplength = strlen($mdp);
                        if($mdplength <=16)
                        {
                            $mdp1length = strlen($mdp1);
                            if($mdp1length <=16)
                            {   
                                if($mdp == $mdp1)
                                {
                                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                    {
                                        $sql = "SELECT email FROM user WHERE email = '$email'";
                                        $rs = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($rs) == 0)
                                        {
                                            mysqli_free_result($rs);
                                            $sql = "INSERT INTO user (pseudo, nom, prenom, email, mdp) VALUES ('$pseudo','$nom','$prenom','$email','$mdp');";
                                            $rs = mysqli_query($conn, $sql);
                                                        
                                            if($rs)
                                            {
                                                echo "Contact Records Inserted";
                                            }
                                            else
                                            {
                                                echo " failed";
                                            }
                                        }
                                        else
                                        {
                                            $erreur = "Votre email est déjà utilisé.";
                                        }    
                                    }
                                    else
                                    {
                                        $erreur = "Votre email n'est pas valide.";
                                    }
                                }
                                else
                                {
                                    $erreur = 'Le mot de passe ne correspond pas';
                                }
                            }
                            else
                            {
                                $erreur = 'Votre mot de passe ne doit pas dépasser 16 caractères.';
                            }
                        }
                        else
                        {
                            $erreur = 'Votre mot de passe ne doit pas dépasser 16 caractères.';
                        }
                    }
                    else
                    {
                        $erreur = 'Votre email ne doit pas dépasser 25 caractères.';
                    }
                }
                else
                {
                    $erreur = 'Votre prénom ne doit pas dépasser 25 caractères.';
                }
            }
            else
            {
                $erreur = 'Votre nom ne doit pas dépasser 25 caractères.';
            }
        }
        else
        {
            $erreur = 'Votre pseudo ne doit pas dépasser 25 caractères.';
        }
        
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis.";
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
    <body style="display : flex">
        <div class="formulaire2">
            <h2>Inscription</h2>
            <br /><br />
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>
                            <label for=
                            "pseudo">Pseudo :
                            </label>
                        </td>
                        <td>
                            <input type="text"
                            placeholder="Votre pseudo" 
                            id="pseudo" 
                            name="pseudo"  class="write"
                            value="<?php if(isset($pseudo)) { echo $pseudo;} ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for=
                            "nom">Nom :
                            </label>
                        </td>
                        <td>
                            <input type="text"
                            placeholder="Votre nom" 
                            id="nom" 
                            name="nom" class="write"
                            value="<?php if(isset($nom)) { echo $nom;} ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for=
                            "prénom">Prénom :
                            </label>
                        </td>
                        <td>
                            <input type="text"
                            placeholder="Votre prénom" 
                            id="prenom" 
                            name="prenom" class="write"
                            value="<?php if(isset($prenom)) { echo $prenom;} ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for=
                            "email">Email :
                            </label>
                        </td>
                        <td>
                            <input type="mail"
                            placeholder="Votre email" 
                            id="email" 
                            name="email" class="write"
                            value="<?php if(isset($email)) { echo $email;} ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for=
                            "mdp">Mot de passe :
                            </label>
                        </td>
                        <td>
                            <input type="password"
                            placeholder="Votre mot de passe" 
                            id="mdp" 
                            name="mdp" class="write"
                            value="<?php if(isset($mdp)) { echo $mdp;} ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for=
                            "mdp">Mot de passe :
                            </label>
                        </td>
                        <td>
                            <input type="password"
                            placeholder="Confirmer votre mot de passe" 
                            id="mdp1" class="write"
                            name="mdp1"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="formeinscription" value="Je m'inscris" class="submit2"/>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            if(isset($erreur))
            {
                echo$erreur;
            }
            ?>
        </div>
        <div class="float">
            <div class="floater" style="--i:1"></div>
            <div class="floater" style="--i:2"></div>
            <div class="floater" style="--i:3"></div>
            <div class="floater" style="--i:4"></div>
        </div>
    </body>
</html>
