
<!DOCTYPE html>
<html>
<head>
<title>Devenez_member</title>
<link rel="stylesheet" type="text/css" href="effect.css">
</head>
<body>
<form name="monformulaire1" action="insert_serie_de.php" method="POST"  enctype="multipart/form-data">
    <!-- /*membre.php*/ -->
    <div>
        <label class="b" for="text">intitulé:</label>
        <input type="text" 
        name="intitule" 
        placeholder="intitule"
        autocomplete="on"> 
      </div>
      <div>

        <label class="b" for="text">nombre d'épisodes:</label>
        <input type="text" 
        name="episode" 
        placeholder="episode"
        autocomplete="on"> 
      </div>
      <div>
      <label class="b" for="text">acteurs principaux:</label>
        <input type="text" 
        name="acteurs" 
        placeholder="acteurs"
        autocomplete="on"> 
      </div>
      <div>
      <label class="b" for="text">réalisateur:</label>
        <input type="text" 
        name="realisateur" 
        placeholder="realisateur"
        autocomplete="on"> 
      </div>
      <div>
      <label class="b" for="text">année de sortie:</label>
        <input type="text" 
        name="annee_sortie" 
        placeholder="annee_sortie"
        autocomplete="on"> 
      </div>

      <div>
        <input type="submit" value="Valider" />
      </div>

</form>
</body>
</html>
