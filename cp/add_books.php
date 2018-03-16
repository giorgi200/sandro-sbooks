<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){
?>
<?php 	
$alert="";
$alert_format="";
$alert_size="";
$alert_upload="";
$add = "active";

if (isset($_POST['add'])){
	if (!empty($_POST['name']))    {	$title=$_POST['name']; }
  if (!empty($_POST['cat']))    {	$cat=$_POST['cat']; }

	if ($_POST['gelink'])    {	$ge=$_POST['gelink']; }
	if ($_POST['itlink'])    {	$it=$_POST['itlink']; }
	if ($_POST['enlink'])    {	$en=$_POST['enlink']; }
	if ($_POST['rulink'])    {	$ru=$_POST['rulink']; }
	if ($_POST['eslink'])    {	$es=$_POST['eslink']; }
	if ($_POST['frlink'])    {	$fr=$_POST['frlink']; }

  if ($_POST['des'])    {	$des=$_POST['des']; }

    if (!empty($_FILES['image']))   
        {$image=$_FILES['image']['name']; 
	      $image_tmp=$_FILES['image']['tmp_name'];
		    $target_file = "../book/" . basename($image);
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
        
    include("layout/connect.php"); /* connect database*/

    move_uploaded_file($image_tmp,"../book/$new_name");

    }
    $upload_time=date('Y-m-d');
    $insert="INSERT INTO books ( name, des, img, time, cat_id	) VALUES ('$title', '$des', '$new_name','$upload_time', '$cat')";
    $result=mysqli_query($connect,$insert);
    if ($result==true){
        
        $alert_g=" დამატებულია !";
        
        
    }else{
        $alert=" არ დაემატა !";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  
    <?php include ("layout/head.php"); ?>
    <style>
      .uploader #file-image{max-width:280px !important;}
    </style>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <?php include ("layout/left_panel.php"); ?>
    <!-- ########## START: END PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-book-outline tx-70 lh-0"></i>
        <div>
          <h4>წიგნების დამატება</h4>
          <p style="color:red;"><?php echo $alert;?>   </p>
          <p style="color:green;"><?php echo $alert_g;?>  </p>
          <p style="color:red;"><?php echo $alert_format;?>  </p>
          <p style="color:red;"><?php echo $alert_upload;?>  </p>
          <p style="color:red;"><?php echo $alert_size;?>  </p>


        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <form action="add_books.php" method="post" id="file-upload-form" class="uploader" name="form" enctype="multipart/form-data" >
        <div class="form-layout form-layout-7">
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                სათაური:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                <input class="form-control" type="text" name="name" placeholder="დაამატე სათაური">
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-7 col-sm-4">
              გამოცემა:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                <select class="form-control select2" required="required" name="cat" data-placeholder="Choose Browser">
                <?php 
                  include("layout/connect.php"); /* connect database*/

                  $cats="SELECT * from cat ";
                  $quer=mysqli_query($connect,$cats);

                 while($cats=mysqli_fetch_array($quer)){
                  $cat_id=$cats['id'];
                  $des=$cats['cat_name'];
                  ?>
                    <option  value="<?php echo $cat_id ?>"><?php echo $des ?></option>
                 <?php }?>
                </select>  
              </div>          
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                აღწერა:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
              <textarea rows="6" class="form-control form-control-dark" name="des" placeholder="დაამატე აღწერა..."></textarea></div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                სურათი:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8 abel">
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
              </div><!-- col-8 -->           
            </div><!-- row -->
          <div class="row no-gutters ">
            <div class="form-layout-footer col-12">
              <button class="btn btn-primary" type="submit" name="add">დამატება</button>
            </div><!-- form-layout-footer -->
          </div>
          
        </form>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php include ("layout/script.php"); ?>


  </body>
</html>
<?php } ?>