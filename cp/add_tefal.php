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

if (isset($_POST['add'])){
	if (!empty($_POST['name']))    {	$title=$_POST['name']; }
  if ($_POST['cat_id'])       {	$cat_id=$_POST['cat_id']; }

	if ($_POST['das'])       {	$das=$_POST['das']; }
	if ($_POST['price'])     {	$price=$_POST['price']; }
	if ($_POST['mod'])       {	$model=$_POST['mod']; }
	if ($_POST['qve_das'])    {	$qve_das=$_POST['qve_das']; }

	if ($_POST['des'])    {	$des=$_POST['des']; }

    if (!empty($_FILES['image']))   
        {$image=$_FILES['image']['name']; 
	      $image_tmp=$_FILES['image']['tmp_name'];
		    $target_file = "../$das/$qve_das/" . basename($image);
	      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $new_name="$model.$imageFileType";
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

    move_uploaded_file($image_tmp,"../$das/$qve_das/$new_name");

    }
    $insert="INSERT INTO tefal ( price, model, das, qve_das, des, img, title, cat_id ) VALUES ('$price', '$model', '$das', '$qve_das', '$des',  '$new_name', '$title', '$cat_id')";
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

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <?php include ("layout/left_panel.php"); ?>
    <!-- ########## START: END PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
      <i class="icon ion-ios-book-outline tx-70 lh-0"></i>
        <div>
          <h4>About Piglets</h4>
          <p style="color:red;"><?php echo $alert;?>   </p>
          <p style="color:green;"><?php echo $alert_g;?>  </p>
          <p style="color:red;"><?php echo $alert_format;?>  </p>
          <p style="color:red;"><?php echo $alert_upload;?>  </p>
          <p style="color:red;"><?php echo $alert_size;?>  </p>


        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <form action="add_tefal.php" method="post" id="file-upload-form" class="uploader" name="form" enctype="multipart/form-data" >
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
              <div class="col-5 col-sm-4">
                ფასი:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                <input class="form-control" type="text" name="price" placeholder="დაამატე ფასი">
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                მოდელი:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                <input class="form-control" type="text" name="mod" placeholder="დაამატე modeli">
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                დასახელება:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                <select class="form-control select2" required="required" name="das" data-placeholder="Choose Browser">
                    <option >სამზარეულო</option>
                    <option >საოჯახო_ტექნიკა</option>
                    <option >სილამაზე</option>
                    <option >ჭურჭელი</option>
                </select>
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                ქვე-დასახელება:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
              
                <select class="form-control select2" required="required" name="qve_das" data-placeholder="Choose Browser">
                    <option >აქსესუარები</option>
                    <option >Multicooking</option>
                    <option >ბლენდერი</option>
                    <option >გრილი</option>
                    <option >მიქსერი</option>
                    <option >პურის_საცხობი</option>
                    <option >სამზარეულოს_პროცესორი</option>
                    <option >სენდვიჩ_მეიქერი</option>
                    <option >ტოსტერი</option>
                    <option >უთო</option>
                    <option >ყავის_აპარატი</option>
                    <option >ჩაიდანი</option>
                    <option >წვენსაწური</option>
                    <option >ხელის_ბლენდერი</option>
                    <option >ხორცსაკეპი</option>
                    <option >სილამაზე</option>
                    <option >ტაფა</option >
                    <option >ქვაბი</option >

                </select>
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                ქვე-დასახელება:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
              
                <select class="form-control select2" required="required" name="cat_id" data-placeholder="Choose Browser">
                    <option value="1">აქსესუარები</option>
                    <option value="2">Multicooking</option>
                    <option value="3">გრილი</option>
                    <option value="4">მიქსერი</option>
                    <option value="5">ბლენდერი</option>
                    <option value="6">პურის_საცხობი</option>
                    <option value="7">სამზარეულოს_პროცესორი</option>
                    <option value="8">სენდვიჩ_მეიქერი</option>
                    <option value="9">ტოსტერი</option>
                    <option value="10">უთო</option>
                    <option value="11">ყავის_აპარატი</option>
                    <option value="12">ჩაიდანი</option>
                    <option value="13">წვენსაწური</option>
                    <option value="14">ხელის_ბლენდერი</option>
                    <option value="15">ხორცსაკეპი</option>
                    <option value="16">სილამაზე</option>
                    <option value="17">ტაფა</option >
                    <option value="18">ქვაბი</option >

                </select>
              </div><!-- col-8 -->
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