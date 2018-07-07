<?php 

	if (isset($_POST['insert-bus'])) {
		
		$admin = $_POST['admin'];
		$category = $_POST['category'];
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$title = $source . " to " . $destination;
		$intermediate = $_POST['intermediate'];
		$date = $_POST['date'];
		$via_time = $_POST['via-time'];
		$bus_detail = $_POST['bus-detail'];
		$max_seats = $_POST['max_seats'];

		$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];

		move_uploaded_file($tmp_image, "images/$image");

		if ($admin=="" || $category=="" || $source=="" || $destination=="" || $title=="" || $intermediate=="" || $date=="" || $via_time=="" || $bus_detail=="" || $max_seats=="") {
			echo "**All Fields Mandatory";
		}
		else {
			$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_source, post_destination, post_via, post_via_time, max_seats, available_seats) VALUES({$category}, '{$title}', '{$admin}', '{$date}', '{$image}', '{$bus_detail}', '{$source}', '{$destination}', '{$intermediate}', '{$via_time}', $max_seats, $max_seats)";

			$bus_entry = mysqli_query($connection,$query);

			if (!$bus_entry) {
				die("Query Failed");
			}
		}
	}

?>


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="admin">Admin</label>
		<input type="text" class="form-control" name="admin">
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
		<input type="text" class="form-control" name="source">
	</div>

	<div class="form-group">
		<label for="destination">Destination Station</label>
		<input type="text" class="form-control" name="destination">
	</div>

	<div class="form-group">
		<label for="bus-date">Bus Date</label>
		<input type="date" style="margin-top: 10px;" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?> name="date" class="form-control" id="date" placeholder="dd/mm/yyyy" >
	</div>

	<div class="form-group">
		<label for="intermediate-station">Intermediate Stations</label>
		<input type="text" class="form-control" name="intermediate">
	</div>
	
	<div class="form-group">
		<label for="via-time">Time at which bus reaches each station</label>
		<input type="text" class="form-control" name="via-time" placeholder="All times separated by space">
	</div>

	<div class="form-group">
		<label for="Max Seats">Max Seats</label>
		<input type="text" class="form-control" name="max_seats" placeholder="Max Seats Available">
	</div>

	<div class="form-group">
		<label for="bus-image">Bus Image</label>
		<input type="file" name="image" >
	</div>

	<div class="form-group">
		<label for="bus-detail">Bus Detail</label>
		<textarea class="form-control" name="bus-detail" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-bus" value="Add Bus">
	</div>
</form>





