<?php

include('config.php');

if(isset($_POST['submit'])){
	$farm_name = $_POST['user_farm_name'];
	$date_time = $_POST['user_date_time'];
	$metric_type = $_POST['user_metric_type'];
	$metric_value = $_POST['user_metric_value'];
	
	



  	$insert_data = "INSERT INTO friman_metsola(farm_name, date_time, metric_type, metric_value,uploaded) VALUES ('$farm_name','$date_time','$metric_type','$metric_value')";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
		  $added = true;
  	}else{
  		echo "Data not insert";
  	}

}

?>