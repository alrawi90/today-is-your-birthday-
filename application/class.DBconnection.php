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

		$this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		// Check connection
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQLi: " . mysqli_connect_error();
        }else{
        	$this->connection->set_charset("utf8");//suport Arabic and Kurdish ...
        	echo "Connected to database ".$this->database.".";
        }
        return $this->connection;
	}
  
  function disconnect(){
  	$this->connection->close();
  	echo "connection closed.";
  }

}

?>



