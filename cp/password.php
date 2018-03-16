<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){
?>

<?php 
        include("layout/connect.php"); /* connect database*/

        if (isset($_POST['change'])){
            $user_pass=mysqli_real_escape_string($connect,$_POST['user_pass']);
            $encrypt=md5($user_pass);
        
            $update="UPDATE `cp_user` SET `cpu_pass` = '$encrypt' WHERE `cp_user`.`id` = 1;";
            $result=mysqli_query($connect,$update);
            if ($result == true){
                
                $alert_g=" პაროლი შეიცვალა!";
            }
            else{
                $alert="პაროლი არ შეიცვალა !";
            }
        }
    ?>

<html lang="en">
<?php include("layout/delete_head.php"); ?>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
       <?php include ("layout/left_panel.php"); ?>    
    <!-- ########## END: HEAD PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <div style="margin:  0 auto;">
          <h4>პაროლის შეცვლა</h4>
          <p style="color:red  !important; text-align:center;" class="mg-b-0"><?php echo $alert; ?></p>
          <p style="color:green !important; text-align:center;" class="mg-b-0"><?php echo $alert_g; ?> </p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody col-6" style="margin:50px auto;">
        <div class="br-section-wrapper">

          <div class="table-wrapper ">
                <form  action="password.php" method="post">
                    <div class="form-group">
                        <input type="text" name="user_pass" class="form-control fc-outline-dark" placeholder="ახალი პაროლი...">
                    </div><!-- form-group -->
                    <button style="margin:0 auto;" type="submit" name="change" class="btn btn-info btn-block col-4">შეცვლა</button>
                </form>  
          </div><!-- table-wrapper -->
          </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    ს
    <?php include("layout/delete_script.php"); ?>

  </body>
</html>
    <?php } ?>