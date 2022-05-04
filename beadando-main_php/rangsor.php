<?php
	session_start();
?>


<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Rangsor</title>
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
    <li><a href="hirfolyam.php">Hírfolyam</a></li>
    <li><a href="bejelentkezes.php">Bejelentkezés/Regisztráció</a></li>
    <li><a href="rangsor.php" style="color: rgb(230, 149, 92);">Rangsor</a></li>
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
<hr/>
<h1> Rangsor </h1>
<hr/>
<div id="tartalom">
<table class="rangsor">
  <caption>Rangsor ebben a szezonban.</caption>
  <thead>
  <tr>
    <th id="rang">Szezon rang</th>
    <th id="nev">Név</th>
    <th id="user_id">Gem azonosító</th>
    <th id="pont">Pontok</th>
  </tr>
  </thead>
  <tr>
    <td headers="rang">1</td>
    <td headers="nev">András Kovács</td>
    <td headers="user_id">41117488</td>
    <td headers="pont">424</td>
  </tr>
  <tr>
    <td headers="rang">2</td>
    <td headers="nev">Gaál Benjamin</td>
    <td headers="user_id">62347947</td>
    <td headers="pont">174</td>
  </tr>
  <tr>
    <td headers="rang">3</td>
    <td headers="nev">Peszlen Zoltán</td>
    <td headers="user_id">16974376</td>
    <td headers="pont">162</td>
  </tr>
  <tr>
    <td headers="rang">4</td>
    <td headers="nev">Ádám Levente</td>
    <td headers="user_id">32776788</td>
    <td headers="pont">134</td>
  </tr>
  <tr>
    <td headers="rang">5</td>
    <td headers="nev">Várnai Dénes</td>
    <td headers="user_id">71648187</td>
    <td headers="pont">129</td>
  </tr>
  <tr>
    <td headers="rang">6</td>
    <td headers="nev">Balint Herendi</td>
    <td headers="user_id">93118869</td>
    <td headers="pont">122</td>
  </tr>
  <tr>
    <td headers="rang">7</td>
    <td headers="nev">Domonkos Ács</td>
    <td headers="user_id">11397949</td>
    <td headers="pont">120</td>
  </tr>
  <tr>
    <td headers="rang">8</td>
    <td headers="nev">Bálint Ágoston</td>
    <td headers="user_id">33323714</td>
    <td headers="pont">105</td>
  </tr>
  <tr>
    <td headers="rang">9</td>
    <td headers="nev">Kevin Andrasi</td>
    <td headers="user_id">45254767</td>
    <td headers="pont">93</td>
  </tr>
  <tr>
    <td headers="rang">10</td>
    <td headers="nev">Bence Vereszki</td>
    <td headers="user_id">99244129</td>
    <td headers="pont">86</td>
  </tr>
  <tr>
    <td headers="rang">11</td>
    <td headers="nev">Gábor Varga</td>
    <td headers="user_id">76472127</td>
    <td headers="pont">62</td>
  </tr>
  <tr>
    <td headers="rang">12</td>
    <td headers="nev">Robert Secheli</td>
    <td headers="user_id">86324138</td>
    <td headers="pont">55</td>
  </tr>
  <tr>
    <td headers="rang">13</td>
    <td headers="nev">Bálint Tóth</td>
    <td headers="user_id">71968976</td>
    <td headers="pont">52</td>
  </tr>
  <tr>
    <td headers="rang">14</td>
    <td headers="nev">Attila Toth</td>
    <td headers="user_id">61829896</td>
    <td headers="pont">52</td>
  </tr>
  <tr>
    <td headers="rang">15</td>
    <td headers="nev">Tomor Péter</td>
    <td headers="user_id">59552855</td>
    <td headers="pont">56</td>
  </tr>
  <tr>
    <td headers="rang">16</td>
    <td headers="nev">Balazs Kovacs</td>
    <td headers="user_id">63571418</td>
    <td headers="pont">39</td>
  </tr>
  <tr>
    <td headers="rang">17</td>
    <td headers="nev">Tinghao Liu</td>
    <td headers="user_id">56961891</td>
    <td headers="pont">39</td>
  </tr>
  <tr>
    <td headers="rang">18</td>
    <td headers="nev">Mark Zalakovacs</td>
    <td headers="user_id">91851464</td>
    <td headers="pont">36</td>
  </tr>
  <tr>
    <td headers="rang">19</td>
    <td headers="nev">Tamás Nyitrai</td>
    <td headers="user_id">78934431</td>
    <td headers="pont">33</td>
  </tr>
  <tr>
    <td headers="rang">20</td>
    <td headers="nev">Ferenc Évinger</td>
    <td headers="user_id">14217472</td>
    <td headers="pont">24</td>
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
