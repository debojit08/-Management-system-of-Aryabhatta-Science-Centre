<?php

function create_topmenu($isactive){ ?>
<div class="welcomeUser">Welcome <?= $_SESSION['name']; ?> <span class="logout"><a href="logout.php">Logout</a></span></div>
	<div class="slide banner1">
	<div ><img src="fig1.png"></div>
	<div><img src="POSTER.png"></div>
	</div>
	
	<div class="bodybg">
	<div class="navbar">
			<ul>
				<li class="<?= ($isactive==1)?"active":""; ?>"><a href="welcome.php">Home</a></li>
				<li class="<?= ($isactive==2)?"active":""; ?>"><a href="enrty.php">Entry New</a></li>
				<li class="<?= ($isactive==3)?"active":""; ?>"><a href="block.php">Block Level</a></li>
				<li class="<?= ($isactive==4)?"active":""; ?>"><a href="district.php">District Level</a></li>
				<li class="<?= ($isactive==5)?"active":""; ?>"><a href="state.php">State Level</a></li>
				<li class="<?= ($isactive==6 || $isactive==7 || $isactive==8 || $isactive==9 || $isactive==10)?"active":""; ?>"><a href="#"> List</a>
				   <ul>
				   	   <li><a href="entrylist.php">Entry List</a></li>
				   	   <li><a href="blocklist.php">Block Level Winners</a></li>
				       <li><a href="districtlist.php">District Level Winners</a></li>
				       <li><a href="statelist.php">State Level Winners</a></li>
				   </ul>
				 </li>
				<li class="<?= ($isactive==11)?"active":""; ?>"><a href="awards.php">Awards</a></li>
				<li></li>
			</ul>
			
		</div>
	
	
<?php }
?>