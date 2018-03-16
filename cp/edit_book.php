<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){
?>

<?php
if (isset($_GET['edit'])){
    $edit_id=$_GET['edit'];
    $edit_table=$_GET['tab'];} 	
    
$alert="";
$alert_format="";
$alert_size="";
$alert_upload="";

if (isset($_POST['add'])){
        
	if (!empty($_POST['name']))    {$title=$_POST['name']; }

	if ($_POST['gelink'])    {	$ge=$_POST['gelink']; }
	if ($_POST['itlink'])    {	$it=$_POST['itlink']; }
	if ($_POST['enlink'])    {	$en=$_POST['enlink']; }
	if ($_POST['rulink'])    {	$ru=$_POST['rulink']; }
	if ($_POST['eslink'])    {	$es=$_POST['eslink']; }
	if ($_POST['frlink'])    {	$fr=$_POST['frlink']; }
    if ($_POST['des'])    {	$dest=$_POST['des']; }
      
  
    include("layout/connect.php"); /* connect database*/


    
    $upload_time=date('Y-m-d');
    $update="UPDATE `books` SET `name` = '$title', `des` = '$dest', `gelink` = '$ge', `enlink` = '$en', `eslink` = '$es', `rulink` = '$ru', `frlink` = '$fr', `itlink` = '$it'  WHERE `id` = $edit_id;";
    $result=mysqli_query($connect,$update);
    if ($result==true){
        
        $alert_g=" რედაქტირებულია !";
        
        
    }else{
        $alert=" არ დარედაქტირდა ! ";
        
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
          <h4>წიგნების რედაქტირება</h4>
          <p style="color:red;"><?php echo $alert;?>   </p>
          <p style="color:green;"><?php echo $alert_g;?>  </p>
          <p style="color:red;"><?php echo $alert_format;?>  </p>
          <p style="color:red;"><?php echo $alert_upload;?>  </p>
          <p style="color:red;"><?php echo $alert_size;?>  </p>


        </div>
      </div><!-- d-flex -->
        <?php 
                include("layout/connect.php"); /* connect database*/

            $insert="SELECT * from `books` WHERE  `id` = $edit_id";
            $query=mysqli_query($connect,$insert);
     
            while($insert=mysqli_fetch_array($query)){
                $ch_id=$insert['id'];
                $ch_title=$insert['name'];
                $ch_des=$insert['des'];
                $ch_gelink=$insert['gelink'];
                $ch_enlink=$insert['enlink'];
                $ch_eslink=$insert['eslink'];
                $ch_rulink=$insert['rulink'];
                $ch_frlink=$insert['frlink'];
                $ch_itlink=$insert['itlink'];;
        ?>
      <div class="br-pagebody">
        <form action="edit_book.php<?php echo "?edit=$edit_id&tab=$edit_table" ?>" method="post" id="file-upload-form" class="uploader" name="form" enctype="multipart/form-data" >
        <div class="form-layout form-layout-7">
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                სათაური:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
                <input class="form-control" type="text" value="<?php echo $ch_title; ?>" name="name" placeholder="დაამატე სათაური">
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row no-gutters">
              <div class="col-5 col-sm-4">
                აღწერა:
              </div><!-- col-4 -->
              <div class="col-7 col-sm-8">
              <textarea rows="6" class="form-control form-control-dark"  name="des" placeholder="დაამატე აღწერა..."><?php echo $ch_des; ?></textarea>
              
            </div><!-- col-8 -->
            <div class="col-12">
                ლინკები
              </div>
            </div><!-- row -->
            
            <div class="row no-gutters">
              <div class="col-1">
                GE
              </div><!-- col-4 -->
              <div class="col-11">
                <input class="form-control" type="text" name="gelink" value="<?php echo $ch_gelink; ?>" placeholder="დაამატე ლინკი...">
              </div><!-- row -->
          </div>   
          <div class="row no-gutters">
              <div class="col-1">
                IT
              </div><!-- col-4 -->
              <div class="col-11">
                <input class="form-control" type="text" name="itlink" value="<?php echo $ch_itlink; ?>" placeholder="დაამატე ლინკი...">
              </div><!-- row -->
          </div> 
          <div class="row no-gutters">
              <div class="col-1">
                EN
              </div><!-- col-4 -->
              <div class="col-11">
                <input class="form-control" type="text" name="enlink" value="<?php echo $ch_enlink; ?>" placeholder="დაამატე ლინკი...">
              </div><!-- row -->
          </div> 
          <div class="row no-gutters">
              <div class="col-1">
                RU
              </div><!-- col-4 -->
              <div class="col-11">
                <input class="form-control" type="text" name="rulink" value="<?php echo $ch_rulink; ?>" placeholder="დაამატე ლინკი...">
              </div><!-- row -->
          </div> 
          <div class="row no-gutters">
              <div class="col-1">
                ES
              </div><!-- col-4 -->
              <div class="col-11">
                <input class="form-control" type="text" name="eslink" value="<?php echo $ch_eslink; ?>" placeholder="დაამატე ლინკი...">
              </div><!-- row -->
          </div> 
          <div class="row no-gutters">
              <div class="col-1">
                FR
              </div><!-- col-4 -->
              <div class="col-11">
                <input class="form-control" type="text" name="frlink" value="<?php echo $ch_frlink; ?>" placeholder="დაამატე ლინკი...">
              </div><!-- row -->
          </div> 
          <div class="row no-gutters ">
            <div class="form-layout-footer col-12">
              <button class="btn btn-primary" type="submit" name="add">რედაქტირება</button>
            </div><!-- form-layout-footer -->
          </div>
          
        </form>
            <?php  }?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php include ("layout/script.php"); ?>


  </body>
</html>
<?php } ?>