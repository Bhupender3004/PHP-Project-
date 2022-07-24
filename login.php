 <?php
 if(isset($_POST["btnsub"]))
 {
    $id = $_POST["txtid"];
    $pwd=$_POST["txtpwd"];
    $login_type=$_POST["login_type"];
    $_SESSION["type"] = $login_type;
    $table=($login_type=='S')?"tb_students":"tb_teachers";

   $qry="SELECT * FROM $table WHERE ID=$id";
   $res=mysqli_query($link, $qry);


   if(mysqli_affected_rows($link) == 0)
   {
    echo '<script> alert("Wrong id")</script>';
   }  
  
   else// if(mysqli_affected_rows($link))
   {
   
      //$hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
    //var_dump($hashed_password);
    echo mysqli_error($link);
    while ($r= mysqli_fetch_assoc($res))
    {

     $usr=$r["ID"];  //user
     $pass=$r["Pwd"];  //password
     $username=$r["Name"];  //
     
    }

   if(!(password_verify($pwd, $pass)))
   {
     echo'<script> alert("Wrong Password")</script>';

   }
   else
   {
    
    if($login_type=='T')  //--for Teachers--//
    {
      $qry="SELECT tb_teachers.email, courses.course_name, courses.course_id FROM tb_teachers INNER JOIN courses ON tb_teachers.course_id = courses.course_id WHERE tb_teachers.ID= '$id'";
        $res=mysqli_query($link, $qry);
        $row = mysqli_fetch_assoc($res);

        $_SESSION["email"] = $row["email"];
        $_SESSION["u_Traid"] = $row["course_name"];
        $_SESSION["u_Traid_Id"] = $row["course_id"];
        $_SESSION["u_Id"] = "$usr";
        $_SESSION["user"] = "$username";
      $_SESSION["home_page"] = 'users\teacher\select';
      header('location:index.php?page=users\teacher\select');

    }
      else    //--for Students--//
      {
        $qry="SELECT tb_students.Semester, tb_students.email, courses.course_name, courses.course_id FROM tb_students INNER JOIN courses ON tb_students.course_id = courses.course_id WHERE tb_students.ID= '$id'";
        $res=mysqli_query($link, $qry);
        $row = mysqli_fetch_assoc($res);

        $_SESSION["u_Semester"] = $row["Semester"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["u_Traid"] = $row["course_name"];
        $_SESSION["u_Traid_Id"] = $row["course_id"];
        $_SESSION["u_Id"] = "$usr";
        $_SESSION["user"] = "$username";
        $_SESSION["home_page"] = 'users\student\select';
        header('location:index.php?page=users\student\select');
      }
  }

}
}

?> 



<!----------------{ Middle }---------------->
<div class="middle">
  <div class="middle-inner"> 
    <!-------- evt-search-wrap -------->
    <form method="post" action="index.php" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
      <table>
        <tr>
          <td>Enter User ID</td>
          <td><input type="number" name="txtid" id="txtid" required/></td>
        </tr>
        <tr>
          <td>Enter Password</td>
          <td><input type="password" name="txtpwd" id="txtpwd" required/></td>
        </tr>
        <tr>
          <td>Login Type</td>
          <td><label>
            <input type="Radio" name="login_type" value="T" class="radio" required /> Teacher</br>
            </label>
            <label>
            <input type="Radio" name="login_type" value="S" class="radio" required /> Student
            </label>
            </br>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center; margin: 0 auto;">
            <input type="submit" value="LOGIN" name="btnsub" class="button"/></br>
            </br>
          </td>
        </tr> 
    </table>
      <?php
      if(isset($msg))
      {
        echo "$msg";
      }
      ?>
    </form>
    <!-------- End-evt-search-wrap -------->
    <div class="evt-detail">
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!----------------{ End Middle }----------------> 



<!-----------------------------{ End Main Wrapper }------------------------------>
<!-- <script>
  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      rtl:true,
      items: 1,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 2500,
      autoplayHoverPause: true
    });
    $('.play').on('click', function() {
      owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
      owl.trigger('stop.owl.autoplay')
    })
  })
</script>
-->
