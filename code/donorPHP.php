<!DOCTYPE html>
<html lang="en">

<head>
	<title>CISC 332 Final Project | Donor Info </title>
	<meta charset="utf-8"/>
	<meta name="author" content="Jiani Sun"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="css/style.css"> 	
</head>

<body>
	<div class="content">
	<div class="navbar">
		<div class="container">
			<div class="logo-div">
				<a href="Index.html"><img class="logo" src ="img/logo.png" alt="Animal Sweet Home" /></a>
			</div>
			<div class="navbar-link">
				<ul class="menu">
					<li><a id="index" href="Index.html">Home</a></li>
					<li><a id="donate" href="Donate.html">Donate</a></li>
					<li><a id="SPCA" href="SPCA.php">SPCA</a></li>
					<li><a id="rescue" href="RescueOrganization.php">Rescue Organization</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<main>
		<?php 
		$donorName = $_POST["donorName"];
		
		$dbh = new PDO('mysql:host=localhost;dbname=332project', "root", "");
			
		$total = $dbh->query("SELECT sum(Amount)
						FROM donation
						where Name='$donorName'
						group by Name");
		
		$numRow = $total->fetchAll();

		if (empty($numRow)){
			echo "<h2>Sorry! Donor $donorName does not have any record of donation.</h2>";
		}
		else{
		foreach($numRow as $row) {
				echo "<h2>Donor $donorName donated $".$row[0]." in total.</h2><br>";
			}
		echo "<p>These donations were donated to the following organizations:</p></br>";
		
		$rows = $dbh->query("SELECT DISTINCT localName
						FROM donation
						where Name='$donorName'");
				
		foreach($rows as $row) {
				echo "<p>".$row[0]."</p><br>";
		}}
			$dbh = null;
		?>
	</main>
	</div>
	
	<footer>
		<div class="address">
		218 Barrie St.<br/>
		Kingston, ON<br/>
		K7L 3K3
		</div>
		
		<ul class="ContactInfo">
			<li><a id="email" href="mailto:agriculture@queensu.ca" <i class="icon-envelope" </i>Email Us</a></li>
			<li><a id="phone" href="tel:613-555-5555" <i class="icon-phone-square" </i>613-555-5555</a></li>
		</ul>
	</footer>
	
</body>
</html>