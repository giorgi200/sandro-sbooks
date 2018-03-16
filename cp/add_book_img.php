<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){

  // if (isset($_POST['cat'])){
  //   if ($_POST['categ'])       {	$ch_cat=$_POST['categ']; }

  $add_b_i ="active";
include("layout/connect.php"); /* connect database*/
$alert="";
if (isset($_GET['del'])){
	$delete_id=$_GET['del'];

        /* delete image from folder */
        $delete_image="SELECT * from $ch_cat WHERE id='$delete_id'";
	
	$result=mysqli_query($connect,$delete_image);
		while($delete_image=mysqli_fetch_array($result)){
					
		$image=$delete_img['img'];	
								
		unlink("../book/$img");
									
		}/*delete image from folder*/

	$delete="DELETE FROM `books` WHERE `books`.`id` = $delete_id;";
	$query=mysqli_query($connect,$delete);
	if ($query==true){
		$alert_g="წიგნი წაიშალა !";
		
	}
	else {$alert="წიგნი არ წაიშალა"; }
}
?>


<html lang="en">
<?php include("layout/delete_head.php"); ?>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
       <?php include ("layout/left_panel.php"); ?>

    
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
          <h4>წიგნების წაშლა</h4>
          <p style="color:red !important;" class="mg-b-0"><?php echo $alert; ?></p>
          <p style="color:green !important;" class="mg-b-0"><?php echo $alert_g; ?></p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">

          <div class="table-wrapper">
          <form >
            <div class="form-layout form-layout-7">
              <div class="row no-gutters">
                  
                  <div class="col-12 row no-gutters justify-content-center">
                    <select class="form-control select2 col-6" required="required" name="categ" >
                    <option></option>
                    <?php 
                      include("layout/connect.php"); /* connect database*/

                      $cats="SELECT * from cat ";
                      $quer=mysqli_query($connect,$cats);

                    while($cats=mysqli_fetch_array($quer)){
                      $cats_id=$cats['id'];
                      $des=$cats['cat_name'];
                      ?>
                        <option  value="<?php echo $cats_id ?>"><?php echo $des ?></option>
                    <?php }?>
                    </select>
                    <button class="btn btn-primary mg-l-30" type="submit" name="cate">კატეგორიის არჩევა</button>
                    </div>
                    </div>
                  </form> 
                  <?php if (isset($_GET['cate'])){	
								    $ch_cat=$_GET['categ'];
                  }?>
                </div><!-- row -->
              </div>
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                
                <tr>
                  <th class="wd-20p">ფოტო</th>
                  <th class="wd-15p">სათაური</th>
                  <th class="wd-15p">დაამატა</th>
                  <th class="wd-10p">დამატების დრო</th>
                  <th class="wd-10p">წაშლა</th>
                </tr>
                
              </thead>
              <tbody>
                  
                  <?php
            		
						
								include("layout/connect.php"); /* connect database*/
                                $insert="SELECT * from books WHERE cat_id = $ch_cat";
                                $query=mysqli_query($connect,$insert);
                         
                                while($insert=mysqli_fetch_array($query)){
                                    $id=$insert['id'];
                                    $title=$insert['name'];
                                    $des=$insert['des'];
                                    $img=$insert['img'];
                                    $time=$insert['time'];
    ?>
                <tr>
                    <td class="bcg" style="background:url(../book/<?php echo $img; ?>);"></td>
                    <td><?php echo $title; ?></td>
                    <td>
                       <?php echo $_SESSION['user_name'] ?>
                    </td>
                    <td><?php echo $time; ?></td>
                    <td >
                        <a href="edit_book_img.php?id=<?php echo $id;?>" class="btn btn-success ">
                            <i class=" icon ion-trash-b "></i> წიგნის დამატება
                        </a>
                    </td>
                </tr>
                                <?php }?>          
              </tbody>
            </table>
          </div><!-- table-wrapper -->
          </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php   include("layout/delete_script.php");  ?>

  </body>
</html>
                                <?php } ?>