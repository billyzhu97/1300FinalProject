<?php
  //starts sessions and grabs variables
  session_start();
  $name = $_SESSION['name'];

  unset ($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php";?>
<body>
  <?php include "includes/navigation.php";?>
  <div class = "container">
    <h2 id="submittedText">
      Thank you <?php echo($name);?>, your comment has been submitted. We will get back to you as
      soon as possible!
    </h2>
  </div>
  <?php include "includes/footer.php";?>
</body>
</html>
