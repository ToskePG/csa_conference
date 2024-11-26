<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "borissundic@t-com.me";
    $email_subject = "Poruka sa sajta Konferencije";
     
     
    function died($error) {
        // your error code can go here
        echo "There were errors found in the form. <br /><br />";
        echo $error."<br /><br />";
        echo "Please fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['title']) ||
        !isset($_POST['firstname']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['country']) ||
        !isset($_POST['organization']) ||
        !isset($_POST['email'])) {
        died('There is a problem with the form. Please fill all fields.');      
    }
     
    $title = $_POST['title']; // required
    $firstname = $_POST['firstname']; // required
    $lastname = $_POST['lastname']; // required
    $country = $_POST['country']; // required
    $organization = $_POST['organization']; // required
    $email = $_POST['email']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address is not valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$firstname)) {
    $error_message .= 'First Name is not valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$lastname)) {
    $error_message .= 'Last Name is not valid.<br />';
  }
 /* if(strlen($comment) < 2) {
    $error_message .= 'Comment is not valid.<br />';
  }*/
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Details:\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Title: ".clean_string($title)."\n";
    $email_message .= "First Name: ".clean_string($firstname)."\n";
    $email_message .= "Last Name: ".clean_string($lastname)."\n";
    $email_message .= "Country: ".clean_string($country)."\n";
    $email_message .= "Organization: ".clean_string($organization)."\n";
    $email_message .= "E-mail: ".clean_string($email)."\n";
     
     
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us.
 
<?php
}
?>