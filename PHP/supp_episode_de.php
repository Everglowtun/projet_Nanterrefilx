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
if(isset($_POST['numero_episode'])) $nume=$_POST['numero_episode'];
else $nume="";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM episode WHERE title = '$_SESSION[nom_s]' and nb_episode = '$nume' ";
    $res = $conn->exec($sql);
    if ($res == 0){
        echo "delete in failed";
    }
    else{
        echo "delete  in  successfully";
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$nom_supp = $_SESSION['nom_s']."_$nume".'.php'; 
$status=unlink($nom_supp);    
if($status){  
echo "File deleted successfully";    
}else{  
echo "Sorry!";    
}  


$conn = null;
echo "<p>Rentrer la page serie </p><br><a href = \"serie.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
?>      
</body>
</html>
