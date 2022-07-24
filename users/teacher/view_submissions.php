<div class="middle">
  <div class="middle-inner"> 
    <?php if(!isset($_POST["submit"])) 
    { 
    ?>
    <form action="" method="post" enctype="multipart/form-data" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
    <table>
      <tr>
        <td>Semester</td>
        <td>
          <select name="sem" disabled>
            <option value="<?=$_SESSION["u_Semester"]?>" ><?=$_SESSION["u_Semester"]?> </option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Subject</td>
        <td>
          <select name="sub" required>
            <option></option>
            <?php 
            $query = "SELECT subject_id, subject_name FROM subjects WHERE course_id='" . $_SESSION["u_Traid_Id"] . "' AND semester = '" . $_SESSION["u_Semester"] . "'";
            $res1 = mysqli_query($link, $query);
            while ($res = mysqli_fetch_assoc($res1))
            {?>
            <option value="<?=$res["subject_id"]?>" ><?=$res["subject_name"]?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center; margin: 0 auto;">
          <input type="submit" value="Submit" name="submit" class="button">
          </td>
      </tr>
</table>
</form>

<?php 
}

if(isset($_POST["submit"]))
{
  $id= $_SESSION['u_Id'];
  $sem = $_SESSION["u_Semester"];
  $sub = $_POST['sub'];
  $qry="SELECT tb_received_assmnt.Assmnt_path, tb_received_assmnt.submitted_on, tb_received_assmnt.obt_marks, subjects.subject_name, tb_uploaded_assmnt.Submission_date, tb_uploaded_assmnt.Max_M  FROM tb_received_assmnt INNER JOIN subjects ON subjects.subject_id=tb_received_assmnt.subject_id INNER JOIN tb_uploaded_assmnt ON tb_uploaded_assmnt.Assmnt_ID=tb_received_assmnt.Assmnt_ID WHERE subjects.course_id ='" . $_SESSION['u_Traid_Id'] . "' AND subjects.semester = '" . $_SESSION["u_Semester"] . "' AND subjects.subject_id = '$sub'";
  $res1=mysqli_query($link, $qry); 
  $i = 1;
  echo mysqli_error($link);
  if(mysqli_affected_rows($link)>0)
  {
      ?>

      <table border='1'>
    <tr>
    <th>Sr. No.</th>
    <th>Subject</th>
    <th>Upload Date</th>
    <th>Submission Date</th>
    <th>Maximum Marks</th>
    <th>Obtained Marks</th>
    <th>Download Link</th>
    </tr>
  <?php 

  while ($res = mysqli_fetch_assoc($res1)) { ?>

    <tr>
    <td><?php echo $i; ?></td>
    <!--td><?php echo $res["Assmnt_ID"]; ?></td-->
    <td><?php echo $res["subject_name"]; ?></td>
    <!--td><?php echo $res["semester"]; ?></td-->
    <td><?php echo $res["submitted_on"]; ?></td>
    <td><?php echo $res["Submission_date"]; ?></td>
    <td><?php echo $res["Max_M"]; ?></td>
    <td><?php echo (!isset($res["obt_marks"])? 'Not Assessed': $res["obt_marks"]); ?></td>
    <td><a href='<?php echo $res["Assmnt_path"]; ?>' target='_blank'>Preview</a></td>
    </tr>
    <?php $i++;
  }

  echo "</table>";
  echo 'go <i><a href="http://localhost/assmgmtsys/index.php?page=users\student\view_assignment">back?</a></i>';

}
else { 
  echo '<b>No record found</b> go <i><a href="http://localhost/assmgmtsys/index.php?page=users\student\view_assignment">back?</a></i>';
 } 
}
?>
</div>
</div>