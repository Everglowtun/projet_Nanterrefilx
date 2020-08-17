<?php
session_start();
echo "Bienvenue, "  ; 
echo $_SESSION['prenom'];
echo " !"  ;?>
<!DOCTYPE html>
<html>
<head>
<title>insert_episode_de</title>
<link rel="stylesheet" type="text/css" href="effect.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
if(isset($_POST['numero_episode'])) $numero=$_POST['numero_episode'];
else $numero="";
if(isset($_POST['lien_episode'])) $lien=$_POST['lien_episode'];
else $lien="";
function conn(){
    global  $servername;
    global $username ;
    global $password;
    global $dbname;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e){
            echo 'PDO Exception Caught';
            echo 'Error with the database:<br />';
            echo 'SQL Query:',$sql;
            echo 'Connection failed:'.$e->getMessage();
        }
        return $conn;
}
function insert(){
    global $numero;
    global $lien;
    $sql = "INSERT INTO episode(title, nb_episode,src ) VALUES('$_SESSION[nom_s]', '$numero', '$lien')";
    conn()->exec($sql);
    echo "sign in  successfully";
echo "<p>Rentrer la page serie </p><br><a href = \"serie.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
echo "<p>Ajouter une autre episode pour cette serie. </p><br><a href = \"insert_episode_pr.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
}
function verifier($numero){
    $sql = "SELECT nb_episode FROM  episode WHERE nb_episode = '$numero' and title= '$_SESSION[nom_s]'";
    $stmt = conn()->prepare($sql); 
    $stmt -> execute();
    $res = $stmt ->fetchColumn();
    echo '<br>' .$res;
    if($res == 0){
        insert();
    }
    else{
        echo'Cette episode est deja existe';
        echo "<p>Rentrer la page serie </p><br><a href = \"serie.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
    }
}
verifier($numero);


?>      
</body>
</html>
