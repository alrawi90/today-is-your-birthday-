<?php
  require 'config.php';
  require 'application/class.BithdayChecker.php';
  require 'application/class.DBconnection.php';


  $config= new Config; // read database configration and construct the needed connection object
  $info=   array(
  	 "host" => $config->host,
  	 "username" => $config->dbUsername ,
  	 "password" => $config->dbPassword,
     "database" => $config->db
   );
  
  $connection=  new DBconnection($info); // initialize the connection object
  //$connection=$connection->connect();    

  $birthdayChecker=  new BirthdayChecker($connection->connect()); //connect to the database & initialize the birthday checker object 
  
  $output = $birthdayChecker->checkBirthday(); // check if today is the birthday of one or more customers.
  
  if($output != null){
    $birthdayChecker->send_SMS($output);    // send sms 
  }else{
    echo "next check 24 hours later.";
  }
  $connection->disconnect();


?>



