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
            if (!empty($_FILES['image']))   
                {$image=$_FILES['image']['name']; 
                $image_tmp=$_FILES['image']['tmp_name'];
                $target_file = "admin_img/" . basename($image);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $new_name=date('Y-m-d_H-i')."_".time().".$imageFileType";
                $uploadOk = 1;}
        
            if ($_FILES["image"]["size"] > 400000) {
                $alert_size="ფაილის მოცულობა დასაშვებზე დიდია ";
                $uploadOk = 0;}
        
            if( $imageFileType != "jpg" && $imageFileType != "JPG" 
                && $imageFileType != "png" && $imageFileType != "PNG" 
                && $imageFileType != "jpeg" && $imageFileType != "JPEG"
                && $imageFileType != "gif" && $imageFileType != "GIF") {
                $alert_format="მხოლოდ  JPG, JPEG, PNG & GIF ფაილებია დასაშვები !";
                $uploadOk = 0;}
            if ($uploadOk == 0) {
                $alert_upload="ფაილი არ აიტვირთა !";
                
            } else {
                    
            move_uploaded_file($image_tmp,"admin_img/$new_name");
        
            }
            $update="UPDATE `cp_user` SET `img` = '$new_name' WHERE `cp_user`.`id` = 1;";
            $result=mysqli_query($connect,$update);
            if ($result == true){
                
                $alert_g="  შეიცვალა!";
            }
            else{
                $alert="პაროლი არ შეიცვალა !";
            }
        }
    ?>

<html lang="en">
<?php include("layout/head.php"); ?>

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
                <form  action="change_img.php" method="post" class="uploader" id="file-upload-form" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="col-7 col-sm-12 abel">
                      <input id="file-upload" type="file" name="image" accept="image/*" />
				      <label for="file-upload" id="file-drag" class="slabel">
                        <img id="file-image" src="#" alt="Preview" class="hidden">
                        <div id="start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div> Drag & Drop </div>
                            <div id="notimage" class="hidden">აირჩიეთ მხოლოდ ფოტო</div>
                            <span id="file-upload-btn" class="btn btn-primary">აირჩიე ფოტო</span>
                        </div>
                        <div id="response" class="hidden" style="display:none !important;">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0">
                            <span>0</span>%
                            </progress>
                        </div>
				      </label>
              </div><!-- col-8 -->                    </div><!-- form-group -->
                    <button style="margin:0 auto;" type="submit" name="change" class="btn btn-info btn-block col-4">შეცვლა</button>
                </form>  
          </div><!-- table-wrapper -->
          </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php include("layout/script.php"); ?>

  </body>
</html>
    <?php } ?>
    