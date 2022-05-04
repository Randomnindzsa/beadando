<?php
	session_start();
	$felhasznalonev=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Felhasználók</title>
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
    <li><a href="rangsor.php">Rangsor</a></li>
    <li><a href="szabalyok.php">Játékszabályok</a></li>
	<li><a href="felhasznalok.php" style="color: rgb(230, 149, 92);">Felhasználók</a></li>
	<li><a href="felhasznalok_kezelese.php">Felhasználók kezelése</a></li>
	<li><a href="sajatprofil.php">Profil</a></li>
	<li><a href="logout.php">Kijelentkezés</a></li>
  </ul>
  </div>
</nav>
</header>
<main>
  <br>
  <br>
  <br>
<hr/>
<h1> Felhasználók </h1>
<hr/>
<div id="tartalom">

<?php
	    if (!isset($_SESSION["username"])) {
			header("Location: bejelentkezes.php");
		}
    

	// Create connection
	$conn = new mysqli('127.0.0.1','root','','kartyajatek');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		
	$sql = "SELECT id,vezeteknev,keresztnev,email,felhasznalonev FROM felhasznalok WHERE felhasznalonev!='$felhasznalonev'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
			echo "<table class='rangsor'>
				<caption>Felhasználók listája.</caption>
				<thead>
				<tr>
				<th id='vnev'>Vezetéknév</th>
				<th id='knev'>Keresztnév</th>
				<th id='email'>E-mail</th>
				<th id='fnev'>Felhasználónév</th>
				</tr>
				</thead>";
	
		while($row = $result->fetch_assoc()) { 
		
				echo "<tr>
						<td headers='vnev'>".$row["vezeteknev"]."</td>
						<td headers='knev'>".$row["keresztnev"]."</td>
						<td headers='email'>".$row["email"]."</td>
						<td headers='fnev'><a href='profil.php?id=".$row["id"]."'>".$row["felhasznalonev"]."</a></td>
						</tr>";
		}
		echo "</table>";
	}
	else { 
		echo "Nincsenek további felhasználók!";
	}
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
