<?php include( "auth.php" ); ?>
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
					<li><a href="#">Pages</a></li>
					<li><a href="#">Posts</a></li>
					<li><a href="#">Media</a></li>
					<li><a href="users.php">Users</a></li>
				</ul>
			</div>
			<div class="right-column">
				<div class="welcome-panel-content">
					<div class="welcome-panel-header">
						<h2>Welcome to Dashboard!</h2>
						<p>
							<a href="#">Learn more about the 0.0.1 version.</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
