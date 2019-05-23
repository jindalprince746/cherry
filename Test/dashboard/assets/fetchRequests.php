<?php
include('../db.php');

if(isset($_POST['subject']) && isset($_POST['message'])){


  $subject = mysqli_real_escape_string($con,$_POST['subject']);
  $message = mysqli_real_escape_string($con,$_POST['message']);


  $query = "INSERT INTO `contact_us` (`userID`, `accessToken`, `subject`,`message`) VALUES ('$user_Token','$access_Token', '$subject', '$message');";
  $result = mysqli_query($con,$query);


}

$query = "SELECT * FROM `contact_us` WHERE `userID` = '$user_Token'";
$result = mysqli_query($con,$query);

$row = [];
if($result->num_rows > 0){

  while($row = $result->fetch_assoc()){

  $id = $row["id"];
  $userID = $row["userID"];
  $accessToken = $row["accessToken"];
  $date = Date('l d M Y h:i:s a',strtotime($row["date"]));
  $subject = $row["subject"];
  $message = $row["message"];
  $reply= $row["reply"];
  if($row["status"] == 0){
    $status = "Open";
  }
  else{
  $status = "Close";
  }


  $rowTemp[] = array(
                        "userID" => $userID,
                        "accessToken" =>$accessToken,
                        "date" => $date,
                        "subject" => $subject,
                        "message" => $message,
                        "reply" => $reply,
                        "status" => $status

  );


  }

  }




echo json_encode($rowTemp);


?>
