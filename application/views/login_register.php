<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
</head>
<body>
<div id="container">
	<span><?= (isset($login_error)) ? $login_error['error'] : ''; ?></span>	
	<fieldset>
		<legend>Log In</legend>
		<form action="/login/login_process" method="post">
			<div>
				<label for="log_email">Email:</label>
				<input type="text" name="log_email" value="<?= (isset($login_error) && isset($login_error['email'])) ? $login_error['email'] : ''?>">
			</div>

			<div>
				<label for="log_password">Password:</label>
				<input type="password" name="log_password">
			</div>
			<input type="submit" value="Login">
		</form>
	</fieldset>

	<span><?= (isset($register_error)) ? $register_error['error'] : ''; ?></span>	
	<fieldset>
		<legend>Or Register</legend>
		<form action="/login/register_process" method="post">
			<div>
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" value="<?= (isset($register_error) && isset($register_error['firstname'])) ? $register_error['firstname'] : ''?>">

			</div>

			<div>
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" value="<?= (isset($register_error) && isset($register_error['lastname'])) ? $register_error['lastname'] : ''?>">
			</div>

			<div>
				<label for="reg_email">Email:</label>
				<input type="text" name="reg_email" value="<?= (isset($register_error) && isset($register_error['email'])) ? $register_error['email'] : ''?>">
			</div>

			<div>
				<label for="reg_password">Password:</label>
				<input type="password" name="reg_password">
			</div>

			<div>
				<label for="cpassword">Confirm Password:</label>
				<input type="password" name="cpassword">
			</div>
			<input type="submit" value="Register">
		</form>
	</fieldset>
</div>
</body>
</html>