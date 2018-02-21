<?php
  $curr_page = basename($_SERVER['PHP_SELF']);
 ?>

<!--Consistent Banner and navigation bar throughout all pages-->
<div id="banner">
  <img src="images/banner.png" alt="Cornell Banner">
</div>
<div class="navbar">
  <img class = "camplogo" src="images/campLogo.png" alt="CAMP Logo">
  <a class="shared <?php if($curr_page=="index.php")echo("highlighted");?>" href="index.php" >Home</a>
  <a class="shared <?php if($curr_page=="about.php")echo("highlighted");?>" href="about.php">About</a>
  <a class="shared <?php if($curr_page=="members.php")echo("highlighted");?>" href="members.php">Members</a>
  <a class="shared <?php if($curr_page=="events.php")echo("highlighted");?>" href="events.php">Events</a>
  <div class="dropdown <?php if($curr_page=="gala1.php"||$curr_page=="gala2.php"||$curr_page=="hunger.php")echo("highlighted");?>">
    <button class="dropbtn ">Gallery<span id="caret">&#9660;</span></button>
    <div class="dropdown-content">
      <a id="gala1" href="gala1.php">First Annual Gala</a>
      <a href="gala2.php">Second Annual Gala</a>
      <a href="hunger.php">Hunger Awareness Week</a>
    </div>
  </div>
  <a class="shared <?php if($curr_page=="apply.php")echo("highlighted");?>" href="apply.php">Reach Us</a>
  <div id="mobile_navbar">
    <a href="gala1.php" class="<?php if($curr_page=="gala1.php")echo("highlighted");?>">1st Annual Gala</a>
    <a href="gala2.php" class="<?php if($curr_page=="gala2.php")echo("highlighted");?>">2nd Annual Gala</a>
    <a href="hunger.php" class="<?php if($curr_page=="gala3.php")echo("highlighted");?>">Hunger Awareness Week</a>
  </div>
</div>
