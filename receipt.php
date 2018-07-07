<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container" style="width: 50%;">
                
      <h2>Account Deatils:</h2>
      <table class="table table-striped" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Photo:</b> </td>
                  <td><img src="admin/images/<?php echo $_SESSION['s_image']; ?>" width=50></td>
                </tr>
                <tr>
                  <td><b>UserID:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_id']); ?></td>
                </tr>
                <tr>
                  <td><b>Account Holder's Name:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_username']); ?></td>
                </tr>
                <tr>
                  <td><b>FirstName:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_firstname']); ?></td>
                </tr>
                <tr>
                  <td><b>LastName:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_lastname']); ?></td>
                </tr>

                <br>
              </tbody>
            </table>
<br>

      <?php
        if (isset($_GET['orderid'])) {
          $input_order_id = $_GET['orderid'];
          //echo $input_order_id;
        }

        $query = "SELECT * FROM orders WHERE order_id=$input_order_id";

        $select_order = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($select_order)) {
            $passenger = $row['user_name'];
            $passenger_age = $row['user_age'];
            $source = $row['source'];
            $destination = $row['destination'];
            $dob = $row['date'];
            $cost = $row['cost'];
            $orderid = $row['order_id'];
            $travel_bus_id = $row['bus_id'];

            ?>

            <h2>Passenger Details:-</h2>

            <table class="table table-striped" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Passenger Name:</b> </td>
                  <td><?php echo $passenger; ?></td>
                </tr>
                <tr>
                  <td><b>Passenger Age:</b> </td>
                  <td><?php echo $passenger_age; ?></td>
                </tr>
                <tr>
                  <td><b>Source: </b></td>
                  <td><?php echo ucfirst($source); ?></td>
                </tr>
                <tr>
                  <td><b>Destination: </b></td>
                  <td><?php echo ucfirst($destination); ?></td>
                </tr>
                <tr>
                  <td><b>Date Of Booking: </b></td>
                  <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                  <td><b>Cost: </b></td>
                  <td><?php echo $cost; ?></td>
                </tr>
                <br>
              </tbody>
            </table>

          <?php } ?>


          <?php 

              $query = "SELECT *  FROM  posts WHERE post_id=$travel_bus_id";
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
                  $bus_stations = split(" ",$intermediate_station);
                  $bus_times = split(" ",$time);
              

           ?>
           <br>
           <h2>Bus Details:</h2>
           <table class="table table-striped" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Bus Id:</b> </td>
                  <td><?php echo $bus_id; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Source:</b> </td>
                  <td><?php echo $source; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Destination: </b></td>
                  <td><?php echo ucfirst($destination); ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Date: </b></td>
                  <td><?php echo $date; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Time:</b></td>
                  <td></td>
                </tr>

                <?php

                    for ($i=0; $i < sizeof($bus_stations); $i++) { ?>
                        <tr>
                          <td></td>
                          <td><?php echo $bus_stations[$i]; ?></td>
                          <td><?php echo $bus_times[$i]; ?></td>
                        </tr> <?php 
                    }

                ?>

                
                <br>
              </tbody>
            </table>
          <?php } ?>
                              

    </div>
        <hr>


    <script>
    function openCity(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

<?php include "includes/footer.php"; ?> 