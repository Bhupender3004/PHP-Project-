<?php

if(isset($_POST["btnsub"]))
{
 $uname=$_POST["txtname"];
 $uid=$_POST["txtid"];
 $pwd=$_POST["txtpwd"];
 $email=$_POST["email"];
 $conpwd=$_POST["txtconpwd"];
      /*if($pwd!=$conpwd)
        {
            echo"Password Does not Match";
               header("loacation:frmreg.php");
        }*/
         // else
          {
            //echo"$uname";
            $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
            $qry="insert into tb_users values ('$uid', '$hashed_password', '$email','', '$uname')";
            $res=mysqli_query($link,$qry);
            //echo "$hashed_password";  // debugging 

           if(mysqli_affected_rows($link)>0)
                {
                     
                    // header("location:index.php");
                     echo "<script> alert('Registration Succesfull');</script>";
                     echo "<center>Redirecting...</center>";
                     header("refresh:2; url=index.php?page=login");
                     

                     //$a=mysqli_close($link);
                     /*if(isset($a))
                     {
                      echo "$a";
                     }*/
                }
                else
                {
                  echo "<script> alert('Id In use')</script>";
                }
          }
}
?>

  <div class="middle">
    <div class="middle-inner">
      <!-------- evt-search-wrap -------->
      <?php if(!isset($_SESSION["user"])) { ?>
      <form id='signup_page' method="post" action="" onSubmit="return checks()" style="display: grid; align-content: center; margin: 0 auto; width:500px !important;">
          <table>
              <tr>
                  <td>ENTER USERNAME</td>
                  <td><input type="text" name="txtname" id="txtname" placeholder="Enter your Name"required /></td>
              </tr>
              <tr>
                  <td>ENTER USER-ID</td>
                  <td><input type="number" name="txtid" id="txtid" placeholder="Enter your Roll No." required /></td>
              </tr>
              <tr>
                  <td>ENTER Email</td>
                  <td><input type="text" name="email" id="email" required /></td>
              </tr>              
              <tr>
                  <td>ENTER PASSWORD</td>
                  <td><input type="password" name="txtpwd" id="txtpwd" required /></td>
              </tr>
              <tr>
                  <td>Confirm Password</td>
                  <td><input type="password" name="txtconpwd" id="txtconpwd" required/></td>
              </tr>
              <TR>
                  <td colspan="2" style="text-align: center; margin: 0 auto;">
                      <input type="submit" value="REGISTER" name="btnsub" class="button"/></br>
                      <a href="index.php?page=login">ALREADY REGISTERED?..LOGIN HERE</a>
                      </br>
                  </td>
              </TR> </table>
      </form>
    <?php } 
    else
    {
      echo "<div class='pro-discrp'> <h6>You are already logged in!</h6><br>";
      echo "<a href='index.php'>back</a></div>";
    }
     ?>




      <!-------- End-evt-search-wrap -------->
      <div class="evt-detail">
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!----------------{ End Middle }----------------> 
  


<!-----------------------------{ End Main Wrapper }------------------------------>
<script>
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


</body>
</html>
