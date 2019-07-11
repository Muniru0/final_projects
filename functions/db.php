<?php 

session_start();
class db
{
	public static function db_connect()
	{

    $hostname="localhost";
	$username="raymond";
    $db_name = "raymonds_project";  
    $password="raymond";

    $con= mysqli_connect($hostname,$username,$password,$db_name) or die(mysqli_err());

    return $con;

    }

    public function db_select()
    {

    $database="cinema_choodu";

    $con1=mysql_select_db($database) or die(mysql_errno());

    return $con1;

    }
    
    public static function after_successful_log(){
        $_SESSION["login"] = "true";
        
    }

    public function db_close()
    {

    mysql_close();

    }
}

?>