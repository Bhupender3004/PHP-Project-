<div class="middle">
  <div class="middle-inner"> 
    <form action="" method="post" enctype="multipart/form-data" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
    <table>
        <th colspan=2 style="text-align: center; font-size: 20px; padding-top: 20px; padding-bottom: 20px;">Create new assignment</th>
        <tr>
            <td>Select Semester</td>
            <td>
                <select name="sem" required>
                    <option></option>
                    <?php 
                    $query = "SELECT DISTINCT(subjects.semester) FROM subjects INNER JOIN tb_teachers ON subjects.ID=tb_teachers.ID WHERE tb_teachers.ID =" . $_SESSION['u_Id'];
                    $res1 = mysqli_query($link, $query);
                    while ($res = mysqli_fetch_assoc($res1))
                    {
                    ?>
                    <option value="<?=$res["semester"]?>" ><?=$res["semester"]?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Subject</td>
            <td>
                <select name="sub" required>
                    <option></option>
                    <?php 
                    $query = "SELECT subjects.subject_id, subjects.subject_name FROM subjects INNER JOIN tb_teachers ON subjects.ID=tb_teachers.ID WHERE tb_teachers.ID =" . $_SESSION['u_Id'];
                    $res1 = mysqli_query($link, $query);
                    while ($res = mysqli_fetch_assoc($res1))
                    {
                    ?>
                    <option value="<?=$res["subject_id"]?>" ><?=$res["subject_name"]?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Date of Submission</td>
            <td>
                <input type="date" name="submit_date" min="<?php echo date("Y-m-d") ?>" required />
            </td>
        </tr>
        <tr>
            <td>Maximum Assignment Marks</td>
            <td>
                <input type="number" name="mx_marks" min="1" required /></td>
        </tr>
        <tr>
            <td>
                Select Assignment to upload (in pdf format only)</td>
            </td>
            <td>
                <input type="file" name="file" id="file">
            </td>
        </tr>
        <tr>
            <td>Assignment Description</td>
            <td>
                <input type="textbox" name="assmnt_desc" required /></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; margin: 0 auto;">
                <input type="submit" value="Create Assignment" name="submit" class="button">
            </td>
        </tr>
        <tr>
            <td colspan="2">
<?php
if(isset($_POST["submit"])){
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    die('<style="color: red;">Upload failed with error ' . $_FILES['file']['error'] . "</style>");
}
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$target_dir = "./uploads/assignments/";
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION );
$tmp_file_name = $_FILES["file"]["name"];
$basename = $_SESSION['u_Id'] . '_' . date('d.m.Y.H.i.s') /*day/ month/ year/ hour/ Minutes/ Seconds*/. '.' . $extension;
$target_file = $target_dir . $basename;

$mime = finfo_file($finfo, $_FILES['file']['tmp_name']);

$ok = false;
switch ($mime) {
   case 'image/jpeg':
   case 'image/png':
   case 'image/jpg':
   case 'application/pdf':
           $ok = true;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $u_Id = (int) $_SESSION['u_Id'];
        $sub = $_POST['sub'];
        $sem = $_POST['sem'];
        $desc = $_POST['assmnt_desc'];
        $submit_date = $_POST['submit_date'];
        $mx_marks = $_POST['mx_marks'];
        $qry= "INSERT INTO `tb_uploaded_assmnt` VALUES ('$basename', '$sub', '$target_file', now(), '$submit_date', '$mx_marks')";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
         {
            echo '<style="color: green;"><br>The file <b>'. $tmp_file_name. "</b> has been uploaded.<br></style>";
            $query = "SELECT subject_name FROM subjects WHERE subject_id = '$sub'";
            $res1 = mysqli_query($link, $query);
            $res = mysqli_fetch_assoc($res1);
            echo mysqli_error($link);
            $qry="INSERT INTO `notice` (`notice_id`, `username`, `subject`, `description`, `date`) VALUES ('', '" . $_SESSION["user"] . "', '" . $res["subject_name"] . "', '$desc', now())";
            mysqli_query($link, $query);
            echo mysqli_error($link);
        }
     else
     {
        echo mysqli_error($link);
        echo '<style="color: red;"><br>Sorry, there was an error uploading your file. <br></style>';
     }

    } else {
        
        echo '<style="color: red;">Sorry, there was an error uploading your file.</style>';
    }
           break;
   default:
       echo('<style="color: red;"><br>   Unknown/not permitted file type<br></style>');
   }
}
?>
</td>
</tr>
</table>
</form>
</div>
</div>