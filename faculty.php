<?php 
if(!isset($_SESSION["u_Id"])) 
{
  echo "<div class='pro-discrp'> <h6>You are not logged in!</h6><br>";
  echo "<a href='index.php'>login</a></div>";

}

else
{   
    $id = $_SESSION["u_Id"];

    $query = "SELECT * FROM tb_teachers INNER JOIN courses ON tb_teachers.course_id = courses.course_id";
    // Fetch the user from the database and return the result as an Array

    $res = mysqli_query($link, $query);
    /*$row = mysqli_fetch_assoc($res);
    // Check if the user exists (array is not empty)
    if (!$row) {
        // Simple error to display if the id for the user doesn't exists (array is empty)
        die ("<H1><center>User does not exist! </center></H1>'");
    }
    else
    {*/
        ?>
        <div style='padding-top: 4%;'>
            <table style="margin: 0 auto;">
                <th>Name</th>	
                <th>Mobile</th>
                <th>e-Mail</th>
                <th>Course</th>

                 <?php 
                 while($row = mysqli_fetch_assoc($res))
                 { 
                 ?>
                <tr>
                	<td><?=$row["Name"];?></td>

                    <td><?=$row["Mobile"];?></td>

                    <td><?=$row["email"];?></td>

                    <td><?=$row["course_name"];?></td>

                    <!--td><?=$row["Semester"];?></td-->

                    <!--td><?=($row["Type"]=='T')? 'Teacher' : 'Student' ;?></td-->
                </tr>
                <?php
		//}
    }
   }
?>
            </table>
        </div>