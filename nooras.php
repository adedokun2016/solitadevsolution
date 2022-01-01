<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// database connection
include('config.php');

$added = false;


//Add  new student code 

if(isset($_POST['submit'])){
    $u_card = $_POST['card_no'];
    $u_f_name = $_POST['user_first_name'];
    $u_gender = $_POST['user_gender'];
    $u_email = $_POST['user_email'];
    $u_phone = $_POST['user_phone'];
    $u_staff_id = $_POST['staff_id'];
    


    //image upload

    $msg = "";
    $image = $_FILES['image']['name'];
    $target = "upload_images/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

    $insert_data = "INSERT INTO nooras_farm(farm_name, date_time, metric_type, metric_value) VALUES('$farm_name','$date_time','$metric_type','$metric_value')";
    $run_data = mysqli_query($con,$insert_data);

    if($run_data){
          $added = true;
    }else{
        echo "Data not insert";
    }

}

?>







<!DOCTYPE html>
<html>
<head>
    <title>Solita Farms Dev Exercise</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
<a href="https://dev.solita.fi/2021/11/04/how-to-pre-assignments.html" target="_blank"><img src="https://www.meettheyoungsters.be/wp-content/companies/890/logo/logo_5f86c8385595d.jpeg" alt="" width="350px" ></a><br><hr>

<!-- adding alert notification  -->
<?php
    if($added){
        echo "
            <div class='btn-success' style='padding: 15px; text-align:center;'>
                Your Student Data has been Successfully Added.
            </div><br>
        ";
    }

?>





 <a href="logout.php" class="btn btn-success"><i class="fa fa-lock"></i> Logout</a>
  <a href="nooras.php" class="btn btn-success"><i class="fa fa-plus"></i> Nooras Farm</a>
  <a href="ossi.php" class="btn btn-success"><i class="fa fa-plus"></i> Ossi_Farm</a>
  <a href="friman.php" class="btn btn-success"><i class="fa fa-plus"></i> Friman Metsola Farm</a>
  <a href="partial.php" class="btn btn-success"><i class="fa fa-plus"></i> Partial Tech farm</a>
  <a href="export.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Data</a>
     <button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Add New Data
  </button>
  <hr>
        <table class="table table-bordered table-striped table-hover" id="myTable">
        <thead>
            <tr>
               <th class="text-center" scope="col">S.L</th>
                <th class="text-center" scope="col">Farm Name</th>
                <th class="text-center" scope="col">Datetime</th>
                <th class="text-center" scope="col">Metric value</th>
                <th class="text-center" scope="col">Metric Type</th>
                <th class="text-center" scope="col">View</th>
                <th class="text-center" scope="col">Edit</th>
                <th class="text-center" scope="col">Delete</th>
            </tr>
        </thead>
            <?php

            $get_data = "SELECT * FROM nooras_farm order by id desc";
            $run_data = mysqli_query($con,$get_data);
            $i = 0;
            while($row = mysqli_fetch_array($run_data))
            {
                $sl = ++$i;
                $id = $row['id'];
                $u_card = $row['date_time'];
                $u_f_name = $row['farm_name'];
                $u_l_name = $row['u_l_name'];
                $u_phone = $row['metric_type'];
                $u_staff_id = $row['metric_value'];

                echo "

                <tr>
                <td class='text-center'>$sl</td>
                <td class='text-left'>$u_f_name</td>
                <td class='text-left'>$u_card</td>
                <td class='text-left'>$u_phone</td>
                <td class='text-center'>$u_staff_id</td>
            
                <td class='text-center'>
                    <span>
                    <a href='#' class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Prfile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
                    </span>
                    
                </td>
                <td class='text-center'>
                    <span>
                    <a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>

                         
                        
                    </span>
                    
                </td>
                <td class='text-center'>
                    <span>
                    
                        <a href='#' class='btn btn-danger deleteuser' title='Delete'>
                             <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
                        </a>
                    </span>
                    
                </td>
            </tr>


                ";
            }

            ?>

            
            
        </table>
        <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export Data" />
    </form>
    </div>


    <!---Add in modal---->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><img src="https://www.meettheyoungsters.be/wp-content/companies/890/logo/logo_5f86c8385595d.jpeg" width="400px" height="150px" alt=""></center>
    
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
            
            <!-- This is test for New Card Activate Form  -->

<div class="form-row">
<div class="form-group">
<label for="inputState">Farm Name</label>
<select name="user_farm_name" class="form-control">
  <option selected>Choose...</option>
  <option value="Noora's farm">Noora's farm</option>
                                    <option value="PartialTech Research Farm">PartialTech Research Farm</option>
                                    <option value="Friman Metsola collective">Friman Metsola collective</option>
                                    <option value="Organic Ossi's Impact That Lasts plantase">Organic Ossi's Impact That Lasts plantase</option>                                    
</select>
</div>
<div class="form-group">
<label for="inputPassword4">Date</label>
<input type="Date" class="form-control" name="date_time" placeholder="Date">
</div>
</div>
<div class="form-group">
<label for="inputPassword4">Time</label>
<input type="time" class="form-control" name="date_time" placeholder="Time">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputState">Metric Type</label>
<select id="inputState" name="metric_type" class="form-control">
  <option selected>Choose...</option>
  <option>pH</option>
  <option>rainFall</option>
  <option>temperature</option>
</select>
</div>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Metric Value</label>
<input type="text" class="form-control" name="metric_value" placeholder="Enter Metric Value">
</div>
<div class="form-group col-md-6">
<label for="inputState">Location</label>
<select name="state" class="form-control">
  <option selected>Choose...</option>
  <option value="Noora's farm">Noora's farm</option>
                                    <option value="PartialTech Research Farm">PartialTech Research Farm</option>
                                    <option value="Friman Metsola collective">Friman Metsola collective</option>
                                    <option value="Organic Ossi's Impact That Lasts plantase">Organic Ossi's Impact That Lasts plantase</option>                                    
</select>
</div>



            


            <div class="form-group col-md-6">
                <label>Image</label>
                <input type="file" name="image" class="form-control" >
            </div>

            
             <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
            
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT * FROM nooras_farm";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
    $id = $row['id'];
    echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you want to sure??</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


    ";
    
}


?>


<!-- View modal  -->
<?php 

// <!-- profile modal start -->
$get_data = "SELECT * FROM nooras_farm";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{

    $id = $row['id'];
    $name = $row['farm_name'];
    $datetime = $row['date_time'];
    $metric_type = $row['metric_type'];
    $metric_value = $row['metric_value'];
    $time = $row['uploaded'];
    
    
    echo "

        <div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Farm Profile<i class='fa fa-user-circle-o' aria-hidden='true'></i></h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
            <div class='container' id='profile'> 
                <div class='row'>
                    
                    <div class='col-sm-3 col-md-6'>
                        <h3 class='text-primary'>$name</h3>
                        <p class='text-secondary'>
                        <strong>Datetime:</strong> $datetime<br>
                        <strong>Metric Type :</strong>$metric_type<br>
                        <strong>Metric Value:</strong> $metric_value<br>
                    
                        
                        <i class='fa fa-home' aria-hidden='true'> Location : </i> $location
                        <br />
                        </p>
                        <!-- Split button -->
                    </div>
                </div>

            </div>   
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
            </div>
            </form>
            </div>
        </div>
        </div> 


    ";
}


// <!-- profile modal end -->


?>





<!----edit Data--->

<?php

$get_data = "SELECT * FROM nooras_farm";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
    $id = $row['id'];
    $name = $row['farm_name'];
    $datetime = $row['date_time'];
    $metrictype = $row['metric_type'];
    $metricvalue = $row['metric_value'];
    $location = $row['location'];
    $time = $row['uploaded'];
    echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit your Data</h4> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>


        <div class='form-group'>
        <label for='inputState'>Farm Name</label>
        <select name='user_farm_name' class='form-control'>
          <option>$name</option>
          <option value='Noora's farm'>Noora's farm</option>
                                            <option value='PartialTech Research Farm'>APartialTech Research Farm</option>
                                            <option value='Friman Metsola collective'>Friman Metsola collective</option>
                                            <option value='Organic Ossi's Impact That Lasts plantase'>Organic Ossi's Impact That Lasts plantase</option>
        </select>
        </div>
        <div class='form-row'>
        <div class='form-group'>
        <label for='inputPassword4'>Date</label>
        <input type='Date' class='form-control' name='date_time' placeholder='Date' value='$date' required>
        </div>
        </div>
        <div class='form-group'>
        <label for='inputPassword4'>Time</label>
        <input type='time' class='form-control' name='date_time' placeholder='Time' value='$time' required>
        </div>
        </div>
        <div class='form-row'>
        <div class='form-group col-md-6'>
        <label for='inputState'>Metric Type</label>
        <select id='inputState' name='metric_value' class='form-control' value='$metrictype' required>
          <option selected>$metrictype</option>
          <option>pH</option>
          <option>rainFall</option>
          <option>temperature</option>
        </select>
        </div>

        <div class='form-group col-md-6'>
        <label for='inputPassword4'>Metric Value</label>
        <input type='text' class='form-control' name='metricvalue' maxlength='12' placeholder='Enter Metric Value' value='$metricvalue'>
        </div>
        </div>
        <div class='form-group col-md-6'>
        <label for='inputState'>Farm Location</label>
        <select name='u_location' class='form-control'>
          <option>$u_location</option>
          <option value='Noora's farm'>Noora's farm</option>
                                            <option value='PartialTech Research Farm'>APartialTech Research Farm</option>
                                            <option value='Friman Metsola collective'>Friman Metsola collective</option>
                                            <option value='Organic Ossi's Impact That Lasts plantase'>Organic Ossi's Impact That Lasts plantase</option>
        </select>
        </div>
            <div class='form-group col-md-6'>
                <label>Image</label>
                <input type='file' name='image' class='form-control'>
                <img src = 'upload_images/$image' style='width:50px; height:50px'>
            </div>

            
            
             <div class='modal-footer'>
             <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
             <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
         </div>


        </form>
      </div>

    </div>

  </div>
</div>


    ";
}


?>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</body>
</html>