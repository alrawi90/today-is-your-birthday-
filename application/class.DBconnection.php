<?php

class DBconnection {


	var $host = null;
	var $username = null;
	var $password = null;
	var $database  = null;
  var $connection =null;
  
	function __construct( $info ) {
		
	   $this->host = $info["host"];
	   $this->username = $info["username"];
	   $this->password = $info["password"];
	   $this->database = $info["database"];
	   
	}

	function connect(){

		// $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		// Check connection
        // if (mysqli_connect_errno())
        // {
        //   echo "Failed to connect to MySQLi: " . mysqli_connect_error();
        // }else{
        // 	$this->connection->set_charset("utf8");//suport Arabic and Kurdish ...
        // 	echo "Connected to database ".$this->database.".";
        // }
        
        try {
             $this->connection = new mysqli($this->host, $this->username, $this->password);
             echo "Connected to database ".$this->database.".\n";
            } catch (\Exception $e) {
             echo $e->getMessage(), PHP_EOL;
             echo '\n';
          }
          
        if ($this->connection->select_db($this->database) === false) {
        	   
        	   if($this->connection->query(  "CREATE DATABASE ".$this->database)){
        	   	         //$sql = file_get_contents('./database/birthday.sql');
                       echo "created. \n";
                       //$this->connection->multi_query($sql);
        	   }else{
                 echo "Error creating database: ".mysqli_error($this->connection);
                 echo '\n';
        	   }

        }
        
        $this->connection->select_db($this->database);
        
        $this->connection->set_charset("utf8");//support Arabic and Kurdish ...
        
        return $this->connection;
	}
  
  function disconnect(){
  	$this->connection->close();
  	echo "connection closed. \n";
  }

}

?>



 