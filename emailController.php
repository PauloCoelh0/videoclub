<?php 


require 'vendor/autoload.php';
 @session_start();

// Create the transporter 

$transport = (new Swift_SmtpTransport('smtp.office365.com', 587,'TLS'))
    ->setUsername('videoclubestg@outlook.com')
    ->setPassword('videoclub123');

    $mailer = new Swift_Mailer($transport);

    function sendVerificationEmail($userEmail, $token)
{
  
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>
    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
        <a href="http://localhost/videoclub/users_area/user_login.php?token=' . $token . '">Verify Email!</a>
      </div>
    </body>
    </html>';

    $message = (new Swift_Message('Verify your email'))
        ->setFrom('videoclubestg@outlook.com')
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}


function sendPasswordResetLink($userEmail, $token) {

  $transport = (new Swift_SmtpTransport('smtp.office365.com', 587,'TLS'))
    ->setUsername('videoclubestg@outlook.com')
    ->setPassword('videoclub123');

    $mailer = new Swift_Mailer($transport);


    global $mailer;

    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
    </head>
    <body>
      <div class="wrapper">
        <p>Hello there, please click the link bellow to reset your password:.</p>
        <a href="http://localhost/videoclub/users_area/user_login.php?password-token=' . $token . '">Reset your password!</a>
      </div>
    </body>
    </html>';

    $message = (new Swift_Message('Reset your password'))
        ->setFrom('videoclubestg@outlook.com')
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}


