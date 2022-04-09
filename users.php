<?php
require( 'config.php' );
include( "auth.php" );

$count  = 1;
$query  = "Select * from registration ORDER BY id;";
$result = mysqli_query( $config, $query );

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
				<div class="left-column">
					<ul class="navigation">
						<li><a href="#">Pages</a></li>
						<li><a href="#">Posts</a></li>
						<li><a href="#">Media</a></li>
						<li><a href="users.php">Users</a></li>
					</ul>
				</div>
			</div>
			<div class="right-column">
				<a href="users_submit.php" class="button">Add Users</a>
				<?php if( '0' < $result->num_rows ) : ?>
				<br />
				<br />
				<h2>Users</h2>
				<table class="users-info-table">
					<thead>
						<tr>
							<th><strong>Name</strong></th>
							<th><strong>Email</strong></th>
							<th><strong>Edit</strong></th>
							<th><strong>Delete</strong></th>
						</tr>
					</thead>
					<tbody>
					<?php while ( $row = mysqli_fetch_assoc( $result ) ) { ?>
						<tr>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["email"]; ?></td>
							<td>
								<a href="edit.php?id=<?php echo $row["id"]; ?>" class="edit-link">Edit</a>
							</td>
							<td align="center">
								<a href="delete.php?id=<?php echo $row["id"]; ?>" class="delete-link">Delete</a>
							</td>
						</tr>
						<?php $count ++;
					} ?>
					</tbody>
				</table>
				<?php endif;?>
			</div>
		</div>
	</div>
</body>
</html>
