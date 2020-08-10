<?php if(isset($_POST['sup'])){
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
<h1>Gallerie</h1>
<?php $dossier = "image/";
$dir = opendir($dossier);
while ($file = readdir($dir)){
$allow_ext = array("jpg",'png','gif');
$ext = strtolower(substr($file,-3));
if (in_array($ext,$allow_ext)){
?>
<div class="imageBiblio">
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
<a href="images/<?php echo $file; ?>">
<img src="image/<?php echo $file; ?>"/>
    <h3><?php echo $titre; ?></h3>
</a>
    <input type="radio"  name="sup" value="<?php echo $file; ?>">
    <input type="submit" name="Supprimer" value="Supprimer">
</form>
<?php echo $commentaire?>
</div>
}
}
</body>

</html>
