<div class="content">
  <div class="container-fluid">

<?php

require('db.php');
$query = "SELECT * FROM `testdetails` WHERE `userID` = '$user_Token'";
$result = mysqli_query($con,$query);

if($result->num_rows > 0){
$i = 0;
while($row = $result->fetch_assoc()){
  if($row['testType'] == 0){    // 0 for mock test         1 for test series
    $testType = 'Mock Test';
  }
  else if($row['testType'] == 1){
    $testType = 'Test Series';
  }


  if($row["Status"] == 0){
    $notAttemp[] = array($row["testCODE"],$row["testName"],$testType,$row["planCODE"],$row["totalQuestions"],$row["maxMarks"],$row["timeLimit"]);
  }
  else if($row["Status"] == 1){
    $underProcess[] = array($row["testCODE"],$row["testName"],$testType,$row["planCODE"],$row["startDATE"],$row["totalQuestions"],$row["maxMarks"],$row["timeLimit"]);
  }
  else if($row["Status"] == 2){
    $done[] = array($row["testCODE"],$row["testName"],$testType,$row["planCODE"],$row["startDATE"],$row["endDATE"],$row["totalQuestions"],$row["attempQuestions"],$row["maxMarks"],$row["correctAnswer"],$row["correctMarks"],$row["timeLimit"],$row["totalMarks"]);
  }

}
}


echo "<div class='row'>"; //// under process
for($x = 0; $x < count($underProcess); $x++){


        echo '<div class="livetestcard">
        <div class="test_type">'.$underProcess[$x][2].'</div>
<div class="test-title">'.$underProcess[$x][1].'</div>
<div class="livetestcard-content">
<p class="course-title">'.$underProcess[$x][3].'</p>
<p class="time-limit">Started On: '.Date('l d M Y h:i:s a',strtotime($underProcess[$x][4])).'</p>
<p class="time-limit">Total Questions: '.$underProcess[$x][5].'</p>
<p class="time-limit">Max Marks: '.$underProcess[$x][6].'</p>
<p class="time-limit">Time Limit: '.$underProcess[$x][7].'</p>


</div>
<p><button class="btn btn-success">Resume Test</button></p>
</div>
</div>';
}



echo "<div class='row'>";   ////Not even started
for($x = 0; $x < count($notAttemp); $x++){
        echo '<div class="livetestcard">
        <div class="test_type">'.$notAttemp[$x][2].'</div>
<div class="test-title">'.$notAttemp[$x][1].'</div>
<div class="livetestcard-content">
<p class="course-title">'.$notAttemp[$x][3].'</p>
<p class="time-limit">Total Questions: '.$notAttemp[$x][4].'</p>
<p class="time-limit">Max Marks : '.$notAttemp[$x][5].'</p>
<p class="time-limit">Time Limit : '.$notAttemp[$x][6].'</p>

</div>
<p><button class="btn btn-success">Start Test</button></p>
</div>';
}

echo "</div>";



echo "<div class='row'>";   //// not even
for($x = 0; $x < count($done); $x++){

        echo '<div class="livetestcard">
        <div class="test_type">'.$done[$x][2].'</div>
<div class="test-title">'.$done[$x][1].'</div>
<div class="livetestcard-content">
<p class="course-title">'.$done[$x][3].'</p>
<p class="time-limit">Started On: '.Date('l d M Y h:i:s a',strtotime($done[$x][4])).'</p>
  <p class="time-limit">Ended On: '.Date('l d M Y h:i:s a',strtotime($done[$x][5])).'</p>
<p class="time-limit">Questions Done: '.$done[$x][7]."/".$done[$x][6].'</p>
<p class="time-limit">Correct Answers: '.$done[$x][9].'</p>
<p class="time-limit">Marks Scored: '.$done[$x][12].'</p>
<p class="time-limit">Time Limit: '.$done[$x][11].'</p>



</div>
<p><button class="btn btn-success">View Result</button></p>
</div>';
}
echo "</div>";


?>





</div>
</div>
</div>

</body>

</html>
