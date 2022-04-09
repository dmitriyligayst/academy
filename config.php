<?php

$config = mysqli_connect( 'localhost','root','root',"local" );

if ( mysqli_connect_errno() ) {
	echo "Connection error: " . mysqli_connect_error();
}
