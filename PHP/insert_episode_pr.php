
<!DOCTYPE html>
<html>
<head>
<title>insert_episode_pr</title>
<link rel="stylesheet" type="text/css" href="effect.css">
</head>
<body>
<form name="monformulaire1" action="insert_episode_de.php" method="POST"  enctype="multipart/form-data">
    <!-- /*membre.php*/ -->
    <div>
        <label class="b" for="text">numero d'episode :</label>
        <input type="text" 
        name="numero_episode" 
        placeholder="numero_episode"
        autocomplete="on"> 
      </div>
      <div>
      <label class="b" for="text">lien d'episode:</label>
        <input type="text" 
        name="lien_episode" 
        placeholder="lien_episode"
        autocomplete="on"> 
      </div>

      <div>
        <input type="submit" value="Valider" />
      </div>

</form>
</body>
</html>
