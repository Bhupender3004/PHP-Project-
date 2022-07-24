<div class="middle">
	<div class="middle-inner">
		<table border='1' method="post" enctype="multipart/form-data" style="display: grid; align-content: center; margin: 0 auto;"> 
    <tr>
    <th>Roll No.</th>
    <th>Student Name</th>
    <th>Assignment ID</th>
    <th>Subject</th>
    <th>Upload Date</th>
    <th>Submission Date</th>
    <th>Maximum Marks</th>
    <th>Obtained Marks</th>
    </tr>
  <?php 
  		$stu_id = $_GET['stu'];
		$asmnt_id = $_GET['asmnt_id'];
		$qry="SELECT tb_students.Name, tb_received_assmnt.ID, tb_received_assmnt.Assmnt_path, tb_received_assmnt.upload_name, tb_received_assmnt.submitted_on, tb_received_assmnt.obt_marks, tb_received_assmnt.Assmnt_ID, subjects.subject_name, tb_uploaded_assmnt.Submission_date, tb_uploaded_assmnt.Max_M  FROM tb_received_assmnt INNER JOIN tb_uploaded_assmnt ON tb_uploaded_assmnt.Assmnt_ID=tb_received_assmnt.Assmnt_ID INNER JOIN subjects ON subjects.subject_id=tb_received_assmnt.subject_id INNER JOIN tb_students ON tb_received_assmnt.ID=tb_students.ID WHERE tb_received_assmnt.Assmnt_ID = '$asmnt_id' AND tb_received_assmnt.ID = '$stu_id'";
  		$res1=mysqli_query($link, $qry);
 		$res = mysqli_fetch_assoc($res1);
 		?>
    <tr>
    <td><?php echo $res["ID"]; ?></td>
    <td><?php echo $res["Name"]; ?></td>
    <td><?php echo $res["Assmnt_ID"]; ?></td>
    <td><?php echo $res["subject_name"]; ?></td>
    <td><?php echo $res["submitted_on"]; ?></td>
    <td><?php echo $res["Submission_date"]; ?></td>
    <td><?php echo $res["Max_M"]; ?></td>
    <td><?php 
    if(!isset($res["obt_marks"]))
      echo "Not Assessed";//"<input type='number' name='obt_marks' min=0 max=" . $res['Max_M'] . '>';
    else
      echo $res["obt_marks"];
    ?>
    </td>
    </table>
    <br>
    	<iframe src="<?php echo $res["Assmnt_path"]; ?>" height="300" width="500" style="display: grid; align-content: center; margin: 0 auto;"></iframe>
    	<br/>
    	<?php
    	if(!isset($res["obt_marks"]))
    	{
    		if(!isset($_POST['assn_mrks']))
    		{  
    		?>
    	<form method="post" action="">
    	<table border='1' method="post" enctype="multipart/form-data" style="display: grid; align-content: center; margin: 0 auto;">
    		<tr>
    			<th>Enter Marks</th>
    			<th><input type='number' name='obt_marks' min=0 max='<?=$res['Max_M'] ?>'>
    			</th>
    			<td><input type="submit" value='Assign Marks' name='assn_mrks'></td>
    		</tr>
    	</table>
    	<?php 
    	}
    	else{
    		$upld_name = $res["upload_name"];
    		$qry="UPDATE `tb_received_assmnt` SET `obt_marks` = '12' WHERE `tb_received_assmnt`.`upload_name` = '$upld_name'";
    		$res1=mysqli_query($link, $qry);
    		if(mysqli_effectedmysqli_affected_rows($link)>0)
    			echo "Marks Assigned Successfully!";
    		else
    			echo "Error updating marks";
    	}
    }
    	?>
	</div>
</div>