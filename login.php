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
session_start();

if ( isset( $_POST['username'] ) ) {

	$username = mysqli_real_escape_string( $config, stripslashes( $_REQUEST['username'] ) ); //Экранирует специальные символы в строке, используемой в SQL-запросе, принмимая во внимание кодировку соединения Для Бахи
	$password = mysqli_real_escape_string( $config, stripslashes( $_REQUEST['password'] ) );

	$query = "SELECT * FROM `users` WHERE username='$username' and password='" . md5( $password ) . "'";
	$result = mysqli_query( $config, $query );
	$rows = mysqli_num_rows( $result );
	if ( $rows == 1 ) {
		$_SESSION['username'] = $username;
		header( "Location: index.php" );
	} else {
		header( "refresh:2;url=login.php" );
		echo "<div class='registration-notice error'>Username or password is incorrect.</div>";
	}
} else {
	?>
	<div class="wrapper">
		<div class="login-form">
			<form action="" method="post" name="login">
				<label>
					<span>Username</span>
					<input type="text" name="username" required />
				</label>
				<label>
					<span>Password</span>
					<input type="password" name="password" required />
				</label>
				<input name="submit" type="submit" value="Login" />
			</form>
			<p><a href='registration.php'>Registration</a></p>
		</div>
	</div>
<?php } ?>

</body>
</html>
