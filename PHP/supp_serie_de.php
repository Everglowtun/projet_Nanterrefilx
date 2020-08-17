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
if(isset($_POST['nom_serie'])) $nom=$_POST['nom_serie'];
else $nom="";
function delete_t($nom){
    $sql = "DELETE FROM track WHERE nom_s = '$nom' and mel = '$_SESSION[mai_l]' ";
    $res = conn()->exec($sql);
}
function delete_e($nom){
    $sql = "DELETE FROM episode WHERE title = '$nom' ";
    $res = conn()->exec($sql);
}
function delete_s($nom){
    $sql = "DELETE FROM serie WHERE Nom = '$nom' ";
    $res = conn()->exec($sql);
}


function count_nb_episode($nom){
    $sql = "SELECT COUNT(nb_episode) FROM episode where title = '$nom' ";
    $stmt = conn()->prepare($sql); 
    $count = 1;
    $stmt ->execute(); 
    $count=$stmt->fetchColumn();
return $count;
}




$count  = count_nb_episode($nom);
$cc = 0;
while($cc <  $count + 1){
    $cc ++;
    $bb = $nom."_$cc".".php";
    if(file_exists($bb) ==  true){
        echo"<br> $bb";
        $status=unlink($bb); 
    }
    
}
$status=unlink($nom.".php");    
delete_t($nom);
delete_e($nom);
 delete_s($nom);
$conn = null;
echo "<p>Rentrer la page serie </p><br><a href = \"serie.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
?>      
</body>
</html>
