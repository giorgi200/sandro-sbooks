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
$add_b_i = "active";

if (isset($_GET['edit'])){
    $edit_id=$_GET['id'];} 

if (isset($_GET['id'])){
      $edit_id=$_GET['id'];} 

if (isset($_POST['add'])){

    $total = count($_FILES['image']['name']);
    for($i=0; $i<$total; $i++) {

        if (!empty($_POST['lan_cat']))    {	$lan_cat=$_POST['lan_cat']; }
        if (!empty($_POST['height']))    {	$height=$_POST['height']; }
        if (!empty($_POST['width']))    {	$width=$_POST['width']; }

    if (!empty($_FILES['image']))   
        {$image=$_FILES['image']['name'][$i]; 
	      $image_tmp=$_FILES['image']['tmp_name'][$i];
		    $target_file = "../book/" . basename($image);
	      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $new_name=date('Y-m-d_H-i')."_$i".time().".$imageFileType";
		    $uploadOk = 1;}



    if ($uploadOk == 0) {
        $alert_upload="ფაილი არ აიტვირთა !";
        
    } else {
        
    include("layout/connect.php"); /* connect database*/

    move_uploaded_file($image_tmp,"../book/full/$new_name");

    }
    

    $i_p = $i + 1;
    $insert="INSERT INTO book_img ( book_id, img, lang_id, width, height, page_id ) VALUES ('$edit_id', '$new_name', '$lan_cat', '$width', '$height', '$i_p')";
    $result=mysqli_query($connect,$insert);
    if ( $result==true){
        
        $alert_g=" დამატებულია $total სურათი!";
        
        
    }else{
        $alert=" არ დაემატა !";
        
    }
        
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
          <p style="color:red;"><?php echo $alert;?></p>
          <p style="color:green;"><?php echo $alert_g;?></p>
          <p style="color:red;"><?php echo $alert_format;?></p>
          <p style="color:red;"><?php echo $alert_upload;?></p>
          <p style="color:red;"><?php echo $alert_size;?></p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <form action="edit_book_img.php?id=<?php echo $edit_id; ?>" method="post" id="file-upload-form" class="uploader" name="form" enctype="multipart/form-data" >
        <div class="form-layout form-layout-7">
        <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                ზომები:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8 row no-gutters">
                <input class="form-control col-1 "  type="number" name="width" placeholder="სიგანე">
                  <label style="margin:0 20px;"> X </label>      
                <input class="form-control col-1 "  type="number" value="600" name="height" placeholder="სიმაღლე">
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-7 col-sm-4">
              ენა:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                <select class="form-control select2" required="required" name="lan_cat" data-placeholder="Choose Browser">
                    <option  value="1">GE</option>
                    <option  value="2">RU</option>
                    <option  value="3">FR</option>
                    <option  value="4">ES</option>
                    <option  value="5">IT</option>
                    <option  value="6">EN</option>
                </select>  
              </div>          
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                სურათი:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                    <input type="file" name="image[]" id="file-2"class="inputfile" data-multiple-caption="{count} files selected" multiple>
                    <label for="file-2" class="if-outline if-outline-info">
                    <i class="icon ion-ios-upload-outline tx-24"></i>
                    <span>ატვირთე ფოტო</span>
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

   <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/moment/moment.js"></script>
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="../lib/peity/jquery.peity.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>


    <script src="../js/bracket.js"></script>

    <script>
      $(function(){

        'use strict';

        $( '.inputfile' ).each( function()
        {
          var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

          $input.on( 'change', function( e )
          {
            var fileName = '';

            if( this.files && this.files.length > 1 )
              fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
              fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
              $label.find( 'span' ).html( fileName );
            else
              $label.html( labelVal );
          });

          // Firefox bug fix
          $input
          .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
          .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
        });

      });
    </script>
  


  </body>
</html>
<?php } ?>