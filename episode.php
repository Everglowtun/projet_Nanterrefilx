<?php
session_start();
echo $_SESSION['nom_s'];
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
$nom_s = $_SESSION['nom_s'];
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
function count_nb_episode($nom){
        $sql = "SELECT COUNT(nb_episode) FROM episode where title = '$nom' ";
        $stmt = conn()->prepare($sql); 
        $count = 1;
        $stmt ->execute(); 
        $count=$stmt->fetchColumn();
    return $count;
}
function tire_nb_episode($nom){
        $sql = "SELECT nb_episode FROM episode where title = '$nom' ";
        $stmt = conn()->prepare($sql); 
        $epi = array();
        $count = 0;
    
        if($stmt -> execute()){
            while ($row = $stmt->fetch()) {
                $epi[$count] = $row['nb_episode'];
                $count++;
            }
        }
    return $epi;
}
function create_episode($nb_episode){
    $mail = $_SESSION['mai_l'];
    $nomm = $_SESSION['nom_s'];
    $myfile = fopen($_SESSION['nom_s']."_$nb_episode".".php", "w") or die("Unable to open file!");
    $txt = '<?php session_start();'.'echo "Bienvenue, $_SESSION[prenom] "'.' ;?> '."\n";
    fwrite($myfile, $txt);
    $txt = '<!DOCTYPE html><html><head><title>Devenez_member</title><link rel="stylesheet" type="text/css" href="effect.css"></head><body>
    '."\n";
    fwrite($myfile, $txt);
    $txt = '<?php $servername = "localhost";$username = "root";$password = "";$dbname = "test";'."\n";
    fwrite($myfile, $txt);
    $txt = 'function track(){global  $servername;global $username ;global $password;global $dbname;'."\n";
    fwrite($myfile, $txt);
    $txt = 'try {$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);'."\n";
    fwrite($myfile, $txt);
    $txt = '$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);'."\n";
    fwrite($myfile, $txt);
    $txt = '$sql = "INSERT INTO  track SET '."nom_s = '$nomm', mel = '$mail', nb = '$nb_episode' \";"."\n";
    fwrite($myfile, $txt);
    $txt = ' $res = $conn->exec($sql);if($res == 0){echo "Insert in failed";}}catch(PDOException $e){'."\n";
    fwrite($myfile, $txt);
    $txt = 'echo $sql . "<br>" . $e->getMessage(); }}'."\n";
    fwrite($myfile, $txt);
    $txt = 'try {$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);'."\n";
    fwrite($myfile, $txt);    
    $txt = '$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);'."\n";
    fwrite($myfile, $txt);
    $txt = ' $sql = "SELECT src  FROM episode where  '."nb_episode  = '$nb_episode' and title = '$_SESSION[nom_s]' \";"."\n";
    fwrite($myfile, $txt);
    $txt = '$stmt = $conn->prepare($sql);'."\n";
    fwrite($myfile, $txt);
    $txt = '$stmt -> execute();$row = $stmt->fetch();}'."\n";
    fwrite($myfile, $txt);

    $txt = 'catch(PDOException $e){echo \'PDO Exception Caught\';'."\n";
    fwrite($myfile, $txt);
    $txt = ' echo \'Error with the database:<br />\';echo \'SQL Query:\',$sql;'."\n";
    fwrite($myfile, $txt);
    $txt = ' echo \'Connection failed:\'.$e->getMessage();} '."\n";
     fwrite($myfile, $txt);
     $txt = ' echo" <br><a href = $row[src]> '."$_SESSION[nom_s]"."_$nb_episode".'</a>"; '."\n";
     fwrite($myfile, $txt);
     $txt = ' echo "<br><a href =serie.php> '."Rentrer dans la page serie".'</a>"; '."\n";
     fwrite($myfile, $txt);
     $txt = ' echo "<br><a href = episode.php> '."Rentrer dans la page episode".'</a>"; '."\n";
     fwrite($myfile, $txt);
     $txt = ' track(); $conn = null;?></body></html>'."\n";
     fwrite($myfile, $txt);
    fclose($myfile);  
}
function insert_episode($nn){
    echo '<br>'."<a href = $_SESSION[nom_s]"."_$nn".".php".">"."$_SESSION[nom_s]"."_$nn"."</a>";
}
$co = count_nb_episode($_SESSION['nom_s']);

 $cc = 0;
 while($cc < $co){
     $ne = tire_nb_episode($_SESSION['nom_s'])[$cc];
    create_episode($ne);
    insert_episode($ne);
    $cc++;
 }
 if($_SESSION['mai_l'] == "sun952775@gmail.com"){
   
    echo "<p>Supprimer une episode de cette serie. </p><br><a href = \"supp_episode_pr.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";

    echo "<p>Ajouter une episode pour cette serie. </p><br><a href = \"insert_episode_pr.php\"><img src =buttons_PNG45.png width=\"80\" height=\"20\" ></a>";
}
$conn = null;


?>


      
</body>
</html>
