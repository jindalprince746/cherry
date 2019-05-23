<div class="content">
  <div class="container-fluid">
		<div class="table-responsive table-full-width">
	<table class="table table-hover table-striped">
		<thead>
			<th>Post Date</th>
			<th>Recruitment</th>
			<th>Post Name</th>
			<th>Qualification</th>
			<th>Last Date</th>
			<th>Get Details</th>
		</thead>
		<tbody>
      <?php
      require('db.php');
      $date = date('Y-m-d');
      $query = "SELECT * FROM `jobs` WHERE `last_date` >= '$date'";

      $result = mysqli_query($con,$query);

      if($result->num_rows > 0){
        $i = 0;
        while($row = $result->fetch_assoc()){
            echo '<tr>
            <td>'.$row["post_date"].'</td>
            <td>'.$row["recruitment"].'</td>
            <td>'.$row["Post_name"].'</td>
            <td>'.$row["qualification"].'</td>
            <td>'.$row["last_Date"].'</td>
            <td><a href="'.$row["Get_Details"].'">Get Details</a></td>';
          }
      }
        ?>

		</tbody>
	</table>

</div>
</div>
</div>
