<div class="middle">
  <div class="middle-inner"> 
    <?php if(!isset($_POST["view_subjects"])) 
    { 
    ?>
    <form action="" method="post" enctype="multipart/form-data" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
    <table>
      <tr>
        <td>Semester</td>
        <td>
          <select name="sem" required>
            <option disabled selected></option>
            <?php 
              $query = "SELECT DISTINCT(subjects.semester) FROM subjects INNER JOIN tb_teachers ON subjects.ID=tb_teachers.ID WHERE tb_teachers.ID =" . $_SESSION['u_Id'];
              $res = mysqli_query($link, $query);
              while ($row = mysqli_fetch_assoc($res))
              { 
            ?>
            <option value="<?=$row["semester"]?>" ><?=$row["semester"]?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center; margin: 0 auto;">
          <input type="submit" value="Submit" name="view_subjects" class="button">
          </td>
      </tr>
    </table>
    </form>

<?php 
}
if(isset($_POST["view_subjects"])) 
    { 
    $_SESSION['tmp_sem'] = $_POST['sem'];
    $sem = $_POST['sem'];
    ?>
    <form action="?page=users\teacher\mark_assignment" method="post" enctype="multipart/form-data" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
    <table>      
      <tr>
        <td>Subject</td>
        <td>
          <select name="sub" required>
            <option></option>
            <?php 
            $query = "SELECT subjects.subject_id, subjects.subject_name FROM subjects INNER JOIN tb_teachers ON subjects.ID=tb_teachers.ID WHERE subjects.semester = '$sem' AND tb_teachers.ID =" . $_SESSION['u_Id'];
            $res = mysqli_query($link, $query);
            while ($row = mysqli_fetch_assoc($res))
            {?>
            <option value="<?=$row["subject_id"]?>" ><?=$row["subject_name"]?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center; margin: 0 auto;">
          <input type="submit" value="List Assignments" name="list_assignment" class="button">
          </td>
      </tr>
    </table>
<?php 
}
?>
</div>
</div>