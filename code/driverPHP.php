<!DOCTYPE html>
<html lang="en">
<head>
	<title>CISC 332 Final Project | driverInfo </title>
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
		$rescueName = $_POST["rescueOrganization"];

		$dbh = new PDO('mysql:host=localhost;dbname=332project', "root", "");

		$result = $dbh->query("select FName,LName,emergencyPhone,licensePlate,licenseNum from driver where rescueName = '$rescueName'");

		$numRow = $result->fetchAll();

			if (empty($numRow)){
				echo "<h2> Sorry! There is no driver information in $rescueName.</h2>";
			}
			else{
				echo "<h2>Here is the information of all the drivers in $rescueName.</h2><br>";
				echo "<table>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Emergency Number</th>
							<th>License Plate</th>
							<th>License Number</th>
						</tr>";
				foreach($numRow as $row){
					echo "<tr>
							<td>".$row[0]."</td>
							<td>".$row[1]."</td>
							<td>".$row[2]."</td>
							<td>".$row[3]."</td>
							<td>".$row[4]."</td>
						</tr>";
				}	 
			}
			$dbh = null;
		?>
		</table>
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