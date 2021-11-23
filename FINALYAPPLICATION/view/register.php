<?php include ('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Procedure ★</title>
    <link rel="stylesheet" href="../css/stylee.css">
</head>
<body>
<div class="header">
	<h2>Register ★</h2>
</div>
<form method="post" action="register.php">
<?php echo display_error(); ?>
	<div class="input-group">
		<label>Username ★</label>
		<input id="username" type="text" name="username" onclick="return myfun2()" value="<?php echo $username; ?>">
		<span id="us"></span> <br> </br>
	</div>
	<div class="input-group">
		<label>Email ★</label>
		<input id="email" type="email" name="email" onclick="return myfun1()" value="<?php echo $email; ?>">
		<span id="em"></span> <br> </br>
	</div>
	<div class="input-group">
		<label>Password ★</label>
		<input id="password" type="password" name="password_1" onclick="return myfun()">
		<span id="pw"></span> <br> </br>
	</div>
	<div class="input-group">
		<label>Confirm password ★</label>
		<input id="password" type="password" name="password_2">
		<span id="pw"></span> <br> </br>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
<style>
/* register style ekstra  */

#us {
  color: red;
}
#em {
  color: red;
}
#pw{
  color: red;
}
</style>
<script src="../js/main.js"></script>
</body>
</html>

