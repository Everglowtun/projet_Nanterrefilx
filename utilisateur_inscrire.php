
<!DOCTYPE html>
<html>
<head>
<title>Devenez_member</title>
<link rel="stylesheet" type="text/css" href="effect.css">
</head>
<body>
<form name="monformulaire1" action="utilisateur_insert.php" method="POST"  enctype="multipart/form-data">
    <!-- /*membre.php*/ -->
    <div>
        <label class="b" for="text">nom:</label>
        <input type="text" 
        name="nom" 
        placeholder="nom"
        autocomplete="on"> 
      </div>
      <div>

        <label class="b" for="text">prénom:</label>
        <input type="text" 
        name="prenom" 
        placeholder="prénom"
        autocomplete="on"> 
      </div>
      <div>
      <label class="b" for="text">Mail:</label>
        <input type="text" 
        name="mail" 
        placeholder="Mail"
        autocomplete="on"> 
      </div>
      <div>
      <label class="b" for="text">Téléphone:</label>
        <input type="text" 
        name="tele" 
        placeholder="tele"
        autocomplete="on"> 
      </div>
      <label class="b" for="text">Date_naissance:</label>
        <input type="text" 
        name="date" 
        placeholder="date"
        autocomplete="on"> 
      </div>
      <label class="b" for="text">Mot de pass:</label>
        <input type="password" 
        name="mot" 
        placeholder="mot"
        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[^]{8,50}"
        title="Votre mot de pass doit entre 4 et 8 caractères contenant au moins un chiffre, une lettre
        majuscule, une lettre minuscule et un autre caractère"
        autocomplete="on"> 
      </div>

      <div>
        <input type="submit" value="Inscrire" />
      </div>

</form>
</body>
</html>