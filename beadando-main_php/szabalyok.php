<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Játékszabályok</title>
  <link rel="icon" href="img/folap.PNG"/>
  <link rel="stylesheet" href="css/styles.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
  </head>
<body>
<header>
<nav>
	<div>
	<img src="img/logo.png" alt="logo" title="logo">
  <ul>
    <li><a href="fooldal.php">Főoldal</a></li>
    <li><a href="hirfolyam.php">Hírfolyam</a></li>
    <li><a href="bejelentkezes.php">Bejelentkezés/Regisztráció</a></li>
    <li><a href="rangsor.php">Rangsor</a></li>
    <li><a href="szabalyok.php" style="color: rgb(230, 149, 92);">Játékszabályok</a></li>
	<?php
    if(isset($_SESSION["username"])){ ?>
			<li><a href="felhasznalok.php">Felhasználók</a></li>
			<li><a href="felhasznalok_kezelese.php">Felhasználók kezelése</a></li>
			<li> <a href="sajatprofil.php"> Profil </a> </li>
			<li> <a href="logout.php"> Kijelentkezés </a> </li>
    <?php } ?>
  </ul>
  </div>
</nav>
</header>

<main>
    <br>
    <br>
    <br>
<hr>
<h1>A Játék szabályai</h1>
<hr>
<div id="#tartalom">
<div id="video">
<video controls>
  <source src="img/szabalyok.mp4" type="video/mp4"/>
  Ez a szöveg akkor jelenik meg, ha a böngésző nem támogatja a videóállományok beágyazását.
</video>
<p>Ha lenne másik kérdésed akkor kereds fel ezt a <a href="https://www.facebook.com/groups/4134313569958655">linket</a>.</p>
</div>
</div>
</main>
<footer>
    <ul>
        <li> <a href="https://www.facebook.com/fabtcg" target="_blank"> Facebook </a> </li>
        <li> <a href="https://twitter.com/fabtcg" target="_blank"> Twitter </a> </li>
        <li> <a href="https://www.facebook.com/groups/426675531382222/" target="_blank"> FAB Rules </a> </li>
		<li> <a href="https://fabtcg.com/resources/terms-of-service/" target="_blank"> Szolgáltatás feltételei </a> </li>
	<li> <a href="https://fabtcg.com/resources/privacy-policy/" target="_blank"> Adatvédelmi írányelvek </a> </li>
    </ul>
</footer>
</body>
</html>
