<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Profil</title>
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
	<li><a href="felhasznalok.php">Felhasználók</a></li>
	<li><a href="felhasznalok_kezelese.php">Felhasználók kezelése</a></li>
	<li> <a href="sajatprofil.php" style="color: rgb(230, 149, 92);"> Profil </a> </li>
	<li><a href="logout.php"> Kijelentkezés </a></li>
  </ul>
  </div>
</nav>
</header>
<main>
  <br>
  <br>
  <br>
<hr/>
<h1> Profil </h1>
<hr/>
<div id="tartalom">

<?php
	$conn = new mysqli('127.0.0.1','root','','kartyajatek');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_GET['id'])) { 
		$id = $_GET['id'];
		$sql = "SELECT id,vezeteknev,keresztnev,email,felhasznalonev,bolt  FROM felhasznalok WHERE id=$id";
		$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<table class='rangsor'>
			<tr>
				<th> Adatok </th>
				<th> Profil adatok </th>
			</tr>
			
		";
		
		while($row = $result->fetch_assoc()) {
			echo "

		<tr>
			<td> Vezetéknév </td>
			<td>". $row["vezeteknev"]."</td>
		</tr>
		<tr>
			<td> Keresztnév </td>
			<td>". $row["keresztnev"]."</td>
		</tr>
		<tr>
			<td> Email </td>
			<td>". $row["email"]."</td>
		</tr>
		<tr>
			<td> Felhasználónév </td>
			<td>". $row["felhasznalonev"]."</td>
		</tr>
		<tr>
			<td> Bolt </td>
			<td>". $row["bolt"]."</td>
		</tr>
 ";
 
	}
	echo "</table>";
	} else {
		echo "Nincs jeleleng elérhető felhasználó!";
}
	}
	else { 
		echo "Hiba!";
	}
$conn->close();
?>
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
