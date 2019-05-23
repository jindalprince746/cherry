    <div class="content">
      <div class="container-fluid">

<?php

require('db.php');
$query = "SELECT * FROM `user_plans` WHERE `userID` = '$user_Token'";
$result = mysqli_query($con,$query);
$query = "SELECT * FROM `plan_details`";
$result1 = mysqli_query($con,$query);

if($result1->num_rows > 0){
  $i = 0;
  while($row = $result1->fetch_assoc()){
    $PLAn_CODE = $row["plan_CODE"];
    $PLAn_NAME = $row["plan_NAME"];
    $MOCK_TEST = $row["mock_Test"];
    $Test_SERIES = $row["test_SERIES"];
    $PRICE = $row["price"];
    $PLAN_STatus = $row["plan_Status"];
    $Plan_Array[$PLAn_CODE] = array($PLAn_NAME,$MOCK_TEST,$Test_SERIES,$PRICE,$PLAN_STatus );
  }

  }


  if ($result->num_rows > 0) {
    echo "<div class='row'>
    <h4 class='title' style='padding-left:20px;'>Purchased Plans</h4>";
    while($row = $result->fetch_assoc()) {
      $PLAn_CODE = $row["plan_CODE"];

        echo '<div class="livetestcard">

  <div class="test-title">'.$Plan_Array[$PLAn_CODE][0].'</div>
  <div class="livetestcard-content">
  <p class="course-title">'.$PLAn_CODE.'</p>
  <p class="time-limit">Mock Test: '.$Plan_Array[$PLAn_CODE][1].'</p>
  <p class="time-limit">Test Series: '.$Plan_Array[$PLAn_CODE][2].'</p>
  <p class="time-limit">Status : Active</p>
  <p class="time-limit">Purchased On : '.$row["start_DATE"].'</p>
  <p class="time-limit">Will Expire On : '.$row["expire_DATE"].'</p>
  </div>
  <p><button class="btn btn-success">Get Details</button></p>
</div>';
  }
  echo "</div>";
}
foreach($Plan_Array as $x => $x_value) {
  echo "<div class='row'>
  <h4 class='title' style='padding-left:20px;'>Available Plans</h4>";
  if($Plan_Array[$x][4] == 1){
        echo '<div class="livetestcard">

<div class="test-title">'.$Plan_Array[$x][0].'</div>
<div class="livetestcard-content">
<p class="course-title">'.$x.'</p>
<p class="time-limit">Mock Test: '.$Plan_Array[$x][1].'</p>
<p class="time-limit">Test Series: '.$Plan_Array[$x][2].'</p>
<p class="time-limit">Price : &#8377 '.$Plan_Array[$x][3].'</p>
</div>
<p><button class="btn btn-success"><i class="pe-7s-cart"></i>Buy</button></p>
</div>';
}

echo "</div>";
}

?>





</div>
</div>
</div>

</body>

</html>
