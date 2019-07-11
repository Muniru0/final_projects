
<?php
require_once("db.php");

$db = db::db_connect();
 $firstname = "";
 $lastname = "";
 $email   = "";
 $password  = "";
 $confirm_password = "";
 $mobile_number = "";

 
function signup_user($table_name = ""){

	if(trim($table_name) == ""){
$_SESSION["message"] = "Please contact the admin immediately";
return false;
    }
    
global $db;
          
// if(!is_int($_POST["mobile"])){
//     $_SESSION["message"] = "Please the mobile number should only be numbers ";
// }

if(strlen(trim($_POST["mobile"])) != 10 ){
    $_SESSION["message"] = "Please invalid mobile number";
  return false;
       
   }

	    $firstname = $db->real_escape_string(trim($_POST["firstname"]));
		$lastname  = $db->real_escape_string(trim($_POST["lastname"]));
		$email = $db->real_escape_string(trim($_POST["email"]));
		$password = $db->real_escape_string(trim($_POST["password"]));
		$confirm_password = $db->real_escape_string(trim($_POST["confirm_password"]));
        $mobile_number    = $db->real_escape_string(trim($_POST["mobile"]));
  
		if(($password !== $confirm_password) || $password == "" || $confirm_password == ""){
            $_SESSION["message"] =  "Please passwords have to be the same and not empty";
			return false;
		}

		if($email == "" ||  $mobile_number == "" ||  $firstname == "" ||  $lastname == "" ){
            $_SESSION["message"] = "Please fill in all the required fields";
return false ;
		}
  $password = password_hash($password,PASSWORD_ARGON2I);

	$query = "INSERT INTO {$table_name} VALUES(NULL,'{$firstname}','{$lastname}','{$email}','{$password}',{$mobile_number})";

	$results = $db->query($query);

	  if(trim($db->error) != ""){
			
            $_SESSION["message"] =  " Sorry there is a serious internal error, please come back later or contact the Admin";
return false;
        }
        
        
	if($db->insert_id > 0){
	return true;
	}


}//signup_user();
function login_user($table_name = ""){

	if(trim($table_name) == ""){
$_SESSION["message"] = "Please contact the admin immediately";
return false;
    }
    
global $db;
          
// if(!is_int($_POST["mobile"])){
//     $_SESSION["message"] = "Please the mobile number should only be numbers ";
// }


	    
		$email = $db->real_escape_string(trim($_POST["login_email"]));
		$password = $db->real_escape_string(trim($_POST["login_password"]));
	
  
		if( $password == "" || $email == ""  ){
            $_SESSION["message"] = "Please fill in all the required fields";
			return false;
		}

	
  

	$query = "SELECT * FROM {$table_name} WHERE email='{$email}'";

	$results = $db->query($query);

	  if(trim($db->error) != ""){
			
            $_SESSION["message"] =  "$query Sorry there is a serious internal error, please come back later or contact the Admin";
return false;
        }
        
        
	if($results->num_rows == 1){
         
          if($row = $results->fetch_assoc()){
           if(password_verify($password,$row['password'])){
            foreach($row AS $column =>$value){
                $_SESSION[$column] = $value;
                     }
                     return true;
            }else{
				$_SESSION["message"] = "Username and password mismatch";
				return false;
			}
         
          }

	}else{
		$_SESSION["message"] = "Username and password mismatch";
        return false;
    }


}//signup_user();


function get_seats_info(){


global $db;

$query = "SELECT * FROM seats";

$results = $db->query($query);

$seats = "";
$_SESSION["rows"] = "";
while($row = $results->fetch_assoc()){
	$unavailable_seat = "	<li><a href=\"#\"><img id='".$row["id"]."'  src=\"images/seat2.jpg\"></a></li>";

	$available_seat = "<li><a href=\"#\"><img id='".$row["id"]."' onclick=\"changeImg(this, 'images/buttonA_off.jpg')\" src=\"images/buttonA_off.jpg\"></a></li>";

	$your_reserved_seats = "<li><a href=\"#\"><img id='".$row["id"]."' onclick=\"changeImg(this, 'images/buttonA_on.jpg')\" src=\"images/buttonA_on.jpg\"></a></li>";
      if(trim($row["login_status"]) == trim($_SESSION["login_status"])){
		$_SESSION["rows"] .= $row["id"];
	  }
   
   //if you are the one who reserved the seat
	if(isset($_SESSION["id"]) && (trim($row["reserver_id"]) == $_SESSION["id"]) && (trim($row["login_status"]) == trim($_SESSION["login_status"]))){
	 	
	 $seats .= $your_reserved_seats;

	 // if you are not the one who reserved the seat but someone else
	}elseif(isset($_SESSION["id"]) && $_SESSION["login_status"] != $row["login_status"]  && $row["reserver_id"] > 0){
		$seats .= $unavailable_seat;
		
	// no one has reserved this seat, it is open to reservation.
	}elseif(isset($_SESSION["id"]) && $_SESSION["login_status"] != $row["login_status"]  && $row["reserver_id"] < 1){
		

		$seats .= $available_seat;
	}



}

echo $seats;
}//get_seats_info();













































































function redirect_to($destination = ""){
	header("Location: {$destination}/");
	exit();
}
?>