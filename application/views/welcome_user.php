<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
</head>
<body>
	<div id="welcome_page">
		<h2>Welcome <span class="first_name"><?= $this->session->userdata('first_name') ?></span></h2>
		<a href="/login/logout">logoff</a>
		<fieldset>
			<legend>User Information</legend>
			<p>First Name: <span class="first_name"><?= $this->session->userdata('first_name') ?></span></p>
			<p>Last Name: <span class="last_name"><?= $this->session->userdata('last_name') ?></span></p>
			<p>Email Address: <?= $this->session->userdata('email') ?></p>
		</fieldset>
	</div>	
</body>
</html>