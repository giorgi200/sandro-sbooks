<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){
  $main = "active";
?>
<!DOCTYPE html>
<html lang="en">
  
    <?php include ("layout/head.php"); ?>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <?php include ("layout/left_panel.php"); ?>
    <!-- ########## START: END PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div>
          <h4>სამართავი პანელი</h4>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
       
            
            
          </div>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

       <?php include ("layout/script.php"); ?>

  </body>
</html>
<?php } ?>