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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<bold class="logo">Interract</bold>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/rattrapage/rattrapage/index.php">page d'insertion <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/rattrapage/rattrapage/gallerie.php">Galerie</a>
      </li>
    </ul>
  </div>
</nav>
<h1>Gallerie interractive!</h1>
<div class="container">
<div class="col-sm-1"></div>
<div class="col-sm-10">
    <h2>Gallerie</h2>
    <?php 
        $dossier = "images/";
        $dir = opendir($dossier);
        while ($file = readdir($dir)){
        $allow_ext = array("jpg",'png','gif');
        $ext = strtolower(substr($file,-3));
            if (in_array($ext,$allow_ext)){
    ?>
<div class="container">
    <div class="imageBiblio col-sm-8">
        <form method="post" action="gallerie.php" enctype="multipart/form-data">
            <a href="images/<?php echo $file; ?>">
            <img src="images/<?php echo $file; ?>" width="200" height="200"/>
            </a>

            <input type="radio"  name="sup" value="<?php echo $file; ?>">
            <input type="submit" name="Supprimer" value="Supprimer">
            <br>
        </form>
    </div>

    <div class="clear">
                <br>
    </div>

</div>
<?php 
}
}
?>
</div>
<div class="col-sm-1"></div>
</div>
</body>
</html>