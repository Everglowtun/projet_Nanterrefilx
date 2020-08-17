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
if(isset($_POST['mail'])) $mail=$_POST['mail'];
else $mail="";
if(isset($_POST['mot'])) $mot=$_POST['mot'];
else $mot="";
if(isset($_POST['prenom'])) $p_renom=$_POST['prenom'];
else $p_renom="";
if(isset($_POST['nom'])) $n_om=$_POST['nom'];
else $n_om="";
if(isset($_POST['tele'])) $tele=$_POST['tele'];
else $tele="";
if(isset($_POST['date'])) $date=$_POST['date'];
else $date="";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO membre(Mail, Mot_de_pass,Prenom,Nom,Telephone,Annee_naissance ) VALUES('$mail', '$mot', '$p_renom','$n_om','$tele','$date')";
    $conn->exec($sql);
    echo "sign in  successfully";

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
 
$conn = null;
?>
<form name="monformulaire1" action="utilisateur_formulaire_pre_page.php" method="POST"  enctype="multipart/form-data">
<div>
        <input type="submit" value="Rentrer la page de connection" />
      </div>
</body>
</html>
