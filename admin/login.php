<?php include '../classess/Adminlogin.php';?>
<?php
$al = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$adminUser = $_POST['adminUser'];
	$adminPassword = md5($_POST['adminPassword']);

	$loginchk = $al->adminlogin($adminUser,$adminPassword);
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
<span style="color: red;font-size: 18px;">
	<?php
if (isset($loginchk)) {
	echo $loginchk;
}

	?>

</span>

			<div>
				<input type="text" placeholder="Username"  name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminPassword"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="forgotpassword.php">Forgot password</a>

			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">𝗢𝗳𝗳 𝗘𝘀𝘀𝗲𝗻𝘁𝗿𝗶𝘅 𝗖𝗹𝗼𝘁𝗵𝗶𝗻𝗴 𝗖𝗼. ADMIN LOGIN</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>