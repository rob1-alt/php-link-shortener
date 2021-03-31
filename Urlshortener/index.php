
<?php
    include 'urlshortener.sql';
      // Setup of the database, and connect to the user table 
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'urlshortener';
    $base_url='http://localhost/Urlshortener/'; 
    


    if(isset($_GET['url']) && $_GET['url']!="")
    { 
    $url=urldecode($_GET['url']);
    if (filter_var($url, FILTER_VALIDATE_URL)) 
    {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 
    $slug=GetShortUrl($url);
    $conn->close();
    
    echo $base_url.$slug;
    
    
    } 
    else 
    {
    die("$url is not a valid URL");
    }

    }
    else
    {	?>
    <?php
    }
    function GetShortUrl($url){
        global $conn;
        $query = "SELECT * FROM url_shorten WHERE url = '".$url."' "; 
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['short_code'];
        } else {
        $short_code = generateUniqueID();
        $sql = "INSERT INTO url_shorten (url, short_code, hits)
        VALUES ('".$url."', '".$short_code."', '0')";
        if ($conn->query($sql) === TRUE) {
        return $short_code;
        } else { 
        die("Unknown Error Occured");
        }
        }
        }
        function generateUniqueID(){
        global $conn; 
        $token = substr(md5(uniqid(rand(), true)),0,6); $query = "SELECT * FROM url_shorten WHERE short_code = '".$token."' ";
        $result = $conn->query($query); 
        if ($result->num_rows > 0) {
        generateUniqueID();
        } else {
        return $token;
        }
        }
        if(isset($_GET['redirect']) && $_GET['redirect']!="")
{ 
$slug=urldecode($_GET['redirect']);
 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$url= GetRedirectUrl($slug);
$conn->close();
header("location:".$url);
exit;
}
function GetRedirectUrl($slug){
    global $conn;
    $query = "SELECT * FROM url_shorten WHERE short_code = '".addslashes($slug)."' "; 
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hits=$row['hits']+1;
    $sql = "update url_shorten set hits='".$hits."' where id='".$row['id']."' ";
    $conn->query($sql);
    return $row['url'];
    }
    else 
    { 
    die("Invalid Link!");
    }
    }
?>



<!DOCTYPE html >
<html lang="en">
    <head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height">
        <link rel="stylesheet" href="./app_test.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=K2D&display=swap" rel="stylesheet"> 

        <title>Yelienix</title>
    </head>
    <header>
            <h1>Yelienix</h1>
            <div class="containerMenu">
            <ul class="menu">
            <?php
                echo '<li><p><a class="link" href="./connection.php"> Connexion</a></p></li>';
                echo '<li><p><a class="link" href="./Inscription.php"> Inscription</a></p></li>';
            ?>
            </ul>
            </div>
        </header>
        <div class="container">
        <div class="link2">
            <input type="text" name="url emplacement" placeholder="Entrez votre url">
            <input type="submit" >
        </div>
        <div class="history">
            <h3>Historique</h3>
            <scroll-container>
                <ul>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                <li>hey</li>
                </ul>
            </scroll-container>
        </div>
    </div>
    <div class="float">
    <div class="floater" style="--i:1"></div>
    <div class="floater" style="--i:2"></div>
    <div class="floater" style="--i:3"></div>
    <div class="floater" style="--i:4"></div>
    </div>
    <script>
        const body = document.querySelector('body')
        body.style.height = window.innerHeight + 'px';
    </script>
    </body>
</html>


