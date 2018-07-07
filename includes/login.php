<?php include "db.php"; ob_start(); ?>
<?php session_start(); ?>
<?php 

if (isset($_POST['login']) || isset($_POST['register'])) {
	//echo "hello";
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username = '$username'";
	$select_user = mysqli_query($connection,$query);

	if (!$select_user) {
		die("Query Failed" . mysqli_error($connection));
	}

	while ($row = mysqli_fetch_assoc($select_user)) {
		$db_user_id = $row['user_id'];
		$db_username = $row['username'];
		$db_user_password = $row['user_password'];
		$db_user_firstname = $row['user_firstname'];
		$db_user_lastname = $row['user_lastname'];
		$db_user_role = $row['user_role'];
		$db_user_image = $row['user_image'];

		if($username === $db_username && $password === $db_user_password) {

			$_SESSION['s_username'] = $db_username;
			$_SESSION['s_firstname'] = $db_user_firstname;
			$_SESSION['s_lastname'] = $db_user_lastname;
			$_SESSION['s_role'] = $db_user_role;
			$_SESSION['s_image'] = $db_user_image;
			$_SESSION['s_id'] = $db_user_id;

			if ($db_user_role == 'admin') {
				header("Location: ../admin");
				exit;			
			}
			else if ($db_user_role == 'subscriber') {
				header("Location: ../index.php");
				exit;			
			}
		}
		else {
			header("Location: ../index.php");
			exit;
		}
	}
}

?>