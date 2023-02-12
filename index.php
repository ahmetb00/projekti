<!DOCTYPE html>
<html>
    <head>
	    <title>LOGIN</title>
	    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    </head>
    <style>
		*{
			font-family: Poppins !important;
			font-weight: normal;
		}
		a:link {
			text-decoration: none;
		}
		a:hover {
			text-decoration: none;
		}
    </style>
    <body>
		<br>
		<form action="login.php" method="POST">

			<h2>Login</h2>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			


			<label><br>Username :</b></label><br>
			<input type="text" name="username" placeholder="Username"><br>

			<label><br>Password:</br></label>
			<input type="password" name="password" placeholder="Password"><br>

			<center><button type="submit">Login</button></center><br>
			<a href="register.php">Nuk keni llogari te hapur?</a>
		</form>
    </body>
</html>