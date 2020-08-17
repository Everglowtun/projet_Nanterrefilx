<?php
session_start();
?>
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
function tier_id_t(){
    $sql = "SELECT MAX(id_t) FROM track WHERE mel = '$_SESSION[mai_l]'";
    $stmt = conn()->prepare($sql);
    $stmt->execute();
    $res = $stmt -> fetchColumn();
    return $res;
}
function supp_id_t($num){
    $sql = "DELETE  FROM track WHERE id_t < '$num' and mel = '$_SESSION[mai_l]'";
    $stmt = conn()->prepare($sql);
    $stmt->execute();
}
function affiche_track($num){
    $sql = "SELECT * FROM track WHERE id_t = '$num'";
    $stmt = conn()->prepare($sql);
    if($stmt -> execute()){
        while ($row = $stmt->fetch()) {
            $nom = $row['nom_s'];
            $num2 = $row['nb'];
        }
    }
        $lien = $nom."_$num2".".php";
        echo "<p>Taper la boutton vert pour aller directement la derniere episode que vous avez vu. </p><br><a href = $lien><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
}
function count_nb(){
        $sql = "SELECT COUNT(Nom) FROM serie ";
        $stmt = conn()->prepare($sql); 
        $count = 1;
        $stmt ->execute(); 
        $count=$stmt->fetchColumn();
    return $count;
}
function tire(){
        $sql = "SELECT Nom FROM serie ";
        $stmt = conn()->prepare($sql); 
        $serie = array();
        $count = 0;
        if($stmt -> execute()){
            while ($row = $stmt->fetch()) {
                $serie[$count] = $row['Nom'];
                $count++;
            }
        }
    return $serie;
}
function create($nom_serie){
    $nom_sans_php = substr($nom_serie,0,-4);
    $nom = $nom_serie;
    $myfile = fopen($nom, "w") or die("Unable to open file!");
    $txt = '<?php session_start(); echo "Bienvenue, "  ; '.'echo $_SESSION[\'prenom\'];?>'."\n";
    fwrite($myfile, $txt);
    $txt = '<!DOCTYPE html><html><head><title>Devenez_member</title><link rel="stylesheet" type="text/css" href="effect.css"></head><body>
    '."\n";
    fwrite($myfile, $txt);
    $txt = '<?php $servername = "localhost";$username = "root";$password = "";$dbname = "test";$abc = 1;'."\n";
    fwrite($myfile, $txt);
    $txt = 'try {$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);'."\n";
    fwrite($myfile, $txt);    
    $txt = '$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);'."\n";
    fwrite($myfile, $txt);
    $txt = ' $sql = "SELECT Nom,Role_principal,Episode_total,Anne_sortie,realisateur  FROM serie where '."Nom = '$nom_sans_php' \";"."\n";
    fwrite($myfile, $txt);
    $txt = '$stmt = $conn->prepare($sql); if($stmt -> execute()){'."\n";
    fwrite($myfile, $txt);
    $txt = 'while ($row = $stmt->fetch()) {$abc ++; echo "Nom:".$row[\'Nom\'] .\'</br>\' ;'.'$_SESSION[\'nom_s\']= $row[\'Nom\'];'."\n";
    fwrite($myfile, $txt);
    $txt = ' echo "Role_principal:".$row[\'Role_principal\'] .\'</br>\';  echo "Episode_total:".$row[\'Episode_total\'].\'</br>\';'."\n";
    fwrite($myfile, $txt);
    $txt = 'echo "Annee_sortie:".$row[\'Anne_sortie\'] .\'</br>\'; echo "realisateur:".$row[\'realisateur\'] .\'</br>\';} }echo "<br>";'."\n";
    fwrite($myfile, $txt);
    $txt = 'if($abc == 1){echo "il n\'y a pas cette serie";  }}'."\n";
    fwrite($myfile, $txt);
    $txt = 'catch(PDOException $e){echo \'PDO Exception Caught\';'."\n";
    fwrite($myfile, $txt);
    $txt = ' echo \'Error with the database:<br />\';echo \'SQL Query:\',$sql;'."\n";
    fwrite($myfile, $txt);
    $txt = ' echo \'Connection failed:\'.$e->getMessage();} $conn = null;echo "</table>";?><ul><li><p>Voir les episodes</p><a  href="episode.php"><img src =buttons_PNG45.png width="80" height="20" ></a></li><li><p>Rentrer dans la page de serie</p><a  href="serie.php"><img src =buttons_PNG45.png width="80" height="20" ></a></li></ul></body></html>'."\n";
     fwrite($myfile, $txt);

     

    fclose($myfile);    
}
function insert($name){
$nn = substr($name,0, -4);
echo '<br>'."<a  href='$name'>$nn</a>"; 
}

if(isset($_POST['M_ail'])) $_SESSION['mai_l']=$_POST['M_ail'];
if(isset($_POST['Mot_de_pass'])) $_SESSION['mot']=$_POST['Mot_de_pass'];
$abc = 1;
    $sql = "SELECT Mail,Prenom,Nom,Telephone,Annee_naissance  FROM membre WHERE Mail = '$_SESSION[mai_l]' And Mot_de_pass = '$_SESSION[mot]' ";
    $stmt = conn()->prepare($sql); 
    if($stmt -> execute()){
        while ($row = $stmt->fetch()) {
            $abc ++;
            $s_prenom = $row['Prenom'];
        }
    }
    echo "<br>";
    if($abc == 1){
        echo "Votre mot de pass ou mail incorrect";
    }
    else{
$_SESSION['prenom'] =$s_prenom;
echo "Bienvenue, "  ; 
echo $_SESSION['prenom'];
echo " !"  ;
    }
    echo "<br>";
$nb_r = count_nb();
$cc = 0;
while($cc <$nb_r ){
    $ne= tire()[$cc].'.php';
    create($ne);
    insert($ne);
    $cc ++;
}

$bb = tier_id_t();
echo '<br>'.$bb;
if($bb != 0){
    supp_id_t($bb);
    affiche_track($bb);
   
}

//Seulment l'administrateur peut inserer les nouveaux series
$conn = null;

if($_SESSION['mai_l'] == "sun952775@gmail.com"){
    echo"<br> Vous êtes administrateur, vous pouvez inserer ou supprimer les series.";
    echo "<p>Supprimer une serie. </p><br><a href = \"supp_serie_pr.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";

    echo "<p>Ajouter une serie. </p><br><a href = \"insert_serie_pr.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
}
?>
<p>Changer le compte</p><br><a href = "utilisateur_formulaire_pre_page.php"><img src ="buttons_PNG45.png" width=80 height=20 ></a>
</body>
</html>
