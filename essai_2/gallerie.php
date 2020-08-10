<?php 
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
    <h1>Gallerie</h1>
    <?php 
        $dossier = "images/";
        $dir = opendir($dossier);
        while ($file = readdir($dir)){
        $allow_ext = array("jpg",'png','gif');
        $ext = strtolower(substr($file,-3));
        if (in_array($ext,$allow_ext)){
    ?>

    <div class="imageBiblio">
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
            <a href="images/<?php echo $file; ?>">
            <img src="images/<?php echo $file; ?>"/>
            </a>

            <input type="radio"  name="sup" value="<?php echo $file; ?>">
            <input type="submit" name="Supprimer" value="Supprimer">
        </form>
    </div>
<?php 
}
}
?>
</body>
</html>