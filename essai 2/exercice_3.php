<?php
if (!empty($_FILES)) {

    $img = $_FILES['img'];
    $ext = strtolower(substr($img['name'], -3));
    $allow_ext = array("jpg", 'png', 'gif');
    if (in_array($ext, $allow_ext)) {
        move_uploaded_file($img['tmp_name'], "image/" . $img['name']);
        echo "Aucune erreur de transfert de fichier. le fichier a été copié dans le répertoire. Ajout du commentaire réussi.";
    }
    else{
        $erreur = "erreur";
    }
}

if(isset($_POST['sup'])){
    $i = $_POST["sup"];
    $ouvrir = opendir("image/");
    $regarder = fgets($ouvrir);

    if ($regarder = $i){
        unlink("image/".$i);
    }
    closedir($ouvrir);
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr"  lang="fr">
<head>
<title>Blog</title>
</head>
<body>
<h1>Formulaire d'ajout du blog</h1>
<?php
if (isset($erreur)){
    echo $erreur;
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="20000" /><br>
  Choisissez une photo avec une taille inférieure à 2mo <br>
  Titre: <input type="text" name="titre"><br>
  commentaire: <textarea rows="4" cols="50" name="commentaire">
    Votre commentaire...</textarea><br><br>
    <input type="file" name="img"/>
    <input type="submit" name="Envoyer"/>
</form>
<a href="DS_B1_PHP_LEBLANC/exercice3/exercice_3.1.php" target="_blank"> Page d'affichage du blog </a>

<?php
    $dossier = "image/";
    $dir = opendir($dossier);
while ($file = readdir($dir)){
    $allow_ext = array("jpg",'png','gif');
    $ext = strtolower(substr($file,-3));
    if (in_array($ext,$allow_ext)){
    ?>

<a href="DS_B1_PHP_LEBLANC/exercice3/exercice_3.1.php" target="_blank"> retour à la page d'insertion </a>
<a href="DS_B1_PHP_LEBLANC/exercice3/exercice_3.3.php" target="_blank"> gallerie </a>
<?php
    }
}
?>
</body>

</html>
