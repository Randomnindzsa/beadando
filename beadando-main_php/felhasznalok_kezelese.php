<?php
	session_start();
	$felhasznalonev=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Felhasználók kezelése</title>
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
	<li><a href="felhasznalok_kezelese.php" style="color: rgb(230, 149, 92);">Felhasználók kezelése</a></li>
	 <li> <a href="sajatprofil.php"> <?php echo $felhasznalonev; ?> </a> </li>
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
<h1> Felhasználók kezelése </h1>
<hr/>
<div id="tartalom">
<?php
	
    if (!isset($_SESSION["username"])) {
        header("Location: bejelentkezes.php");
    }
	
	$conn = new mysqli('127.0.0.1','root','','kartyajatek');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
	
	if(isset($_POST['modositas'])) { 
		$id = $_POST['felhasznalo_id'];
		$jog = mysqli_real_escape_string($conn,$_POST['jogok']);
		$sql_jogvaltozatas = "UPDATE felhasznalok SET jogosultsag='$jog' WHERE id='$id'";

			if ($conn->query($sql_jogvaltozatas) === TRUE) {
				echo "<script> alert('A felhasználó módosítása sikeres volt!');window.location='felhasznalok_kezelese.php'</script>";
			} else {
				echo "<script> alert('A felhasználó módosítása sikertelen volt!: " . $conn->error."!');window.location='felhasznalok_kezelese.php'</script>";
				}
	}
	
	$sql = "SELECT id,vezeteknev,keresztnev,felhasznalonev,email,bolt,pontok,jogosultsag FROM felhasznalok WHERE felhasznalonev!='$felhasznalonev'";
	$result = $conn->query($sql);

	$sql_adminisztrator = "SELECT id FROM felhasznalok WHERE felhasznalonev='$felhasznalonev' AND jogosultsag='admin'";
	$result_adminisztrator = $conn->query($sql_adminisztrator);
	
	if ($result_adminisztrator->num_rows > 0) {
		// output data of each row
		
		while($row = $result_adminisztrator->fetch_assoc()) {
				if ($result->num_rows > 0) {
					
					echo " <div style='overflow-x:auto;'>
				<form action='felhasznalok_kezelese.php' method='POST'>
				<table class='rangsor'>
				<tr> <td> id </td>  <td> Vezetéknév </td> <td> Keresztnév </td> <td> felhasználónév </td> <td> email </td> <td> jogosultsag </td> <td> Módosítás</td> </tr>";
				
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr> 
			<td>" .$row["id"]."</td> 
			<td>" .$row["vezeteknev"]."</td> 
			<td>" .$row["keresztnev"]."</td> 
			<td>" .$row["felhasznalonev"]."</td> 
			<td>" .$row["email"]."</td> 
			<td>" .$row["bolt"]."</td>
			<td>" .$row["pontok"]."</td>
			<td>
			
				<select name='jogok' id='jogok'>
				<option value='" .$row["jogosultsag"]."'> " .$row["jogosultsag"]." (jelenlegi)  </option>
				<option value='admin'> Adminisztrátor </option>
				<option value='vendég'> Vendég </option>
				</select>
			</td> 
			<td> 
			
				<input type='hidden' name='felhasznalo_id' value=".$row["id"]."/>
				<input type='submit' name='modositas' value='Módosítás' onclick='return figyelmezetetoablak()' />
			
			</td> 
			</tr>";
		}
		echo "</table> 
			</form>
			  </div>";
		} else {
			echo "0 találat";
						}
		}
	}
	else { 
		echo "Ön nem rendelkezik ezzel a jogosultsággal!";
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
