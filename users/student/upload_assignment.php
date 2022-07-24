<?php 
function check_subject_exist($link, $sub_id){
    $query = "SELECT * FROM tb_uploaded_assmnt WHERE subject_id = '$sub_id'";
    $res = mysqli_query($link, $query);
    //echo mysqli_error($link);
    if(mysqli_affected_rows($link)>0)
        return false;
    else
        return true;
}
function check_assmnt_status($link, $sub_id, $asmt_id, $usr_id){
    $query = "SELECT * FROM tb_received_assmnt WHERE Assmnt_ID = '$asmt_id' AND ID = '$usr_id'";
    $res = mysqli_query($link, $query);
    if(mysqli_affected_rows($link)>0)
        return true;
    else
    {
        $query = "SELECT Submission_date FROM tb_uploaded_assmnt WHERE Assmnt_ID = '$asmt_id' AND subject_id = '$sub_id'";
        $res = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($res);
        if(!(date("Y-m-d")<=$row['Submission_date']))
            return true;

        return false;
    }
}
?>
<div class="middle">
  <div class="middle-inner"> 
    <?php 
    if(!isset($_POST["find_assignment"])){
    ?>
    <form action="" method="post" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
    <table>
        <th colspan=2 style="text-align: center; font-size: 20px; padding-top: 20px; padding-bottom: 20px;">List Assignment</th>
        <tr>
            <td>Select Semester</td>
            <td>
                <select name="sem" disabled>
                    <option value="<?=$_SESSION["u_Semester"]?>" ><?=$_SESSION["u_Semester"]?> </option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Subject</td>
            <td>
                <select name="sub" required>
                    <option></option>
                    <?php 
                    $query = "SELECT subject_id, subject_name FROM subjects WHERE course_id='" . $_SESSION["u_Traid_Id"] . "' AND semester = '" . $_SESSION["u_Semester"] . "'";
                    $res1 = mysqli_query($link, $query);
                    while ($res = mysqli_fetch_assoc($res1))
                    {
                        
                    ?>
                    <option value="<?=$res["subject_id"]?>"<?php 
                    if(check_subject_exist($link, $res["subject_id"]))
                        echo ' disabled';
                    ?>>

                    <?=$res["subject_name"]?>
                    </option>
                    <?php
                
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; margin: 0 auto;">
                <input type="submit" value="List Assignment" name="find_assignment" class="button">
            </td>
        </tr>
</table>
</form>

<?php
}

if(isset($_POST["find_assignment"])){
    $_SESSION["tmp_subject_id"] = $_POST['sub'];
    $sub = $_POST['sub'];

?>
<form action="" method="post" enctype="multipart/form-data" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
    <table>
        <th colspan=2 style="text-align: center; font-size: 20px; padding-top: 20px; padding-bottom: 20px;">Upload Assignment</th>
            <tr>
            <td>Select Assignment</td>
            <td>
                <select name="asmt_id" required>
                    <option></option>
                    <?php 
                    $query = "SELECT Assmnt_ID FROM tb_uploaded_assmnt WHERE subject_id = '$sub'";
                    $res = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($res))
                    {
                        
                    ?>
                    <option value="<?=$row["Assmnt_ID"]?>"<?php 
                    if(check_assmnt_status($link, $sub, $row["Assmnt_ID"], $_SESSION['u_Id']))
                        echo ' disabled';
                    ?>>
                    <?=$row["Assmnt_ID"]?>
                    </option>
                    <?php
                
                    } ?>
                </select>
            </td>
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
            <td colspan="2" style="text-align: center; margin: 0 auto;">
                <input type="submit" value="Upload Assignment" name="upload_assignment" class="button">
            </td>
        </tr>
<?php
}
if(isset($_POST["upload_assignment"])){
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    die('<style="color: red;">Upload failed with error ' . $_FILES['file']['error'] . "</style>");
}
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$target_dir = "./uploads/submissions/";
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
        $sem = $_SESSION["u_Semester"];
        $sub_id = $_SESSION["tmp_subject_id"];
        $asmt_id = $_POST['asmt_id'];
        $qry= "INSERT INTO `tb_received_assmnt` VALUES ('$u_Id', '$basename', '$asmt_id', '$target_file', now(), NULL, '$sub_id', '$sem')";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
         {
            echo '<style="color: green;"><br>The file <b>'. $tmp_file_name. "</b> has been uploaded.<br></style>";
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
echo mysqli_error($link);
?>
</td>
</tr>
</table>
</form>
</div>
</div>