<?php
session_start();
if (!isset($_SESSION['user_name'])){
header ("location: login.php");
}
elseif($_SESSION['user_name']=="sandro"){

  // if (isset($_POST['cat'])){
  //   if ($_POST['categ'])       {	$ch_cat=$_POST['categ']; }

$add_b_2 = "active";
include("layout/connect.php"); /* connect database*/

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
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
          <h4>წიგნების რედაქტირება</h4>
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
                    <select class="form-control select2 col-6" required="required" name="book_id" >
                    <option></option>
                    <?php 
                      include("layout/connect.php"); /* connect database*/

                      $insert="SELECT * from books";
                      $query=mysqli_query($connect,$insert);
               
                      while($insert=mysqli_fetch_array($query)){
                        $id=$insert['id'];
                        $title=$insert['name'];
                      ?>
                        <option value="<?php echo $id ?>"><?php echo $title ?></option>
                    <?php }?>
                    </select>
                    <button class="btn btn-primary mg-l-30" type="submit" >კატეგორიის არჩევა</button>
                    </div>
                    </div>
                  </form> 
                  <?php if (isset($_GET['book_id'])){	
								    $book_id=$_GET['book_id'];
                  }?>
                </div><!-- row -->
              </div>
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                
                <tr>
                  <th class="wd-5p">ფოტო</th>
                  <th class="wd-15p">სათაური</th>
                  <th class="wd-5p">ენა</th>
                  <th class="wd-20p">რედაქტირება</th>
                </tr>
                
              </thead>
              <tbody>
                  
                  <?php
            		
                  $insert="SELECT * from book_img WHERE book_id = $book_id";
                  $query=mysqli_query($connect,$insert);
              
                  while($insert=mysqli_fetch_array($query)){
                    $img=$insert['img'];
                    $lang=$insert['lang_id'];
                    $page=$insert['page_id'];

                  if($page == 1 ){?>
                <tr>
                    <td class="bcg" style="background:url(../book/full/<?php echo $img; ?>);"></td>
                    <td><?php echo $title; ?></td>
                    <td>
                      <?php if ($page == 1 && $lang == 1) { echo '<span><a target="_blank" href="../book.php?lang=1&book=' . $id . '">GE</a></span>'; }?>
                      <?php if ($page == 1 && $lang == 2) { echo '<span><a target="_blank" href="../book.php?lang=2&book=' . $id . '">RU</a></span>'; }?>
                      <?php if ($page == 1 && $lang == 3) { echo '<span><a target="_blank" href="../book.php?lang=3&book=' . $id . '">FR</a></span>'; }?>
                      <?php if ($page == 1 && $lang == 4) { echo '<span><a target="_blank" href="../book.php?lang=4&book=' . $id . '">ES</a></span>'; }?>
                      <?php if ($page == 1 && $lang == 5) { echo '<span><a target="_blank" href="../book.php?lang=5&book=' . $id . '">IT</a></span>'; }?>
                      <?php if ($page == 1 && $lang == 6) { echo '<span><a target="_blank" href="../book.php?lang=6&book=' . $id . '">EN</a></span>'; } ?>
                    </td>
                    <td >
                        <a href="edit_book_size.php?edit=<?php echo "$id&lan=$lang"?>" class="btn btn-info ">
                          <i class=" icon ion-qr-scanner "></i> ზომის შეცვლა
                        </a> 
                        <a href="edit_flip_book.php?id=<?php echo "$id&lan=$lang"?>" class="btn btn-info ">
                          <i class=" icon ion-images "></i> სურათების შეცვლა 
                        </a>
                    </td>
                </tr>
                                <?php }}?>          
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