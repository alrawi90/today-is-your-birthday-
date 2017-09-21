<?
class DBconnection {


	var $host = null;
	var $username = null;
	var $password = null;
	var $database  = null;

	function __construct( $info ) {
	   $this->$host = $info["host"];
	   $this->$username = $info["username"];
	   $this->$password = $info["password"];
	   $this->$database = $info["database"];
	   
	}

	function connect(){
		$con = mysqli_connect($this->$host, $this->$username, $this->$password, $this->$database);
		// Check connection
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
        	return $con;
        }
	}


}

?>



