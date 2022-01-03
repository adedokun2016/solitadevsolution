<?php

include('config.php');
$id = $_GET['id'];
$delete = "DELETE FROM friman_metsola WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:index.php');
}else{
	echo "Donot Delete";
}


?>

<?php

include('config.php');
$id = $_GET['id'];
$delete = "DELETE FROM nooras_farm WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:index.php');
}else{
	echo "Donot Delete";
}


?>

<?php

include('config.php');
$id = $_GET['id'];
$delete = "DELETE FROM ossi_farm WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:index.php');
}else{
	echo "Donot Delete";
}


?>


<?php

include('config.php');
$id = $_GET['id'];
$delete = "DELETE FROM partialtech WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:index.php');
}else{
	echo "Donot Delete";
}


?>

