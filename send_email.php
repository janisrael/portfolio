<?php
 
if($_POST) {
    $contact_name = "";
    $contact_email = "";
    $contact_subject = "";
    $contact_number = "";
    $contact_service = "";
      $contact_message = "";
     
    if(isset($_POST['contact_name'])) {
        $contact_name = filter_var($_POST['contact_name']);
    }
     
    if(isset($_POST['contact_email'])) {
        $contact_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['contact_email']);
        $contact_email = filter_var($contact_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['contact_subject'])) {
        $contact_subject = htmlspecialchars($_POST['contact_subject']);
    }
     
    if(isset($_POST['contact_number'])) {
        $contact_number = htmlspecialchars($_POST['contact_number']);
    }
     
    if(isset($_POST['contact_service'])) {
        $contact_service = htmlspecialchars($_POST['contact_service']);
    }

        if(isset($_POST['contact_message'])) {
        $contact_message = htmlspecialchars($_POST['contact_message']);
    }
     
    if($contact_service == "webdesign") {
        $recipient = "inquiry@janisrael.com";
    }
    else if($contact_service == "webdevelopment") {
          $recipient = "inquiry@janisrael.com";
    }
    else if($contact_service == "graphicsandillustration") {
      $recipient = "inquiry@janisrael.com";
    }
    else {
        $recipient = "inquiry@janisrael.com";
    }

    $recipient = "inquiry@janisrael.com";
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$contact_name.'</p>
                <h4>Email</h4><p>'.$contact_email.'</p>
                <h4>Subject</h4><p>'.$contact_subject.'</p>
                <h4>Contact Number</h4><p>'.$contact_number.'</p>
                <h4>Service</h4><p>'.$contact_service.'</p>
                <h4>Message</h4><p>'.$contact_message.'</p>';

            

         
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $contact_email . "\r\n";
     
    if(mail($recipient, $contact_subject, $htmlContent, $headers)) {
        echo "<p>Thank you for contacting us, $contact_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
}
?>