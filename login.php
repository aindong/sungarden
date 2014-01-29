<?php @session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | Sun Garden Hotel Tarlac</title>
	<link rel="stylesheet" type="text/css" href="adm/theme/styles/login.css" />
</head>
<body>

	<?php
		require_once("conf/config.php");
		require_once("class/login.class.php");
		require_once("class/log.class.php");

		if(isset($_POST['login']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$login = Login::doLogin($username, $password);

			if($login == "success")
			{
				header("Location: admin.php");
				Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Logged-In Successfully");
			}
			
			$_SESSION['notif'] = $login;
		}
	?>

	<?php
		if(!empty($_SESSION['notif']))
		{
	?>
			<div class="error message">
				<h3><?php echo $_SESSION['notif']?></h3>
			</div>
	<?php
			unset($_SESSION['notif']);
		}
	?>

	

	<h2>Sun Garden Hotel Login</h2>

	<div id="login-box">
		<form action="" method="post">
			<fieldset>
				<p>
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required />
				</p>

				<p>
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required />
				</p>

				<p>
					<input type="submit" value="Login" name="login" class="button" />
					<input type="reset" value="Reset" class="button" />
				</p>
			</fieldset>
		</form>	
	</div>


</body>
</html>