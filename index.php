<!DOCTYPE HTML>
<?php
session_start();
?>
<html lang="lt">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MyPhoto.com</title>
	<link rel="stylesheet" href="files/style.css">
</head>

<body>
	<div class="page">
		<header>
			<div class="logo">
				<h1>M y P h o t o . c o m</h1>
			</div>
			<div class="login">
				<?php
				if ($_SESSION["name"]) {
				?>
					Hi <?php echo $_SESSION["name"]; ?>.<a href="?logout" tite="Logout">Logout.

					<?php
					if (isset($_GET['logout'])) {
						include('logout.php');
					}
				} else {
					$_SESSION["name"] = null;
					include('login.php');
					echo '<a href="?registracija">Register</a><br>';
				}
					?>
			</div>
		</header>
		<section>
			<nav>
				<a href="?naujienos">News</a><br>
				<a href="?apie_mus">About us</a><br>
				<a href="?vartotojai">Users</a><br>
				<a href="?nuotraukos">Photos</a><br>
			</nav>
			<article>
				<?php
				if (isset($_GET['naujienos'])) {
					include('files/naujienos.php');
				} elseif (isset($_GET['apie_mus'])) {
					include('files/apie.php');
				} elseif (isset($_GET['vartotojai'])) {
					include('files/vartotojai.php');
				} elseif (isset($_GET['nuotraukos'])) {
					include('files/nuotraukos.php');
				} elseif (isset($_GET['naujas'])) {
					include('files/naujas.php');
				} elseif (isset($_GET['registracija'])) {
					include('register.php');
				} else {
					include('files/naujienos.php');
				}
				?>
			</article>
		</section>
	</div>
	<footer>
		<p>2023&copy; Deividas Kvetkauskas</p>
		<footer>
</body>

</html>