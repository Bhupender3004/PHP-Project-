<?php 
if(!isset($_SESSION["u_Id"])) 
{
  echo "<div class='pro-discrp'> <h6>You are not logged in!</h6><br>";
  echo "<a href='index.php'>login</a></div>";
  ?>

  <?php
}

else
{

    $query = 'SELECT * FROM tb_users WHERE id = '. $_SESSION["u_Id"];
    // Fetch the user from the database and return the result as an Array

    $res = mysqli_query($link, $query);
    $user_details = mysqli_fetch_array($res);
    // Check if the product exists (array is not empty)
    if (!$user_details) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        die ('<script> alert("User does not exist!" </script>');
    }
    else
    {
        ?>
        <div style='padding-top: 4%;'>
            <table style="margin: 0 auto;">
                <tr>
                    <th>Name</th>
                    <td><?=$user_details["Name"];?></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <td><?=$user_details["ID"];?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?//=$user_details["Email"];?></td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td><?=($user_details["Type"]=='T')? 'Teacher' : 'Student' ;?></td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td><?=$_SESSION["u_Semester"];?></td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td><?=$_SESSION["u_Traid"];?></td>
                </tr>
            </table>
        </div>

<?php
    }

}

?>

