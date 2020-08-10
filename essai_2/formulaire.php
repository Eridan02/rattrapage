<?php
    if (!empty($_FILES)) {

        
        print_r($_FILES);
        $img = $_FILES['img'];
        $ext = strtolower (substr($img['name'], -3));
        $allow_ext = array("jpg", 'png', 'gif');

        if (in_array($ext, $allow_ext)) {
            move_uploaded_file($img['tmp_name'], "images/ ".$img['name']);
        }
        else
        $erreur = "erreur";
    }


    if(isset($_POST['sup'])){
        $i = $_POST["sup"];
        $ouvrir = opendir("images/");
        $regarder = fgets($ouvrir);

        if ($regarder = $i){
            unlink("images/".$i);
        }
        closedir($ouvrir);
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr"  lang="fr">
    <head>
        <title>Blog</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <h1>Formulaire d'ajout du blog</h1>

    <?php
    if (isset($erreur)){
        echo $erreur;
    }
    ?>

    <form method="post" action="index.php" enctype="multipart/form-data">
    <div class="form-group col-sm-4">
    <input type="file" class="form-control-file" id="img" name="img">
    </div>
    <div class="form-group col-sm-4">
        <input type="submit" name="Envoyer"/>
    </div>
       
    </form>



<?php
    $dossier = "images/";
    $dir = opendir($dossier);

    while ($file = readdir($dir)){ 
        $allow_ext = array("jpg",'png','gif');
        $ext = strtolower(substr($file,-3));
        if (in_array($ext,$allow_ext)){
?>

<ul>
    <li><a href="/rattrapage/rattrapage/essai_2/formulaire.php" target="_blank"> retour à la page d'insertion </a></li>
    <li><a href="/rattrapage/rattrapage/essai_2/gallerie.php" target="_blank"> gallerie </a></li>
</ul>

<?php
    }
}
?>

</body>

</html>
