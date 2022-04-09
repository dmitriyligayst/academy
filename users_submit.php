<?php
require( 'config.php' );
include( "auth.php" );

$status = "";
if ( isset( $_POST['new'] ) && $_POST['new'] == 1 ) {
	$register_date = date( "Y-m-d H:i:s" );
	$name          = $_REQUEST['name'];
	$email         = $_REQUEST['email'];
	$user          = $_SESSION["username"];
	$ins_query     = "insert into registration (`register_date`,`name`,`email`,`user`) values ('$register_date','$name','$email','$user')";
	$result        = mysqli_query( $config, $ins_query );
	if ( $result ) {
		header( "refresh:2;url=users.php" );
		$status = "<div class='registration-notice'>You are registered successfully.</div>";
	} else {
		header( "refresh:2;url=users_submit.php" );
		$status = "<div class='registration-notice error'>This mail already exists.</div>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stylemix Academy</title>
	<link rel="stylesheet" href="assets/css/admin.css" />
</head>
<body>
	<div class="wrapper">
		<div class="admin-bar">
			<div class="dashboard">
				<a href="dashboard.php">Dashboard</a>
			</div>
			<div class="user">
				<div class="user-info">Howdy, <?php echo $_SESSION['username']; ?></div>
				<div class="submenu">
					<div class="photo">
						<img src="" width="64" height="64" alt="<?php echo $_SESSION['username']; ?>" />
					</div>
					<ul>
						<li><a href="profile.php"><?php echo $_SESSION['username']; ?></a></li>
						<li><a href="profile.php">Edit Profile</a></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="admin-container">
			<div class="left-column">
				<ul class="navigation">
					<li><a href="#">Pages</a></li>
					<li><a href="#">Posts</a></li>
					<li><a href="#">Media</a></li>
					<li><a href="users.php">Users</a></li>
				</ul>
			</div>
			<div class="right-column">
				<?php echo $status; ?>
				<h2>Add New User</h2>
				<p style="margin-bottom: 20px;">Create a brand new user and add them to this site.</p>
				<form name="form" method="post" action="">
					<input type="hidden" name="new" value="1" />
					<table class="user-submit-table">
						<tr>
							<td><label for="username">Username (required)</label></td>
							<td><input type="text" name="name" id="username" required /></td>
						</tr>
						<tr>
							<td><label for="email">Email (required)</label></td>
							<td><input type="email" name="email" id="email" required /></td>
						</tr>
					</table>
					<input name="submit" type="submit" value="Submit" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
