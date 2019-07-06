<?php session_start();
include("menu.php");
if(!isset($_SESSION['id'])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>navbar</title>
	<link rel="stylesheet" type="text/css" href="innerstyle.css?version=1.0.1">
	<link rel="stylesheet" type="text/css" href="js/slick.css">
	
</head>
<body>
<div class="content">
<?php create_topmenu(1); ?>

<div>
	
</div>

<div class="slide1">
	<div ><img src="aa.jpg">
	<img src="ab.jpg">
	<img src="cd.jpg"></div>
	<div><img src="gh.jpg">
     <img src="ef.jpg">
	<img src="ig.jpg"></div>
	</div>
	
</div>

</div>
	
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/slick.js"></script>
<script>
$(document).ready(function(){
      $('.slide').slick({
        autoplay: true,
        accessibility: false,
        arrows: false,
        autoplaySpeed: 3000
      });

      $('.slide1').slick({
        autoplay: true,
        accessibility: false,
        arrows: false,
        autoplaySpeed: 3000
      });
    });

</script>

</body>
</html>