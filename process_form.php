<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate form data
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'Please fill in all fields.';
    exit;
  }

  // Set recipient email address
  $to = 'masaki.onuki.0806@gmail.com';

  // Set email subject
  $subject = 'New message from ' . $name . ': ' . $subject;

  // Set email body
  $body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";

  // Set headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";

  // Send email
  if (mail($to, $subject, $body, $headers)) {
    echo 'Thank you for your message!';
  } else {
    echo 'An error occurred while sending your message.';
  }
}

?>