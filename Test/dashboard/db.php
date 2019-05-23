<?php
$con = mysqli_connect('localhost','root','','useraccounts');

if ($con->connect_error) {
    die();
}
session_start();
$user_Token = $_SESSION['user_Token'];
$access_Token = $_SESSION['accessToken'];

validate_Session();
function validate_Session(){
  global $con,$user_Token,$access_Token;

  $query = "SELECT * FROM `logindetails` where ((`userID` = '$user_Token') AND (`accessToken` = '$access_Token')) AND ((`status` = 1) AND (`expireTime` > CURRENT_TIMESTAMP))";

  $result = mysqli_query($con,$query);
      if ($result->num_rows == 0) {

          die();
          }

}



?>
