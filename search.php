<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                if(isset($_POST['submit'])) {
                    $source = $_POST['source'];
                    $destination = $_POST['destination'];
                    $date = $_POST['date'];

                    if ($source=="" || $destination=="") {
                        echo "<h2>*Source And Destination Fields Are Mandatory To Fill</h2>";
                    }
                    else {


                    //echo $date;
                    $query = "SELECT * FROM posts WHERE post_via LIKE '%$source%$destination%' AND post_date='$date'";

                    $search_query = mysqli_query($connection,$query);

                    if(!$search_query) {
                        die("Query Failed" . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<h1>NO RESULT</h1>";
                    }
                    else { 

                        while($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_id = $row['post_id']
                            ?>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Bus on <?php echo $post_date; ?></p>
                            <hr>
                            <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                            <!-- <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""> -->
                            <hr>
                            <p><?php echo $post_content ?></p>
                            <a class="btn btn-primary" href="bus_info.php?bus_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                        <?php }  
                    }
                }
                }?>

     

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>