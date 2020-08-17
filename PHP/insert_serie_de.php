<?php
session_start();
echo "Bienvenue, "  ; 
echo $_SESSION['prenom'];
echo " !"  ;?>
<!DOCTYPE html>
<html>
<head>
<title>Devenez_member</title>
<link rel="stylesheet" type="text/css" href="effect.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
if(isset($_POST['intitule'])) $intitule=$_POST['intitule'];
else $intitule="";
if(isset($_POST['episode'])) $episode=$_POST['episode'];
else $episode="";
if(isset($_POST['acteurs'])) $acteurs=$_POST['acteurs'];
else $acteurs="";
if(isset($_POST['realisateur'])) $realisateur=$_POST['realisateur'];
else $realisateur="";
if(isset($_POST['annee_sortie'])) $annee_sortie=$_POST['annee_sortie'];
else $annee_sortie="";




try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO serie(Nom, Role_principal,Episode_total,Anne_sortie,realisateur ) VALUES('$intitule', '$acteurs', '$episode','$annee_sortie','$realisateur')";
    $conn->exec($sql);
    echo "sign in  successfully";

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
 
$conn = null;
?>
<form name="monformulaire1" action="insert_serie_pr.php" method="POST" >
<div>
        <input type="submit" value="Ajouter une autre serie" />
      </div>
</from>
<labe for="text">Rentrer la page principale: </label>
<a class="link" href="utilisateur_formulaire_pre_page.php">
    <img  src="index.png"  width="50" height="50">
    </a>


      
</body>
</html>
