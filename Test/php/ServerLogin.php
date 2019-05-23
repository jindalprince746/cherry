<?php
error_reporting(0);
$sucess = 0;
include('../../lib/browserOSDetector/index.php');
$browser = new Browser();
$os = new Os();
$device = new Device();
session_start();


$ip = $_SERVER['REMOTE_ADDR'];
$Browser = $browser->getName();
$OS = $os->getName();
$Device = $device->getName();
$token = md5(time()+$ip+microtime()+$Browser+$OS+mt_rand(1,1000000000)+$Device);
header('Content-Type: application/json');
$response = [];

if(isset($_POST['password']) && isset($_POST['username'])){



        $con = mysqli_connect('localhost','root','','useraccounts');

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);


        $query = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result = mysqli_query($con,$query);
        if ($result->num_rows > 0) {
            // output data of each row

            $query = "UPDATE `users` SET `totalLogin` = `totalLogin` + 1 WHERE `username` = '$username'";


            $resultTemp = mysqli_query($con,$query);

            while($row = $result->fetch_assoc()) {

                  $user_Token = $row['user_Token'];


                      $sucess = 0;
              if($row['password'] == $password){
                $sucess = 1;
                $query = "UPDATE `users` SET `sucessLogin` = `sucessLogin` + 1 WHERE `username` = '$username'";
                $resultTemp = mysqli_query($con,$query);
                $response['status'] = 'loggedin';
                $response['user'] = $username;
                $_SESSION['user'] = $username;
                $_SESSION['user_Token']  = $user_Token;
                $_SESSION['accessToken'] = $token;

              }
              else{


            $response['status'] = 'error';
            }
            $query = "INSERT INTO `logindetails` (`userID`, `accessToken`, `status`, `browser`, `operatingSystem`, `IP`, `device`) VALUES ('$user_Token', '$token', $sucess,'$Browser', '$OS', '$ip', '$Device')";
            $resultTemp = mysqli_query($con,$query);


             }
        }
        else if($result->num_rows == 0 && $_POST['userHash'] == 'allowCreate'){
          $query = "INSERT INTO `users` (`user_Token`, `username`, `password`) VALUES ('$token', '$username', '$password');";
          $query .= "INSERT INTO `logindetails` (`userID`, `accessToken`, `status`, `browser`, `operatingSystem`, `IP`, `device`) VALUES ('$token', '$token', 1,'$Browser', '$OS', '$ip', '$Device')";
          mysqli_multi_query($con,$query);
          $response['status'] = 'loggedin';
          $response['user'] = $username;
          $_SESSION['user'] = $username;
          $_SESSION['user_Token']  = $user_Token;
          $_SESSION['accessToken'] = $token;
        }
        else{
              $response['status'] ='error';
        }





  }
  else{
  $response['status'] ='error';
  }


echo json_encode($response);







?>
