<?

class DBconnection {


	var $host = null;
	var $username = null;
	var $password = null;
	var $database  = null;
  var $connection =null;
	function __construct( $info ) {
	   $this->$host = $info["host"];
	   $this->$username = $info["username"];
	   $this->$password = $info["password"];
	   $this->$database = $info["database"];
	   
	}

	function connect(){
		$this->$connection = mysqli_connect($this->$host, $this->$username, $this->$password, $this->$database);
		// Check connection
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
        	echo "Connected to database ".$database."."
        }
        return $this->$connection;
	}
  
  function disconnect(){
  	$this->$connection->close();
  	echo "connection closed."
  }

}

?>



