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
                                        <th>Query_Id</th>
                                        <th>User_Name</th>
                                        <th>Query</th>
                                        <th>Email</th>
                                        <th>Replied?</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  query";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $query_id = $row['query_id'];
                                            $query_bus_id = $row['query_bus_id'];
                                            $query_user = $row['query_user'];
                                            $query_email = $row['query_email'];
                                            $query_date = $row['query_date'];
                                            $query_content = $row['query_content'];
                                            $query_replied = $row['query_replied'];
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $query_id ?></td>
                                        <td><?php echo $query_user ?></td>
                                        <td><?php echo $query_content ?></td>
                                        <td><?php echo $query_email ?></td>
                                        <td><?php echo $query_replied ?></td>
                                        <td><?php echo $query_date ?></td>
                                        <?php echo "<td><a href='query.php?delete=$query_id'>Delete</a></td>"; ?>
                                        <?php echo "<td><a href='../bus_info.php?bus_id=$query_bus_id'>Go To Bus Page</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
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

                        if (isset($_GET['delete'])) {
                            
                            $query_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM query WHERE query_id = {$query_idd} ";

                            $delete_query = mysqli_query($connection,$query);
                            header("Location : query.php");
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($connection));
                            }
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