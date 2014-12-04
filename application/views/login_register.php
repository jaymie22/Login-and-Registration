<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
</head>
<body>
<div id="container">
<?php 
		if(function_exists('form_error'))
		{	?>
			<p><?= form_error('log_email') ?></p>
			<p><?= form_error('log_password') ?></p>
<?php
		}
?>
	<p><?= ($this->session->flashdata("login_error")) ? $this->session->flashdata("login_error") : "" ?></p>

	<fieldset>
		<legend>Log In</legend>
		<form action="/login/login_process" method="post">
			<div>
				<label for="log_email">Email:</label>
				<input type="email" name="log_email" value="<?= (function_exists('set_value')) ? set_value('log_email') : ""; ?>">
			</div>

			<div>
				<label for="log_password">Password:</label>
				<input type="password" name="log_password">
			</div>
			<input type="submit" value="Login">
		</form>
	</fieldset>

<?php 
		if(function_exists('form_error'))
		{
?>
			<p><?= form_error('first_name') ?></p>
			<p><?= form_error('last_name') ?></p>
			<p><?= form_error('reg_email') ?></p>
			<p><?= form_error('reg_password') ?></p>
			<p><?= form_error('cpassword') ?></p>
<?php
		}
?>
	<p><?= ($this->session->flashdata("insert_status")) ? $this->session->flashdata("insert_status") : "" ?></p>

	<fieldset>
		<legend>Or Register</legend>
		<form action="/login/register_process" method="post">
			<div>
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" value="<?= (function_exists('set_value')) ? set_value('first_name') : ""; ?>">

			</div>

			<div>
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" value="<?= (function_exists('set_value')) ? set_value('last_name') : ""; ?>">
			</div>

			<div>
				<label for="reg_email">Email:</label>
				<input type="email" name="reg_email" value="<?= (function_exists('set_value')) ? set_value('reg_email') : ""; ?>">
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