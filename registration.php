<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stylemix Academy</title>
	<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

<?php
require( 'config.php' );

if ( isset( $_REQUEST['username'] ) ) {
	$username = mysqli_real_escape_string( $config, stripslashes( $_REQUEST['username'] ) ); //Экранирует специальные символы в строке, используемой в SQL-запросе, принмимая во внимание кодировку соединения
	$email    = mysqli_real_escape_string( $config, stripslashes( $_REQUEST['email'] ) );
	$password = mysqli_real_escape_string( $config, stripslashes( $_REQUEST['password'] ) );

	$register_date = date( "Y-m-d H:i:s" );
	$query    = "INSERT into `users` (username, password, email, register_date) VALUES ('$username', '" . md5( $password ) . "', '$email', '$register_date')";
	$result   = mysqli_query( $config, $query );
	if ( $result ) {
		header( "refresh:2;url=login.php" );
		echo "<div class='registration-notice'>You are registered successfully.</div>";
	} else {
		header( "refresh:2;url=registration.php" );
		echo "<div class='registration-notice error'>This mail already exists.</div>";
	}
} else {
	?>
	<div class="wrapper">
		<div class="registration-form">
			<form name="registration" action="" method="post">
				<label>
					<span>Username</span>
					<input type="text" name="username" required />
				</label>
				<label>
					<span>Email</span>
					<input type="email" name="email" required />
				</label>
				<label>
					<span>Password</span>
					<input type="password" name="password" required />
				</label>
				<input type="submit" name="submit" value="Register" />
			</form>
		</div>
	</div>
<?php } ?>

</body>
</html>
