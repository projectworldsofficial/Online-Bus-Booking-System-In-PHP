
<?php

if (isset($_GET['bus_id'])) {
	$edit_bus_id = $_GET['bus_id'];
}

$query = "SELECT *  FROM  posts WHERE post_id=$edit_bus_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
    $bus_id = $row['post_id'];
    $admin_name = $row['post_author'];
    $source = $row['post_source'];
    $destination = $row['post_destination'];
    $intermediate_station = $row['post_via'];
    $category = $row['post_category_id'];
    $detail = $row['post_content'];
    $image = $row['post_image'];
    $date = $row['post_date'];
    $time = $row['post_via_time'];
}

if (isset($_POST['update-bus'])) {
	
	$admin = $_POST['admin'];
	$category = $_POST['category'];
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	$title = $source . " to " . $destination;
	$intermediate = $_POST['intermediate'];
	$date = $_POST['date'];
	$via_time = $_POST['via-time']; 
	$bus_detail = $_POST['bus-detail'];

	$query = "UPDATE posts SET post_title='{$title}', post_date='{$date}', post_source='{$source}', post_destination='{$destination}', post_author='{$admin}', post_category_id={$category}, post_via='{$intermediate}', post_via_time='{$via_time}', post_content='{$bus_detail}' WHERE post_id=$edit_bus_id ";
	
	//echo $title . " " . $admin;
	
	$update_bus = mysqli_query($connection,$query);

	if (!$update_bus) {
		die("Query Failed" . mysqli_error($connection));
	}

}

?>

<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="admin">Admin</label>
		<input value="<?php echo $admin_name; ?>" type="text" class="form-control" name="admin">
	</div>

	<div class="form-group">
		<select name="category">
			
			<?php 

			$query = "SELECT * FROM categories";
			$select_category = mysqli_query($connection,$query);

			if (!$select_category) {
				die("Query Failed" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($select_category)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
			
				echo "<option value='$cat_id'>$cat_title</option>";
			}

			?>

		</select>
	</div>

	<div class="form-group">
		<label for="source">Source Station</label>
		<input value="<?php echo $source; ?>" type="text" class="form-control" name="source">
	</div>

	<div class="form-group">
		<label for="destination">Destination Station</label>
		<input value="<?php echo $destination; ?>" type="text" class="form-control" name="destination">
	</div>

	<div class="form-group">
		<label for="bus-date">Bus Date</label>
		<input value="<?php echo $date ?>" type="date" style="margin-top: 10px;" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?> name="date" class="form-control" id="date" placeholder="<?php echo $date ?>" >
	</div>

	<div class="form-group">
		<label for="intermediate-station">Intermediate Stations</label>
		<input value="<?php echo $intermediate_station; ?>" type="text" class="form-control" name="intermediate">
	</div>
	
	<div class="form-group">
		<label for="via-time">Time at which bus reaches each station</label>
		<input value="<?php echo $time; ?>" type="text" class="form-control" name="via-time" placeholder="All times separated by space">
	</div>

	<div class="form-group">
		<img width="100" src="../images/<?php echo $image ?>">
	</div>

	<div class="form-group">
		<label for="bus-detail">Bus Detail</label>
		<textarea /*value="<?php echo $detail; ?>" class="form-control" name="bus-detail" cols="30" rows="10"><?php echo $detail; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update-bus" value="Update">
	</div>
</form>
