<?php
require( 'config.php' );
include( "auth.php" );

$id     = $_REQUEST['id'];
$query  = "SELECT * from registration where id='" . $id . "'";
$result = mysqli_query( $config, $query ) or die ( mysqli_error() );
$row    = mysqli_fetch_assoc( $result );
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
						<li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
						<li><a href="#">Edit Profile</a></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="admin-container">
			<div class="left-column">
				<ul class="navigation">
					<li><a href="#">Pemails</a></li>
					<li><a href="#">Posts</a></li>
					<li><a href="#">Media</a></li>
					<li><a href="users.php">Users</a></li>
				</ul>
			</div>
			<div class="right-column">
				<?php
				$status = "";
				if ( isset( $_POST['new'] ) && $_POST['new'] == 1 ) {
					$id            = $_REQUEST['id'];
					$register_date = date( "Y-m-d H:i:s" );
					$name          = $_REQUEST['name'];
					$email         = $_REQUEST['email'];
					$user          = $_SESSION["username"];
					$update        = "update registration set register_date='" . $register_date . "', name='" . $name . "', email='" . $email . "', user='" . $user . "' where id='" . $id . "'";
					$result        = mysqli_query( $config, $update );
					if ( $result ) {
						header( "refresh:2;url=users.php" );
						$status = "<div class='registration-notice'>You are updated successfully.</div>";
					} else {
						header( "refresh:2;url=edit.php" );
						$status = "<div class='registration-notice error'>Your change is impossible.</div>";
					}
					echo $status;
				} else {
					?>
				<h2>Edit User</h2>
				<p style="margin-bottom: 20px;">Edit a brand new user and add them to this site.</p>
				<form name="form" method="post" action="">
					<input type="hidden" name="new" value="1" />
					<table class="user-submit-table">
						<tr>
							<td><label for="username">Username (required)</label></td>
							<td><input type="text" name="name" id="username" required value="<?php echo $row['name']; ?>" /></td>
						</tr>
						<tr>
							<td><label for="email">Email (required)</label></td>
							<td><input type="text" name="email" id="email" required value="<?php echo $row['email']; ?>" /></td>
						</tr>
					</table>
					<input name="submit" type="submit" value="Update" />
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>
