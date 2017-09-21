<?php 
require("./config.php");
$config =new Config;
$conn = mysqli_connect($config->host, $config->dbUsername, $config->dbPassword);
$sql = "DROP DATABASE birthday";
if(mysqli_query($conn, $sql)){
echo "success";
}else {
            echo "Error deleting record: " . mysqli_error($conn);
         }
mysqli_close($conn);

?>