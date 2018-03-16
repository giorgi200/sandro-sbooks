<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){
?>

<?php 
    $categ="active";
        include("layout/connect.php"); /* connect database*/

        if (isset($_POST['change'])){
            $table=mysqli_real_escape_string($connect,$_POST['table_name']);
            $cat=mysqli_real_escape_string($connect,$_POST['cat_name']);

            $save="INSERT INTO cat ( cat_name ) VALUES ('$cat')";

            // $update="CREATE TABLE `sandro`.`$table` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `name` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `des` TEXT CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL , `gelink` TEXT NOT NULL , `enlink` TEXT NOT NULL , `eslink` TEXT NOT NULL , `rulink` TEXT NOT NULL , `frlink` TEXT NOT NULL , `itlink` TEXT NOT NULL , `img` TEXT NOT NULL , `time` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;            ";
            // $result=mysqli_query($connect,$update);
            $res=mysqli_query($connect,$save);
            if ($res == true){
                
                $alert_g="კატეგორია შეიქმნა!";
            }
            else{
                $alert="კატეგორია არ შეიცვალა !";
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
          <h4>კატეგორიის დამატება</h4>
          <p style="color:red  !important; text-align:center;" class="mg-b-0"><?php echo $alert; ?></p>
          <p style="color:green !important; text-align:center;" class="mg-b-0"><?php echo $alert_g; ?> </p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody col-6" style="margin:50px auto;">
        <div class="br-section-wrapper">

          <div class="table-wrapper ">
          <form action="add_table.php" method="post">
                <div class="form-group">
                    <input type="text" name="cat_name" class="form-control fc-outline-dark" placeholder="სათაური">
                 </div><!-- form-group -->
                <button style="margin:0 auto;" type="submit" name="change" class="btn btn-info btn-block col-4">დამატება</button>
            </form>
          </div><!-- table-wrapper -->
          </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
    <?php include("layout/delete_script.php"); ?>

  </body>
</html>
    <?php } ?>