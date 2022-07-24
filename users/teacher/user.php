<?php 
if(!isset($_SESSION["u_Id"])) 
{
  echo "<div class='pro-discrp'> <h6>You are not logged in!</h6><br>";
  echo "<a href='index.php'>login</a></div>";

}

else
{   ?>

        <div style='padding-top: 4%;'>
            <table style="margin: 0 auto;">
                <tr>
                    <th>Name</th>
                    <td><?=$_SESSION["user"];?></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <td><?=$_SESSION["u_Id"];?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$_SESSION["email"];?></td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td><?=($_SESSION["type"]=='T')? 'Teacher' : 'Student' ;?></td>
                </tr>
                <!--tr>
                    <th>Semester</th>
                    <td><?=$_SESSION["u_Semester"];?></td>
                </tr-->
                <tr>
                    <th>Department</th>
                    <td><?=$_SESSION["u_Traid"];?></td>
                </tr>
            </table>
        </div>

<?php
    
}

?>

