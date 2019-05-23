<?php
include('../db.php');



$query = "SELECT * FROM `result` WHERE `userID` = '$user_Token'";
$result = mysqli_query($con,$query);


if($result->num_rows > 0){

  while($row = $result->fetch_assoc()){
    $id = $row["id"];
    $query = "SELECT * FROM `resultdetails` WHERE `testID` = $id";
    $result1 = mysqli_query($con,$query);
    $rowtemp[$id] = $row;
    if($result1->num_rows > 0){

      while($row1 = $result1->fetch_assoc()){


        $rowtemp[$id]["details"][] = $row1;




      }

      }




  }

  }
echo json_encode($rowtemp);






?>
