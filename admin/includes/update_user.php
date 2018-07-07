
<?php

if (isset($_GET['user_id'])) {
	$edit_user_id = $_GET['user_id'];
}

$query = "SELECT *  FROM  users WHERE user_id=$edit_user_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_phoneno = $row['user_phoneno'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}

if (isset($_POST['update-user'])) {
	
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];

	$image = $_FILES['image']['name'];
	$tmp_image = $_FILES['image']['tmp_name'];

	move_uploaded_file($tmp_image, "images/$image");
	

	$query = "UPDATE users SET user_firstname = '$user_firstname', user_lastname = '$user_lastname' , user_image='$image' WHERE user_id=$edit_user_id ";
	
	//echo $title . " " . $admin;
	
	$update_user_detail = mysqli_query($connection,$query);

	if (!$update_user_detail) {
		die("Query Failed" . mysqli_error($connection));
	}

}

?>

<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="admin">Firstname</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="category">Lastname</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="bus-image">User Image</label>
		<input type="file" name="image" >
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update-user" value="Update">
	</div>
</form>
