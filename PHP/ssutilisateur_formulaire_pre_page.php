<!DOCTYPE html>
<html>
<head>
<title>Mon CV</title>
<link rel="stylesheet" type="text/css" href="effect.css">
</head>
<body>


<form name="monformulaire1" action="serie.php" method="POST">  
    <div>
        <label class="b" for="text">Mail:</label class="b">
        <input type="text" 
        name="M_ail" 
        placeholder="M_ail"
        > 
      </div>
      <div>
        <label class="b" for="text">Mot_de_pass:</label>
        <input type="password" 
        name="Mot_de_pass"
        placeholder="Mot_de_pass">
</div>
      <div>
        <label class="b" for="submit"></label class="b">
        <input type="submit" value="connexion"/>
      </div>
</form>

<form name = "monformulaire2" action = "utilisateur_inscrire.php" method = "POST">
<div>
        <label class="b" for="submit"></label class="b">
        <input type="submit" value="Je ne suis pas encore inscrit"/>
      </div>
      </form>

</body>
</html>
