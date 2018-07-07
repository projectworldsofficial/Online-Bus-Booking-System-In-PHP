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
                            Welcome To Admin
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>
                        <br><br>
                        <h2>REPORT:</h2>
                        <br>
                        <?php

                        $curr_date = date('Y-m-d');
                        $query = "SELECT *  FROM  posts";
                        $bus_count_total = mysqli_query($connection,$query);
                        $total_buses_provided = mysqli_num_rows($bus_count_total);

                        $query = "SELECT *  FROM  posts WHERE post_date > '$curr_date'";
                        $bus_count = mysqli_query($connection,$query);
                        $total_buses = mysqli_num_rows($bus_count);

                        $query = "SELECT * FROM users WHERE user_role='admin'";
                        $get_admin = mysqli_query($connection,$query);
                        $total_admin = mysqli_num_rows($get_admin);

                        $query = "SELECT * FROM query";
                        $get_query = mysqli_query($connection,$query);
                        $total_queries = mysqli_num_rows($get_query);

                        $query = "SELECT * FROM users";
                        $get_users = mysqli_query($connection,$query);
                        $total_users = mysqli_num_rows($get_users);

                        $query = "SELECT * FROM orders";
                        $get_orders = mysqli_query($connection,$query);
                        $total_orders = mysqli_num_rows($get_orders);
                        ?>



                        <table class="table table-striped" style="width: 50%">
                          <tbody>
                            <tr>
                              <td><b>Total Users:</b> </td>
                              <td><?php echo $total_users; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Buses Provided:</b> </td>
                              <td><?php echo $total_buses_provided; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Upcoming Buses:</b> </td>
                              <td><?php echo $total_buses; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Admins: </b></td>
                              <td><?php echo $total_admin; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Queries: </b></td>
                              <td><?php echo $total_queries; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Booking: </b></td>
                              <td><?php echo $total_orders; ?></td>
                            </tr>
                          </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>