<?php

$connection = mysqli_connect("localhost",'root','','bus');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}

?>