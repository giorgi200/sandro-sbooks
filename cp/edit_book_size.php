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
    $edit_id=$_GET['edit'];
    $lan_id=$_GET['lan'];} 



if (isset($_POST['change'])){

    
    if (!empty($_POST['height']))    {	$height=$_POST['height']; }
    if (!empty($_POST['width']))    {	$width=$_POST['width']; }
    
    include ("layout/connect.php"); 

    $update="UPDATE `book_img` SET `width` = '$width', `height` = '$height' WHERE `book_img`.`lang_id` = $lan_id AND `book_id` = $edit_id";
    $result=mysqli_query($connect,$update);
    if ( $result==true){
        
        $alert_g=" შეიცვალა! ";
        
        
    }else{
        $alert=" არ შეიცვალა! ";
        
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
          <h4>ზომების შეცვლა</h4>
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
              <form action="edit_book_size.php?edit=<?php echo $edit_id; ?>&lan=<?php echo $lan_id; ?>" method="post">
                <div class="form-group row justify-content-center">
                  <input class="form-control fc-outline-dark col-3 "  type="number" name="width" placeholder="სიგანე">
                    <label style="margin:0 20px; line-height: 40px;"> X </label>      
                  <input class="form-control fc-outline-dark col-3 "  type="number" value="600" name="height" placeholder="სიმაღლე">                 
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
  


  </body>
</html>
<?php } ?>