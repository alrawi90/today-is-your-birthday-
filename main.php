<?php
  require 'config.php';
  require 'application/class.BithdayChecker.php';
  require 'application/class.DBconnection.php';


  $config= new Config;
  $info=   array(
  	"host" => $config->host,
  	 "username" => $config->dbUsername ,
  	 "password" => $config->dbPassword,
    "database" => $config->db
   );
  
  $connection=  new DBconnection($info);
  $connection=$connection->connect();
  $birthdayChecker=  new BirthdayChecker($connection);

  echo "starting server ....";
  $output = $birthdayChecker->checkBirthday();
  
  if($output != null){
    $birthdayChecker->send_SMS($output);
  }else{
    echo "next check 24 hours later.";
  }



?>



