<div class="middle">
  <div class="middle-inner"> 
    <?php 
if(isset($_POST["list_assignment"]))
{ 
  $id= $_SESSION['u_Id'];
  $sem = $_SESSION["tmp_sem"];
  $sub = $_POST['sub'];
  $qry="SELECT tb_students.Name, tb_received_assmnt.ID, tb_received_assmnt.Assmnt_path, tb_received_assmnt.submitted_on, tb_received_assmnt.obt_marks, tb_received_assmnt.Assmnt_ID, subjects.subject_name, tb_uploaded_assmnt.Submission_date, tb_uploaded_assmnt.Max_M  FROM tb_received_assmnt INNER JOIN tb_uploaded_assmnt ON tb_uploaded_assmnt.Assmnt_ID=tb_received_assmnt.Assmnt_ID INNER JOIN subjects ON subjects.subject_id=tb_received_assmnt.subject_id INNER JOIN tb_students ON tb_received_assmnt.ID=tb_students.ID WHERE subjects.course_id ='" . $_SESSION['u_Traid_Id'] . "' AND subjects.semester = '$sem' AND subjects.subject_id = '$sub'";
  $res1=mysqli_query($link, $qry); 
  $i = 1;
  echo mysqli_error($link);
  if(mysqli_affected_rows($link)>0)
  {
      ?>
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
    <th>Assignment Link</th>
    </tr>
  <?php 
  $i = 0;
  while ($res = mysqli_fetch_assoc($res1)) { $i++;?>

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
    <td>
      <!--input type="submit" name="preview" value="Preview"-->      
      <a href="<?php
      if(!isset($res["obt_marks"]))
        echo '?page=users\teacher\preview_assignment&stu=' . $res["ID"] . '&asmnt_id=' . $res["Assmnt_ID"];
      else
        echo $res["Assmnt_path"];
      ?>
      " target='_blank'>Preview</a>   
      </td>
    <?php }
  ?>
</table>
<br/>go <i><a href="?page=users\teacher\mark_assignment_selection">back?</a></i>
<?php   
}
else { 
  echo '<b>No record found</b> go <i><a href="http://localhost/assmgmtsys/index.php?page=users\teacher\mark_assignment_selection">back?</a></i>';
 } 
}
?>
</div>
</div>