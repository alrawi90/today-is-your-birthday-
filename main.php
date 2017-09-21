<?
  require './config.php';
  require 'class.BithdayChecker.php';
  require 'class.DBconnection.php';



  $info=   array("username" => $username, "password" => $password, "database" => $db);
  
  $connection=  new DBconnection($info);
  
  $birthdayChecker=  new BirthdayChecker($connection);
  echo "starting server ...."
  $output = $birthdayChecker->checkBirthday();
  
  if($output != null){
    $birthdayChecker->send_SMS($output);
  }else{
    echo "next check 24 hours later."  
  }



?>



