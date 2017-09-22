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

        
        try {
             $this->connection = new mysqli($this->host, $this->username, $this->password);
             echo "Connected to database ".$this->database.".\n";
            } catch (\Exception $e) {
             echo $e->getMessage(), PHP_EOL;
             echo '\n';
          }
          
        if ($this->connection->select_db($this->database) === false) { // if the database does not exist
        	   
        	   if($this->connection->query(  "CREATE DATABASE ".$this->database)){ // create database
        	   	       //$sql = file_get_contents('./database/birthday.sql');
                       echo "created. \n";
                       //$this->connection->multi_query($sql);
        	   }else{
                 echo "Error creating database: ".mysqli_error($this->connection);
                 echo '\n';
        	   }

        }
        
        $this->connection->select_db($this->database); // set the connectionto the current database
        
        $this->connection->set_charset("utf8");//support Arabic and Kurdish ...
        
        return $this->connection;
	}
  
  function disconnect(){
  	$this->connection->close();
  	echo "connection closed. \n";
  }

}

?>



 