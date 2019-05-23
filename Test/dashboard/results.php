<div class="content">
  <div class="container-fluid">

<?php

require('db.php');
$query = "SELECT * FROM `testdetails` WHERE `userID` = '$user_Token' AND Status = 2";

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



    $done[] = array($row["testCODE"],$row["testName"],$testType,$row["planCODE"],$row["startDATE"],$row["endDATE"],$row["totalQuestions"],$row["attempQuestions"],$row["maxMarks"],$row["correctAnswer"],$row["correctMarks"],$row["timeLimit"],$row["totalMarks"]);


}
}



echo "<div class='row'>";   //// done already
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
