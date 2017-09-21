<?php

class BirthdayChecker {

    var $DatabaseConnection = null;

    var $now   = null;

    const GET_USERS_WHOSE_BIRTHDAY_IS_TODAY = "SELECT customers.Full_Name, customers.Mobile_Number, languages.language,
        sms.content FROM customers 
        LEFT JOIN languages ON customers.Prefered_language = languages.id JOIN sms ON sms.language_id=languages.id
        WHERE DATE_FORMAT(customers.Date_of_Birth,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')";


    const INSERT_LOG= "INSERT INTO logs (date, Mobile_Number, SMS_Content) VALUES ('%s','%s','%s')";

	function __construct( $connection ) {

	   $this->DatabaseConnection = $connection;
	   
	   $this->now=  date("Y-m-d H:i:s");

	  
	}

	function checkBirthday(){
        
		$result = $this->DatabaseConnection->query(self::GET_USERS_WHOSE_BIRTHDAY_IS_TODAY);
        if(!$result){
            'Invalid query: ' . $conn->error;
        }else{
	        if ( $result->num_rows > 0) {
	            echo $result->num_rows." results found! \n";
	            return $result;
	        	

	        } else {

	            echo "0 results \n";
	        }
     }
        return null;
	}

	function send_SMS($customers){

        while($customer=$customers->fetch_assoc()) {   
            $name = $customer['Full_Name'];
            $number = $customer['Mobile_Number'];
            $sms = $customer['content'];
            if( mail( $number.'@domain.com', '', $sms ) ){  
            
            // this will be done only if we know the real domain addrress of the mobile company
            
                    echo $name.' '.$number.'... '.$sms.'  has been sent successfully.';
            
                    $this->log( array("date" => $this->now, "mobile_number" => $number, "sms" => $sms));// insert log
                
            }

        } 
      
	}


	function log($log){
		if ($this->DatabaseConnection->query(sprintf(self::INSERT_LOG,$log['date'],$log['mobile_number'],$log['sms']) )=== TRUE) {
          echo "\n log inserted successfully \n";
        } else {
           echo "Error: ". $this->DatabaseConnection->error;
           echo '\n';
        }
     
     
     
	}



}





?>