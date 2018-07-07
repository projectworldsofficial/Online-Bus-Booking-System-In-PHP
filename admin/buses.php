<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcone To Admin
                            <small>Author</small>
                        </h1>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_bus':
                                include "includes/add_bus.php";
                                break;
                            
                            case 'update':
                                include "includes/update.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Bus_Id</th>
                                        <th>Admin_Name</th>
                                        <th>Source and Destination</th>
                                        <th>Intermediate Stations</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  posts";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $bus_id = $row['post_id'];
                                            $admin_name = $row['post_author'];
                                            $source = $row['post_source'];
                                            $destination = $row['post_destination'];
                                            $intermediate_station = $row['post_via'];
                                            $category = $row['post_category_id'];
                                            $image = $row['post_image'];
                                            $date = $row['post_date'];
                                            $time = $row['post_via_time'];
                                        
                                        if ($date > date('Y-m-d')) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $bus_id ?></td>
                                        <td><?php echo $admin_name ?></td>
                                        <td><?php echo $source . " To ". $destination?></td>
                                        <td><?php echo $intermediate_station ?></td>
                                        <td><?php echo $category ?></td>
                                        <td><img width="100" src="../images/<?php echo $image ?>"></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $time ?></td>
                                        <?php echo "<td><a href='buses.php?delete=$bus_id'>Delete</a></td>"; ?>
                                        <?php echo "<td><a href='buses.php?source=update&bus_id=$bus_id'>Update</a></td>"; ?>
                                        <?php echo "<td><a href='buses.php?clone_bus_id=$bus_id'>Clone</a></td>"; ?>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                                </table><?php
                                break;
                        }
                        // if ($source = 'add_bus') {
                        //        include "includes/add_bus.php";   
                        // }
                        // elseif ($source = '') {
                        //     
                        // }   
                        ?>


                        <?php

                        if (isset($_GET['clone_bus_id'])) {
                            $bus_id = $_GET['clone_bus_id'];


                        $query = "SELECT *  FROM  posts WHERE post_id=$bus_id";
                        $select_posts = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_posts)) {
                            $admin_name = $row['post_author'];
                            $title = $row['post_title'];
                            $bus_detail = $row['post_content'];
                            $source = $row['post_source'];
                            $destination = $row['post_destination'];
                            $intermediate = $row['post_via'];
                            $category = $row['post_category_id'];
                            $image = $row['post_image'];
                            $date = $row['post_date'];
                            $via_time = $row['post_via_time'];
                            $max_seats = $row['max_seats'];
                            $available_seats = $row['available_seats'];

                            $query_new = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_source, post_destination, post_via, post_via_time, max_seats, available_seats) VALUES({$category}, '{$title}', '{$admin_name}', '{$date}', '{$image}', '{$bus_detail}', '{$source}', '{$destination}', '{$intermediate}', '{$via_time}', $max_seats, $available_seats)";
                            }

                            $clone_bus = mysqli_query($connection,$query_new);

                            header("Location:buses.php");
                        }
                        ?>



                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $bus_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM posts WHERE post_id = {$bus_idd} ";

                            $delete_bus = mysqli_query($connection,$query);
                            if(!$delete_bus) {
                                die("Query Failed" . mysqli_error($delete_bus));
                            }
                            header("Location: buses.php");
                        }

                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>