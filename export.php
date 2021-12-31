<?php  
//export.php  
include 'config.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student_data order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Farm Name:</th>  
                         <th>Datetime</th>  
                         <th>Metric Type</th>
                         <th>Metric Value</th>  
                         

                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         
                         <td>'.$row["farm_name"].'</td>  
                         <td>'.$row["date_time"].'</td>  
                         <td>'.$row["metric_type"].'</td>  
                         <td>'.$row["metric_value"].'</td>  
                        
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Solita Farms Data.xls');
  echo $output;
 }
}
?>