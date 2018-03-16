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

if (isset($_GET['id'])){
    $edit_id=$_GET['id'];
    $lang_id=$_GET['lan'];
} 

if (isset($_POST['image'])){
    include("layout/connect.php"); 
    $alert_upload="if working";
    
    $fw_insert="SELECT * FROM book_img WHERE `book_id` = $edit_id AND `lang_id` = $lang_id;";
	$fw_query=mysqli_query($connect,$fw_insert);

	while($fw_insert=mysqli_fetch_array($fw_query)){
        $fw_img=$fw_insert['img'];

        unlink('../book/full/' . $fw_img);
        }

    $total = count($_FILES['image']['name']);

    for($i=0; $i<$total; $i++) {
        $alert_size="for მუშაობს";

        if (!empty($_FILES['image'])){
            $image=$_FILES['image']['name'][$i]; 
            $image_tmp=$_FILES['image']['tmp_name'][$i];
            $target_file = "../book/full/" . basename($image);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $new_name=date('Y-m-d_H-i')."_$i".time().".$imageFileType";
            $uploadOk = 1;}



        if ($uploadOk == 0) {
        
            $alert_upload="ფაილი არ აიტვირთა !";
        
        } else {        
         
            move_uploaded_file($image_tmp,"../book/full/$new_name");
        
        }
    

        $i_p = $i + 1;
        $insert="UPDATE `book_img` SET `img` = '$new_name' WHERE `book_img`.`book_id` = $edit_id AND `page_id` = $i_p AND `lang_id` = $lang_id";
        $result=mysqli_query($connect,$insert);
        if ( $result==true){  

            $alert_g=" დამატებულია $total სურათი!";
        
        } else {
        
            $alert=" არ დაემატა !";
        
        }
        
    }
  
}

?>

<!DOCTYPE html>
<html lang="ka">
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
            <h4>სურათის შეცვლა</h4>
            <p style="color:red;"><?php echo $alert;?></p>
            <p style="color:green;"><?php echo $alert_g;?></p>
            <p style="color:red;"><?php echo $alert_format;?></p>
            <p style="color:red;"><?php echo $alert_upload;?></p>
            <p style="color:red;"><?php echo $alert_size;?></p>
        </div>
    </div>
    <div class="br-pagebody col-6" style="margin:50px auto;">
        <div class="br-section-wrapper">
            <div class="table-wrapper ">
                <form action="edit_flip_book.php?id=<?php echo "$edit_id&lan=$lang_id"?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row justify-content-center">
                        <input type="file" name="image[]" id="file-2"class="inputfile" data-multiple-caption="არჩეულია {count} სურათი" multiple>
                        <label for="file-2" class="if-outline if-outline-info">
                            <i class="icon ion-ios-upload-outline tx-24"></i>
                            <span>ატვირთე ფოტო</span>
                        </label>                 
                    </div>
                    <button style="margin:0 auto;" type="submit" name="change" class="btn btn-info btn-block col-4">შეცვლა</button>
                </form>
            </div>
        </div>
    </div>
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
  
<?php } ?>
</body>
</html>