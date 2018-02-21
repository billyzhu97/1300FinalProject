<?php
$submit = $_REQUEST["submit"];
$HIDDEN_ERROR_CLASS = "hiddenError";

//Uses the CSV comment system from lab, KeboolaCSV
// Include files for CSV storage
include("includes/csvStorage.php");
// Load the comments file
$csvFile = csvGetFile('data/comments.csv');


if (isset($submit)) {

  $name = htmlspecialchars(trim($_REQUEST["user_name"]));
  if ( !empty($name) ) {
    $nameValid = true;
  } else {
    $nameValid = false;
  }


  $email = htmlspecialchars(trim($_REQUEST["user_mail"]));
  if ( filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
    $emailValid = true;
  } else {
    $emailValid = false;
  }

  $status = $_REQUEST["status"];
    if(!empty($status)){
      $statusValid = true;
    } else {
      $statusValid = false;
    }


  $message = htmlspecialchars(trim($_REQUEST["message"]));
  if(!empty($message)){
    $messageValid = true;
  } else {
    $messageValid = false;
  }


  $formValid = $nameValid && $emailValid && $messageValid && $statusValid;

  if ($formValid) {
    session_start();
    $_SESSION['name'] = $name;

    // create an array with the comment's information
    $newComment = array($name, $email, $status, $message);

    // save new comment
    csvAppendToFile($csvFile, $newComment);

    $to = "cornellmedicinephilanthropy@gmail.com";
    $subject = "Email from " . $name . " on CAMP Website";
    $emailMessage = $name . " commented on your page." . "\n" . "His/her email is: ". $email . "\n" .
    "His/her status is: ". $status . "\n" .  "\n" . "His/her message is: " . "\n" . $message;
    mail($to,$subject,$emailMessage);

    header("Location: submitted.php");
    return;
  }
} else {

  // no form submitted
  $nameValid = true;
  $emailValid = true;
  $messageValid = true;
  $statusValid = true;
}
?>

<!DOCTYPE html>
<html>
<?php include "includes/head.php";?>
<body>

  <?php include "includes/navigation.php";?>
  <h1>Reach Us</h1>
  <div class="container">

    <div class="showHideLabel" id="formLabel">
      <h2>Apply</h2>
      <span class="caret">&#9660;</span>
    </div>

    <div id="appLink">
      <!--Form from https://www.flaticon.com/free-icon/forms_300231#term=forms&page=1&position=3-->
      <img id="formIcon" src="images/icons/form.svg" alt="forms icon"/>
      <a href="https://docs.google.com/forms/d/e/1FAIpQLSdG2KoHXu74qx9re9JMYzrsbBYGew169mQK5xJO0ZpMTpQQ2A/viewform?usp=sf_link" target="_blank">
        Press here to be a member of the CAMP family!
      </a>
    </div>

    <div class="showHideLabel" id="messageLabel">
      <h2>Comments/Questions</h2>
      <span class="caret">&#9660;</span>
    </div>

    <form id="commentForm" action="/apply.php" method="post" novalidate>

      <label for="name">
        <strong>Name:</strong>
        <span class="asterisk">*</span>
        <span class="errorMessage  <?php if ($nameValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="nameError">
          Please submit a name
        </span>
      </label>
      <input type="text" id="name" name="user_name" value="<?php echo(htmlspecialchars($name));?>" required>

      <label for="mail">
        <strong>E-mail:</strong>
        <span class="asterisk">*</span>
        <span class="errorMessage  <?php if ($emailValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="emailError">
          Please submit a valid email address
        </span>
      </label>
      <input type="email" id="mail" name="user_mail" value="<?php echo(htmlspecialchars($email));?>" required>

      <label for="status">
        <strong>I am a:</strong>
        <span class="asterisk">*</span>
        <span class="errorMessage <?php if ($statusValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="statusError">
          Please select one of the subjects below
        </span>
      </label>
      <input type="radio" class="status" name="status" value="student" <?php if(($status)=='student') echo 'checked';?> required> Student
      <input type="radio" class="status" name="status" value="staff" <?php if(($status)=='staff') echo 'checked';?>> Faculty/Staff
      <input type="radio" class="status" name="status" value="alumni" <?php if(($status)=='alumni') echo 'checked';?>> Alumni
      <input type="radio" class="status" name="status" value="business" <?php if(($status)=='business') echo 'checked';?>> Local Business
      <input type="radio" class="status" name="status" value="other" <?php if(($status)=='other') echo 'checked';?>> Other

      <label for="comment">
        <strong>Message/Comments:</strong>
        <span class="asterisk">*</span>
        <span class="errorMessage  <?php if ($messageValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="messageError">
          Please submit a message
        </span>
      </label>
      <textarea id="comment" name="message" required><?php echo(htmlspecialchars($message));?></textarea>

      <input id="submitButton" type="submit" name="submit" value="Submit">
    </form>
  </div>




  <?php include "includes/footer.php";?>
</body>
</html>
