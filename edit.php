<?php
include('config.php');

$id = $_GET['id'];

if(isset($_POST['submit']))
{


	$id = $row['id'];
    $u_f_name = $row['farm_name'];
    $date_time = $row['date_time'];
    $metric_type = $row['metric_type'];
    $metric_value = $row['metric_value'];
    $location = $row['location'];
	

  	}

	$update = "UPDATE nooras_farm SET  u_f_name = '$farm_name', , date_time = '$date_time', metric_type = '$metric_type', metric_value = '$metric_value', WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:index.php');
	}else{
		echo "Data not update";
	}
}

?>