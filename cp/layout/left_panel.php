<?php 
include("layout/connect.php"); /* connect database*/
$insert="SELECT * from cp_user ";
$query=mysqli_query($connect,$insert);
while($insert=mysqli_fetch_array($query)){

    $name=$insert['name'];
    $img=$insert['img'];
    ?>
?>
<div class="br-logo">
        <a href="index.php"><span>[</span>Sandros <i>books</i><span>]</span></a>
    </div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label">ნავიგაცია</label>
      <ul class="br-sideleft-menu overflow-hidden">
        <li class="br-menu-item">
          <a href="index.php" class="br-menu-link <?php  echo $main;?>">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">სამართავი პანელი</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="add_books.php" class="br-menu-link <?php  echo $add;?>">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">წიგნების დამატება</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="add_book_img.php" class="br-menu-link <?php  echo $add_b_i;?>">
            <i class="menu-item-icon icon ion-ios-book-outline tx-24"></i>
            <span class="menu-item-label">წიგნები</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="books_img_edit.php" class="br-menu-link <?php  echo $add_b_2;?>">
            <i class="menu-item-icon icon ion-edit tx-24"></i>
            <span class="menu-item-label">წიგნების რედაქტირება</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="add_table.php" class="br-menu-link <?php  echo $categ;?>">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
            <span class="menu-item-label">კატეგორიის დამატება</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="delete_books.php" class="br-menu-link <?php  echo $del_books;?>">
            <i class="menu-item-icon icon ion-trash-b tx-24"></i>
            <span class="menu-item-label">წიგნების წაშლა</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="delete_table.php" class="br-menu-link <?php  echo $del_categ;?>">
            <i class="menu-item-icon icon ion-trash-b tx-24"></i>
            <span class="menu-item-label">კატეგორიის წაშლა</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="edit_books.php" class="br-menu-link <?php  echo $edit_books;?>">
            <i class="menu-item-icon icon ion-edit tx-24"></i>
            <span class="menu-item-label">წიგნის რედაქტირება</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        
        <li class="br-menu-item">
          <a href="../index.php" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
            <span class="menu-item-label">Site</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->

      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          
          
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <div style="Height:32px !important; background:url(admin_img/<?php echo $img ?>);" class="wd-32 rounded-circle bac" ></div>
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><div style="Height:80px !important; margin:0 auto; background:url(admin_img/<?php echo $img ?>);" src="admin_img/<?php echo $img ?>)" class="wd-80 rounded-circle bac" ></div></a>
                <h6 class="logged-fullname"><?php echo $name ?></h6>
              </div>              
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="change_img.php"><i class="icon ion-ios-person"></i> პროფილის სურათი</a></li>
                <li><a href="password.php"><i class="icon ion-key"></i> პაროლის შეცვლა</a></li>
                <li><a href="logout.php"><i class="icon ion-power"></i> გასვლა</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-chatboxes-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="br-sideright">
      <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#contacts"><i class="icon ion-ios-contact-outline tx-24"></i></a>
        </li>
        
        
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto active" id="contacts" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">შეტყობინებები</label>
          <div class="contact-list pd-x-10">
            <a href="" class="contact-list-link new">
              <div class="d-flex">
                
                <div class="contact-person">
                  <p>Marilyn Tarter</p>
                  <span>Clemson</span>
                </div>
                <span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle">
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
          </div><!-- contact-list -->
        </div><!-- #contacts -->    
      </div><!-- tab-content -->
    </div><!-- br-sideright -->
  <?php } ?>