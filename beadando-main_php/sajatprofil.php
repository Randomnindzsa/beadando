<?php
	session_start();
	$felhasznalonev=$_SESSION['username'];
	
    if (!isset($_SESSION["username"])) {
        header("Location: bejelentkezes.php");
    }
  
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Saját profil</title>
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
	<li><a href="felhasznalok.php">Felhasználók</a></li>
	<li><a href="felhasznalok_kezelese.php">Felhasználók kezelése</a></li>
	<li> <a href="sajatprofil.php" style="color: rgb(230, 149, 92);"> <?php echo $felhasznalonev; ?> </a> </li>
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
<h1> Saját profil </h1>
<hr/>
<div id="tartalom">
<?php
	// Create connection
	$conn = new mysqli('127.0.0.1','root','','kartyajatek');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
	
	if(isset($_POST['vnev_submit'])) { 
		$errors = array();
		$true = true;
		if(empty($_POST['vnev'])) { 
			$true=false;
			array_push($errors,"A Vezetéknév üres!");
		}
		if($true) { 
			$vnev = mysqli_real_escape_string($conn,$_POST['vnev']);
			$sql = "UPDATE felhasznalok SET vezeteknev='$vnev' WHERE felhasznalonev='$felhasznalonev'";
			if ($conn->query($sql) === TRUE) {
			echo "A vezetéknév módosítása sikeres volt!";
		} else {
			echo "A vezetéknév módosítása sikertelen volt!: " . $conn->error;
			}
		
		}
		
	}
	if(isset($_POST['knev_submit'])) { 
		$errors = array();
		$true = true;
		if(empty($_POST['knev'])) { 
			$true=false;
			array_push($errors,"A Keresztnév üres!");
		}
		if($true) { 
			$knev = mysqli_real_escape_string($conn,$_POST['knev']);
			$sql = "UPDATE felhasznalok SET keresztnev='$knev' WHERE felhasznalonev='$felhasznalonev'";
			if ($conn->query($sql) === TRUE) {
			echo "A keresztnév módosítása sikeres volt!";
		} else {
			echo "A keresztnév módosítása sikertelen volt!: " . $conn->error;
			}
		
		}
		
	}
	
	if(isset($_POST['felhasznalonev_submit'])) { 
		$errors = array();
		$true = true;
		if(empty($_POST['felhasznalonev'])) { 
			$true=false;
			array_push($errors,"A Felhasználónév mező üres!");
		}
		
		$vizsgalt_felhasznalonev = $_POST['felhasznalonev'];
		$sql_vizsgalat = "SELECT * FROM felhasznalok WHERE felhasznalonev='$vizsgalt_felhasznalonev'";		
		$result = $conn->query($sql_vizsgalat);
		
		if ($result->num_rows > 0) {
			$true=false;
			array_push($errors,"A felhasználónév már létezik! Kérem válasszon másikat!");
		} 
		else {
		if($true) { 
			$uj_felhasznalonev = mysqli_real_escape_string($conn,$_POST['felhasznalonev']);
			$sql = "UPDATE felhasznalok SET felhasznalonev='$uj_felhasznalonev' WHERE felhasznalonev='$felhasznalonev'";
			if ($conn->query($sql) === TRUE) {
			session_unset();
			session_destroy();
			echo "<script>alert('A felhasználónév módosítása sikeres volt! Kérem jelentkezen be újra az új felhasználónevévvel!'); window.location='bejelentkezes.php'</script>";
			//header('location: bejelentkezes.php');
			
		} else {
			echo "A felhasználónév módosítása sikertelen volt!: " . $conn->error;
			}
		
		}
	}
		
	}
	if(isset($_POST['email_submit'])) { 
		$errors = array();
		$true = true;
		if(empty($_POST['email'])) { 
			$true=false;
			array_push($errors,"Az Email cím mező üres!");
		}
		if($true) { 
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$sql = "UPDATE felhasznalok SET email='$email' WHERE felhasznalonev='$felhasznalonev'";
			if ($conn->query($sql) === TRUE) {
			echo "Az Email cím módosítása sikeres volt!";
		} else {
			echo "Az Email cím módosítása sikertelen volt!: " . $conn->error;
			}
		
		}
		
	}
	if(isset($_POST['bolt_submit'])) { 
		$errors = array();
		$true = true;
		if(empty($_POST['boltok'])) { 
			$true=false;
			array_push($errors,"A Bolt mező üres!");
		}
		if($true) { 
			$bolt = mysqli_real_escape_string($conn,$_POST['boltok']);
			$sql = "UPDATE felhasznalok SET bolt='$bolt' WHERE felhasznalonev='$felhasznalonev'";
			if ($conn->query($sql) === TRUE) {
			echo "A bolt módosítása sikeres volt!";
		} else {
			echo "A bolt módosítása sikertelen volt!: " . $conn->error;
			}
		
		}
		
	}
	
	if(isset($_POST['password_submit'])) { 
		$errors = array();
		$true = true;
		if(empty($_POST['jelenlegi'])) { 
			$true=false;
			array_push($errors,"A jelenlegi jelszó mező üres!");
		}
		
		$jelenlegi = mysqli_real_escape_string($conn,$_POST['jelenlegi']);
		$jelenlegi = md5($jelenlegi);
		$sql_vizsg_jelszo = "SELECT jelszo FROM felhasznalok WHERE jelszo='$jelenlegi' AND felhasznalonev='$felhasznalonev'";
		$result_vizsg_jelszo = $conn->query($sql_vizsg_jelszo);
		
		if ($result_vizsg_jelszo->num_rows == 0) {
			$true=false;
			array_push($errors,"A jelenlegi jelszó nem egyezik meg!");
		}
		if(empty($_POST['uj_jelszo'])) { 
			$true=false;
			array_push($errors,"Az új jelszó mező üres!");
		}
		if(empty($_POST['uj_jelszoismet'])) { 
			$true=false;
			array_push($errors,"Az új jelszó ismét mező üres!");
		}
		if($_POST['uj_jelszo']!=$_POST['uj_jelszoismet']) { 
			$true=false;
			array_push($errors,"A jelszavak nem engyelőek!");
		}
		if($true) { 
			$jelenlegi = mysqli_real_escape_string($conn,$_POST['jelenlegi']);
			$jelenlegi = md5($jelenlegi);
			$uj_jelszo = mysqli_real_escape_string($conn,$_POST['uj_jelszo']);
			$uj_jelszo= md5($uj_jelszo);
			$uj_jelszoismet = mysqli_real_escape_string($conn,$_POST['uj_jelszoismet']);
			$uj_jelszoismet = md5($uj_jelszoismet);
			$sql = "UPDATE felhasznalok SET jelszo='$uj_jelszo' WHERE felhasznalonev='$felhasznalonev'";
			if ($conn->query($sql) === TRUE) {
			echo "A jelszó módosítása sikeres volt!";
		} else {
			echo "A jelszó módosítása sikertelen volt!: " . $conn->error;
			}
		
		}
		
	}
	if(isset($_POST['torles'])) { 
		
		$sql_torles = "DELETE FROM autok WHERE tulajdonos_id = (SELECT id FROM felhasznalok WHERE felhasznalonev='$felhasznalonev')";
		if ($conn->query($sql_torles) === TRUE) {
			echo "Autók törlése sikeres volt!";
		} else {
			echo "A fiók törlése sikertelen volt!: " . $conn->error;
			}
		$sql_torlesfiok = "DELETE FROM felhasznalok WHERE felhasznalonev='$felhasznalonev'";
		if ($conn->query($sql_torlesfiok) === TRUE) {
			session_unset();
			session_destroy();
			echo "<script>alert('A fiók törlése sikeres volt!'); window.location='bejelentkezes.php'</script>";
		} else {
			echo "<script> alert('A fiók törlése sikertelen volt!:');window.location='sajatprofil.php' </script> " . $conn->error;
			}	
			
	}
		
	$sql = "SELECT vezeteknev,keresztnev,felhasznalonev,email,bolt FROM felhasznalok WHERE felhasznalonev='$felhasznalonev'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
			echo "<table class='rangsor' style='margin:auto;'>";
		while($row = $result->fetch_assoc()) {
			echo "
<tr>
	<th colspan='4'>
		Általános fiókbeállítások 
	</th>
</tr>

<tr>
	<td>
		<label> Vezetéknév: </label>
	</td>
	<td>
		<label> 
			".$row["vezeteknev"]." 
		</label>
	</td>
	<td colspan='2'>
		<form action='sajatprofil.php' method='POST'>
		<input type='text' name='vnev' placeholder='Vezetéknév' />
		<input type='submit' name='vnev_submit' value='Módosítás' onclick='return figyelmezetetoablak_modositas()'/>
		</form>
	</td>
</tr>
<tr>
	<td>
		<label> Keresztnév </label>
	</td>
	<td>
		".$row["keresztnev"]." 
	</td>
	<td colspan='2'>
		<form action='sajatprofil.php' method='POST'>
		<input type='text' name='knev' placeholder='Keresztnév' />
		<input type='submit' name='knev_submit' value='Módosítás' onclick='return figyelmezetetoablak_modositas()'/>
		</form>
	</td> 
</tr>
<tr>
	<td>
		<label> Felhasználó név: </label>
	</td>
	<td>
		<label> 
		".$row["felhasznalonev"]."
		</label>
	</td>
	<td colspan='2'>
		<form action='sajatprofil.php' method='POST'>
		<input type='text' name='felhasznalonev' placeholder='Felhasználónév' />
		<input type='submit' name='felhasznalonev_submit' value='Módosítás' onclick='return figyelmezetetoablak_modositas()'/>
		</form>
	</td>
</tr>
<tr>
	<td>
		<label> E-mail: </label>
	</td>
	<td>
	<label>  
		".$row["email"]."
	</label>
	</td>
	<td colspan='2'>
		<form action='sajatprofil.php' method='POST'>
		<input type='email' name='email' placeholder='E-mail'/>
		<input type='submit' name='email_submit' value='Módosítás' onclick='return figyelmezetetoablak_modositas()'/>
		</form>
	</td>
</tr>
<tr>
	<td>
		<label> Bolt: </label>
	</td>
	<td>
	<label>  
		".$row["bolt"]."
	</label>
	</td>
	<td colspan='2'>
		<form action='sajatprofil.php' method='POST'>
			<select name='boltok'>
				<option value='vác'>Vác Remete</option>
				<option value='meta' selected>Metagames</option>
				<option value='sarkanytuz'>Sárkánytűz</option>
				<option value='other'>Más</option>
				</select>
				<input type='submit' name='bolt_submit' value='Módosítás' onclick='return figyelmezetetoablak_modositas()'/>
				</form>
	</td>
</tr>";

		}
		echo "</table>";
	} else {
		echo "0 results";
}

echo "<form action='sajatprofil.php' method='POST'>
<table class='tablaadatok' style='margin:auto;'>
<tr>
<td colspan='2'>
<h3> Jelszó módósítás </h3>
</td>
</tr>

<tr>
<td>
<label> Jelenlegi jelszó: </label>
</td>
<td>
<input type='password' name='jelenlegi' required />
</td>
</tr>

<tr>
<td>
<label> Új jelszó: </label>
</td>
<td>
<input type='password' name='uj_jelszo' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Legalább egy számot, egy nagy- és kisbetűt, valamint legalább 8 vagy több karaktert kell tartalmaznia.' required />
</td>
</tr>

<tr>
<td>
<label> Új jelszó ismét: </label>
</td>
<td>
<input type='password' name='uj_jelszoismet' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Legalább egy számot, egy nagy- és kisbetűt, valamint legalább 8 vagy több karaktert kell tartalmaznia.' required />
</td>
</tr>
<tr>
<td colspan='2'>
<input type='submit' name='password_submit' value='Módosítás' onclick='return figyelmezetetoablak_modositas()'/>
</td>
</tr>
</table>
</form>
<br>
<form action='sajatprofil.php' method='POST'>
<input type='submit' name='torles' value='Fiók törlése' onclick='return figyelmezetetoablak_torles()'/>
</form>";
 
	if(!empty($errors)) { 
		foreach($errors as $key) { 
			echo $key."<br/>";
		
		}
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
<script>
	function figyelmezetetoablak_modositas() { 
		return confirm('Biztosan szeretné modósítani személyes adatát?')
	}
	function figyelmezetetoablak_torles() { 
		return confirm('Biztosan törölni szeretné fiókját?')
	}
	
</script>
</body>
</html>