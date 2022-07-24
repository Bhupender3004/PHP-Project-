<div class='main'>
	<h1>This the updates page yo</h1>
	<table border=1>
		<tr>
			<th>Sr.</th>
			<th>Date</th>
			<th>Update</th>
			<th>Subject</th>
			<th>Semester</th>
		</tr>
		
		<?php

  /*$id= $_SESSION['u_Id'];
  $sem = $_POST['sem'];
  $sub = $_POST['sub'];*/
  $qry="select * from  notifications order by '";
  $res1=mysqli_query($link, $qry); 
  $i = 1;
  if(mysqli_affected_rows($link)>0)
  {
      
		while ($res = mysqli_fetch_assoc($res1)) { 
		?>

    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $res["Semester"]; ?></td>
    <td><?php echo $res["Sub_Name"]; ?></td>
    <td><a href='<?php echo $res["Assmnt_path"]; ?>' target='_blank'>Download</a></td>
    </tr>
    <?php $i++;
	}
}

  ?>
		<tr>
			<td>



</div>