<?php
	$db = new mysqli('127.0.0.1','root','','kartyajatek'); //Ezzel csatlakozol az adatbázishoz. mysqli(szerver név vagy Ip cím,felhasználónév,jelszó (ami nincs),"adatbázis név")
	if ($db->connect_error) {
		die("Connection failed: " . $conn->connect_error); // Ezzel vizsgálód, hogy történt e hiba az adatbázis csatlakozáskor.
	}
	
	if(isset($_POST['regisz_submit'])) { // itt vizsgálód, hogy elküldték e a regisztációs űrlapot, tehát a name=regisz_submit gombra kantitott-e.
		$errors = array(); // hiba tömb a hiba üzenetek gyűjtésésre
		$true = true; // logikai változó ez arra fog szolgálni, hogy üres-e a mező vagy nem
		if(empty($_POST['lastname'])) {  // ezzel vizsgálód, hogy a megadott mező üres-e ez az az ág akkor fut le ha üres
			$true=false; // false lesz
			array_push($errors,"A Vezetéknév név mező üres!"); //ezzel adom hozzá a errors tömbökhöz a hiba üzenetet array_push(tombnev,"Szöveg")
		}
		if(empty($_POST['firstname'])) { 
			$true=false;
			array_push($errors,"A Keresztnévnév név mező üres!");
		}
		
		if(empty($_POST['email'])) { 
			$true=false;
			array_push($errors,"Az email mező üres!");
		}
		if(empty($_POST['username'])) { 
			$true=false;
			array_push($errors,"A felhasználónév mező üres!");
		}
		if(empty($_POST['passwd'])) { 
			$true=false;
			array_push($errors,"A jelszó mező üres!");
		}
		if(empty($_POST['passwdagin'])) { 
			$true=false;
			array_push($errors,"A jelszó ismét mező üres!!");
		}
		if(empty($_POST['passwdagin'])) { 
			$true=false;
			array_push($errors,"A jelszó ismét mező üres!!");
		}
		
		if($_POST['passwd']!=$_POST['passwdagin']) { // Itt vizsgálód, hogy a kétszer megadott jelszó megegyezik-e
			$true=false;
			array_push($errors,"A jelszavak nem engyelőek!");
		}
		$vizsgalt_felhasznalonev = $_POST['username']; // itt tárolód le a megadott felhasználónevet
		$sql_vizsgalat = "SELECT * FROM felhasznalok WHERE felhasznalonev='$vizsgalt_felhasznalonev'"; // ezzel a parancsal vizsgálód meg hogy a felhaszálók táblában van-e ilyen felhasználónév		
		$result = $db->query($sql_vizsgalat); // ez adja vissza a lekérdezés eredményének sorszámát.
		
		
		
		if ($result->num_rows > 0) { // ez akkor fut le, ha nagyobb, mint 0 a sorokszáma tehát van ilyen felhasználónév már
			$true=false;
			array_push($errors,"A felhasználónév már létezik! Kérem válasszon másikat!");
		}	
		else {
		
		if($true) { // ez akkor fut le, ha minden mezőt megadott és ha nem létezik ilyen felhasználónév
			$vnev = mysqli_real_escape_string($db,$_POST['lastname']); // egy változóban tárolom le a lastname mezőben megadott értéket
			$knev = mysqli_real_escape_string($db,$_POST['firstname']);
			$email = mysqli_real_escape_string($db,$_POST['email']); 
			$felhasznalonev = mysqli_real_escape_string($db,$_POST['username']);
			$bolt = mysqli_real_escape_string($db,$_POST['boltok']);
			$password = mysqli_real_escape_string($db,$_POST['passwd']);
			$password= md5($password);
			$jog='vendeg';
			$sql = "INSERT INTO felhasznalok (vezeteknev,keresztnev,email,felhasznalonev,jelszo,bolt,jogosultsag,pontok) VALUES ('$vnev','$knev','$email','$felhasznalonev','$password','$bolt','$jog',0)";
			$db->query($sql); // a felette lévő sql lekérdezéssel szúrom be az adatbázisba a regisztrált adatokat, ezzel a sorral pedig végrehajtom a lekérdezést
			session_start(); //munkameneti változó inditás
			$_SESSION['username'] = $felhasznalonev; // a munkamenti változóban letárolóm
			echo "<script> alert('Sikeres regisztráció!');window.location='sajatprofil.php' </script>";
		}
		
	}
			
}


	if(isset($_POST['bejelentkezes_submit'])) { 
		$errors_bej = array();
		$true = true;
		if(empty($_POST['username'])) { 
			$true=false;
			array_push($errors_bej,"A felhasználónév üres!");
		}
		if(empty($_POST['passwd'])) { 
			$true=false;
			array_push($errors_bej,"A jelszó üres üres!");
		}
		if($true) { 
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$password = mysqli_real_escape_string($db,$_POST['passwd']);
			$password= md5($password);
			
			$sql = "SELECT * FROM felhasznalok WHERE felhasznalonev='$username' AND jelszo='$password'";
			$query=$db->query($sql);
			if(mysqli_num_rows($query) == 1) { 
				session_start();
				$_SESSION['username'] = $username;
				echo "<script> alert('Sikeres bejelentkezés!');window.location='sajatprofil.php' </script>";
			}
			else {
				
				array_push($errors_bej,"Hibás felhasználónév vagy jelszó!");
			}
		}
	
	}

$db->close();
?>
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
    <li><a href="bejelentkezes.php" style="color: rgb(230, 149, 92);">Bejelentkezés/Regisztráció</a></li>
    <li><a href="rangsor.php">Rangsor</a></li>
    <li><a href="szabalyok.php">Játékszabályok</a></li>
	<?php
    if(isset($_SESSION["username"])){ ?>
			<li><a href="felhasznalok.php">Felhasználók</a></li>
	<li> <a href="sajatprofil.php"> Profil </a> </li>
    <?php } ?>
	
  </ul>
  </div>
</nav>
</header>
<br>
<br>
<br>
	<main>
	<hr/>
	<h1> Bejelentkezés/Regisztráció </h1>
	<hr/>
	<h2> Bejelentkezés </h2>
  <form method="POST">
    <fieldset>
    <legend> Bejelentkezés</legend>
      <label for="felhasznalonev">Teljes név:</label>
      <input type="text" id="felhasznalonev" name="username" placeholder="Felhasználónév..." required /> <br/><br/>
      <label for="passwdl">Jelszó:</label>
      <input type="password" id="passwdl" name="passwd" placeholder="Jelszó..." required /> <br/><br/>
      <input type="submit" name="bejelentkezes_submit" value="Bejelentkezés"/>
    </fieldset>
  </form>
  <?php 
	if(!empty($errors_bej)) { 
		foreach($errors_bej as $key) { 
			echo $key."<br/>";
		
		}
	}
?>
  <br>
  <h2> Regisztráció </h2>
  <form method="POST">
    <fieldset>
      <legend>Regisztráció</legend>
      <label for="lastname">Vezetéknévnév:</label>
      <input type="text" id="lastname" name="lastname"/> <br/><br/>
	  <label for="firstname">Keresztnévnév:</label>
      <input type="text" id="firstname" name="firstname"/> <br/><br/>
      <label for="username">Felhasználó név:</label>
      <input type="text" id="username" name="username" placeholder="Karcsi123" /> <br/><br/>
      <label for="email">E-mail cím:</label>
      <input type="email" id="email" name="email"/> <br/><br/>
      <label for="passwd">Jelszó:</label>
      <input type="password" id="passwd" name="passwd"/> <br/><br/>
      <label for="passwd">Jelszó újra:</label>
      <input type="password" id="passwdagin" name="passwdagin"/> <br/><br/>
	  <input type="reset"/>
    </fieldset>

    A főboltod, ahol legtöbbet játszol:
    <select name="boltok">
      <option value="vác">Vác Remete</option>
      <option value="meta" selected>Metagames</option>
      <option value="sarkanytuz">Sárkánytűz</option>
      <option value="other">Más</option>
    </select>
    <br>

    <input type="submit" name="regisz_submit" value="Regisztráció"/>
  </form>  
    <?php 
	if(!empty($errors)) { 
		foreach($errors as $key) { 
			echo $key."<br/>";
		
		}
	}
?>
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
