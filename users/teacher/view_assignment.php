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
          <select name="sem" required>
            <?php 

            $query = "SELECT DISTINCT(subjects.semester) FROM subjects INNER JOIN tb_teachers ON subjects.ID=tb_teachers.ID WHERE tb_teachers.ID =" . $_SESSION['u_Id'];
            $res1 = mysqli_query($link, $query);
            while ($res = mysqli_fetch_assoc($res1))

            { ?>
            <option value="<?=$res["semester"]?>" ><?=$res["semester"]?></option>
          <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Subject</td>
        <td>
          <select name="sub" required>
            <?php 
            $query = "SELECT subjects.subject_id, subjects.subject_name FROM subjects INNER JOIN tb_teachers ON subjects.ID=tb_teachers.ID WHERE tb_teachers.ID =" . $_SESSION['u_Id'];
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
  $sem = $_POST['sem'];
  $sub = $_POST['sub'];
  $qry="SELECT *, subjects.subject_name FROM tb_uploaded_assmnt INNER JOIN subjects ON subjects.subject_id=tb_uploaded_assmnt.subject_id WHERE subjects.ID ='" . $_SESSION['u_Id'] . "' AND subjects.subject_id = '$sub'";
  $res1=mysqli_query($link, $qry); 
  $i = 1;
  echo mysqli_error($link);
  if(mysqli_affected_rows($link)>0)
  {
      ?>

      <table border='1'>
    <tr>
    <th>Sr. No.</th>
    <th>Assignment ID</th>
    <th>Semester</th>
    <th>Subject</th>
    <th>Upload Date</th>
    <th>Submission Date</th>
    <th>Maximum Marks</th>
    <th>Download Link</th>
    </tr>
  <?php 

  while ($res = mysqli_fetch_assoc($res1)) { ?>

    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $res["Assmnt_ID"]; ?></td>
    <td><?php echo $res["semester"]; ?></td>
    <td><?php echo $res["subject_name"]; ?></td>
    <td><?php echo $res["Upload_date"]; ?></td>
    <td><?php echo $res["Submission_date"]; ?></td>
    <td><?php echo $res["Max_M"]; ?></td>
    <td><a href='<?php echo $res["Assmnt_path"]; ?>' target='_blank'>Preview</a></td>
    </tr>
    <?php $i++;
  }

  echo "</table>";
  echo 'go <i><a href="http://localhost/assmgmtsys/index.php?page=users\teacher\view_assignment">back?</a></i>';

}
else { 
  echo '<b>No record found</b> go <i><a href="http://localhost/assmgmtsys/index.php?page=users\teacher\view_assignment">back?</a></i>';
 } 
}
?>
</div>
</div>