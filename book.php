<?php
  if (isset($_GET['lang'])){
    $lang_id=$_GET['lang']; 
    $book_id=$_GET['book'];
	$book_name=$_GET['b_name'];} 

?>
<!doctype html>
<html lang="en">
<head>
	<title><?php echo $book_name; ?></title>
	<meta charset="utf-8">
	<script  src="extras/jquery.min.1.7.js"></script>
	<script  src="extras/modernizr.2.5.3.min.js"></script>
</head>
<body style="background-color: #e7e7e7 !important">
<div class="flipbook-viewport">
	<div class="container">
		<?php 
			include("cp/layout/connect.php"); /* connect database */

			$fw_insert="SELECT * FROM book_img WHERE book_id = $book_id;";
			$fw_query=mysqli_query($connect,$fw_insert);
	
			while($fw_insert=mysqli_fetch_array($fw_query)){
				$height=$fw_insert['height'];
				$width=$fw_insert['width'];
				$page=$fw_insert['page_id'];
				$l_id=$fw_insert['lang_id'];
				?>
			<?php if($page == 1 && $l_id == $lang_id){ echo '<div class="flipbook" style="width:' . $width * 2 . 'px;height:' . $height . 'px;left:-' . $width . 'px;top:-' . $height / 2 . 'px;">'; }}?>
			<?php 
			$insert="SELECT * from book_img WHERE book_id = $book_id";
			$query=mysqli_query($connect,$insert);
	 
			while($insert=mysqli_fetch_array($query)){
				$img=$insert['img'];
				$lang=$insert['lang_id'];


				?>
				 <?php if($lang == $lang_id){ echo '<div style="background-image:url(book/full/' . $img . ') "></div>';} ?>
			<?php } ?>
		</div>
	</div>
</div>


<script >

function loadApp() {

	// Create the flipbook

	$('.flipbook').turn({
			// Width

			width:1050,
			
			// Height

			height:600,

			// Elevation

			elevation: 50,
			
			// Enable gradients

			gradients: true,
			
			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['lib/turn.js'],
	nope: ['lib/turn.html4.min.js'],
	both: ['css/basic.css'],
	complete: loadApp
});

</script>

</body>
</html>