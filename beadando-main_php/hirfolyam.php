<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Hírfolyam</title>
  <link rel="icon" href="img/folap.PNG"/>
  <link rel="stylesheet" href="css/styles.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
  <body>
<header>
<nav>
	<div>
	<img src="img/logo.png" alt="logo" title="logo">
  <ul>
    <li><a href="fooldal.php">Főoldal</a></li>
    <li><a href="hirfolyam.php" style="color: rgb(230, 149, 92);">Hírfolyam</a></li>
    <li><a href="bejelentkezes.php">Bejelentkezés/Regisztráció</a></li>
    <li><a href="rangsor.php">Rangsor</a></li>
    <li><a href="szabalyok.php">Játékszabályok</a></li>
	<?php
    if(isset($_SESSION["username"])){ ?>
			
			<li><a href="felhasznalok.php">Felhasználók</a></li>
			<li><a href="felhasznalok_kezelese.php">Felhasználók kezelése</a></li>
			<li> <a href="sajatprofil.php"> Profil </a> </li>
			<li><a href="logout.php">Kijelentkezés</a></li>
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
<h1>Flesh and Blood hírei</h1>
<hr>
<div id="tartalom">
<table id="hirfolyam">
 <tr>
  <td>
      <a href="https://fabtcg.com/articles/announcing-calling-taiwan/">
          <img src="img/hir_1.PNG" alt="hir_1" style="max-width:100%;height:auto;">
      </a>
    <br>
  </td>
 <td>
     <a href="https://fabtcg.com/organised-play/2022/pro-tour-1-new-jersey/">
         <img src="img/hir_2.PNG" alt="hir_2" style="max-width:100%;height:auto;">
     </a>
<br>
</td>
<td>
    <a href="https://fabtcg.com/articles/skirmish-season-4-hero-showcase-series-part-i/">
        <img src="img/hir_3.PNG" alt="hir_3" style="max-width:100%;height:auto;">
    </a>
<br>
</td>
</tr>
<tr>
<td>
    <a href="https://fabtcg.com/articles/back-alley-oracle-3-cr20-officially-released/">
        <img src="img/hir_4.PNG" alt="hir_4" style="max-width:100%;height:auto;">
    </a>
<br>
</td>
<td>
    <a href="https://fabtcg.com/articles/fab-x-dragon-shield">
        <img src="img/hir_5.PNG" alt="hir_5" style="max-width:100%;height:auto;">
    </a>
<br>
</td>
<td>
    <a href="https://fabtcg.com/products/booster-set/classic-battles-rvd/">
        <img src="img/hir_6.PNG" alt="hir_6" style="max-width:100%;height:auto;">
    </a>
<br>
</td>
</tr>
</table>
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
