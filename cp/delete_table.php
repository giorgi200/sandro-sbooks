<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){
?>

<?php 
    $del_categ="active";
        include("layout/connect.php"); /* connect database*/

        if (isset($_POST['change'])){
            
            if ($_POST['name_id'])    {	$id_n=$_POST['name_id']; }

            $ca="SELECT * from `cat` WHERE  `id` = $id_n";
                        $quer=mysqli_query($connect,$ca);
                        while($ca=mysqli_fetch_array($quer)){

                        $table=$ca['table_name'];
                        $ca_name=$ca['cat_name'];
                        }
                        
            $save="DELETE FROM `cat` WHERE `id` = $id_n";
            $result=mysqli_query($connect,$delete);
            $res=mysqli_query($connect,$save);
            if ( $res == true){
                
                $alert_g="კატეგორია $ca_name  წაიშალა!";
            }
            else{
                $alert="კატეგორია $ca_name არ წაიშალა";
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
          <h4>კატეგორიის წაიშალა</h4>
          <p style="color:red  !important; text-align:center;" class="mg-b-0"><?php echo $alert; ?></p>
          <p style="color:green !important; text-align:center;" class="mg-b-0"><?php echo $alert_g; ?> </p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody col-6" style="margin:50px auto;">
        <div class="br-section-wrapper">

          <div class="table-wrapper ">
                <form  action="delete_table.php" method="post">
                    <div class="form-group">
                        <select class="form-control select2 col-12" required="required" name="name_id" >
                        <option>აირჩიე კატეგორია</option>
                        <?php 
                        include("layout/connect.php"); /* connect database*/

                        $cats="SELECT * from cat ";
                        $quer=mysqli_query($connect,$cats);

                        while($cats=mysqli_fetch_array($quer)){
                        $id=$cats['id'];
                        $des=$cats['cat_name'];
                        ?>
                            <option  value="<?php echo $id; ?>"><?php echo $des ?></option>
                        <?php }?>
                        </select>
                     </div><!-- form-group -->
                    <button style="margin:0 auto;" type="submit" name="change" class="btn btn-info btn-block col-4">წაშლა</button>
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