<?

class BirthdayChecker {

    var $DatabaseConnection = null;
    var $today = date("m.d");
    var $now   = $now=date('Y-m-d H:i:s');

    const GET_USERS_WHOSE_BIRTHDAY_IS_TODAY = "SELECT customers.Full_Name, customers.Mobile_Number, languages.language,
        sms.content FROM customers 
        LEFT JOIN languages ON customers.Prefered_language = languages.id JOIN sms ON sms.language_id=languages.id
        WHERE customers.Date_of_Birth LIKE '%$today%'";
        

    const INSERT_LOG= "INSERT INTO logs Date, Mobile_Number, SMS VALUES('?','?','?')";

	function __construct( $connection ) {

	   $this->DatabaseConnection = $connection;
	   
	}

	function checkBirthday(){
        
		$result = $this->$DatabaseConnection->query(GET_USERS_WHOSE_BIRTHDAY_IS_TODAY);

        if ($result->num_rows > 0) {
            echo $result->num_rows." results found!";
            return $result->fetch_assoc();
        	}

        } else {

            echo "0 results";
        }
        return null;
	}

	function send_SMS($customers){

        foreach ($customers as $customer) {   
            $name = $customer['Full_Name'];
            $number = $customer['Mobile_Number'];
            $sms = $customer['content'];
            echo $Full_Name.' '.$Mobile_Number.'... '.$sms.'  has been sent successfully.';
            $this->log( array("date" => $username, "mobile_number" => $number, "sms" => $sms))
        } 
      
	}


	function log($log){
     
     $this->$DatabaseConnection->query(INSERT_LOG,$;$log['date'],$log['mobile_number'],$log['sms']);
     
	}



}





?>