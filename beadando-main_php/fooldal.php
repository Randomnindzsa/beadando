<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Főoldal</title>
  <link rel="icon" href="img/folap.PNG"/>
  <link rel="stylesheet" href="css/styles.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
<nav>
	<div>
	<img src="img/logo.png" alt="logo" title="logo" class="logo">
  <ul>
    <li><a href="fooldal.php" style="color: rgb(230, 149, 92);">Főoldal</a></li>
    <li><a href="hirfolyam.php">Hírfolyam</a></li>
    <li><a href="bejelentkezes.php">Bejelentkezés/Regisztráció</a></li>
    <li><a href="rangsor.php">Rangsor</a></li>
    <li><a href="szabalyok.php">Játékszabályok</a></li>
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
<div id="tartalom">
<hr/>
<h1>Üdvözzölek a Flesh and Blood magyar bajnokság honlapján honlapján.</h1>
<hr/>
<p id="fontos">Ez a <strong>nem hivatalos</strong> magyar bajnokság honlapja, ahol a különböző versenyek eredményeit gyüjtjük egy szezonon belül<br>
    Ha szeretnél csatlakozni a bajnoksághoz, regisztrálj a honlapon és <a href="tabla.html" target="_blank" style="color:red;">ezt a formát</a> kitöltve csatlakozz egyik versenyünkön.</p>
<h2>Jelenlegi legjobb: Kovács Andris</h2>
<h3>A pontkülönbség: 250</h3>
<hr>
<h2> Rólunk </h2>
<hr>
<q>Küldetésünk, hogy húsban és vérben összehozzuk az embereket a nagyszerű játékok közös nyelvén.</q>

<p>A Flesh and Blood-t egy független stúdió hozta létre Aucklandben, Új-Zélandon. A játékosok által a játékosok számára létrehozott Flesh and Blood hét évet töltött a fejlesztéssel, mielőtt 2019 októberében világméretű debütált, amikor megjelent első emlékeztető készletünk, a Welcome to Rathe.</p>

<p>A Flesh and Blood a jó döntéseket jutalmazza, nem a szerencsét. Játékunkkal a TCG kártyaértékelés és a pakliépítés filozófiájának alapvető törvényei ellen próbálunk szembeszállni. Rendkívül interaktív, a cselekvés az első kanyartól kezdődik. A játék egy egyedi erőforrásrendszer köré épül, amely egy innovatív harci dinamikát támaszt alá, amelyet szigorúan teszteltek a versenytárs TCG-fanatikusok.</p>
<hr>

<img class="kepkeret" src="img/fooldal.jpg" alt="jatekosok" title="meccs">
<hr>
<p>Globális szervezett játékprogramot működtetünk, amely visszatér a versenyjáték alapjaihoz. A pénzdíjas versenyek egész évben zajlanak, ami a nemzeti és világbajnokságok versenyjátékának csúcsát jelenti. A lezárt fedélzetet, a légterelő huzatot és a konstrukciót átívelő formátumok még a legedzettebb TCG-veteránokat is kihívás elé állítják.</p>

<p>A Flesh and Blood nem csak a TCG-fanatikusok és veteránok számára készült, hanem egy játék a gyűjtőknek és a finom dolgok ismerőinek. Nagyra értékeljük a begyűjthetőséget, és támogatjuk a virágzó másodlagos kártyapiac létezését. Cartamundi barátaink segítségével a Flesh and Blood a TCG kézművesség új szintjén készül, anélkül, hogy figyelmen kívül hagynák a részleteket.</p>
<hr>
<img class="kepkeret" src="img/kartya.jpg" alt="kartyak" title="kartyak">
<hr>
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
