<?

class BirthdayChecker {

    var $DatabaseConnection = null;
    var $today = date("m.d");

    const GET_USERS_WHOSE_BIRTHDAY_IS_TODAY = "SELECT customers.Full_Name, customers.Mobile_Number, languages.language,
        sms.content FROM customers 
        LEFT JOIN languages ON customers.Prefered_language = languages.id JOIN congrats ON sms.language_id=languages.id
        WHERE customers.Date_of_Birth LIKE '%$today%'";//"SELECT * FROM `customers` WHERE Date_of_Birth = '$today'";

    

	function __construct( $connection ) {

	   $this->DatabaseConnection = $connection;
	   
	}

	function checkBirthday(){
        
		$result = $this->$DatabaseConnection->query(GET_USERS_WHOSE_BIRTHDAY_IS_TODAY);

        if ($result->num_rows > 0) {
            
            foreach ($customers as $customer) {   
	            $name = $customer['Full_Name'];
	            $number = $customer['Mobile_Number'];
	            $sms = $customer['content'];
	            //echo 'Todays is'.$name.' '.$surename.' birthday'; 
        	}
            // output data of each row
            // while($row = $result->fetch_assoc()) {
            //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            //     }
        } else {

            echo "0 results";
        }

	}

	function sendCongratsSMS($customers){

        foreach ($customers as $customer) {   
            $name = $customer['Full_Name'];
            $number = $customer['Mobile_Number'];
            $number = $customer['Mobile_Number'];
            echo 'Todays is'.$name.' '.$surename.' birthday';                 
        } 
      
	}


	function log($logs){


	}



}





?>