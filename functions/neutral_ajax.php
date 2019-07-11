<?php



require_once("../functions/functions.php");

if(isset($_POST["request_type"]) && trim($_POST["request_type"]) === "reserve_seat"){
  print_r($_SESSION);
    $query = "UPDATE seats SET reserver_id =".$_SESSION["id"].", login_status='".$_SESSION["login_status"]."', time=".time()." WHERE id=".$_POST["seat_id"];

   $results = $db->query($query);
   if(trim($db->error) != ""){
   
return;
   }



}elseif(isset($_POST["request_type"]) && trim($_POST["request_type"])=== "dereserve_seat"){
  
  $query = "UPDATE seats SET reserver_id = 0, login_status='' , time=0 WHERE    id=".$_POST["seat_id"]." && reserver_id=".$_SESSION["id"];
 echo $query;
   $results = $db->query($query);
   if(trim($db->error) != ""){
      echo $db->error;
return;
   }

}else{
   echo "lost";
}















?>