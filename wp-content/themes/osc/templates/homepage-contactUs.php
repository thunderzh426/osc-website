<?php
$nameError = '';
$emailError = '';
$msgError = '';
$headers = '';
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = __('Please enter your name.', 'one-page');
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = __('Please enter your email address.', 'one-page');
        $hasError = true;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailError = __('You entered an invalid email address.', 'one-page');
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['msg']) === '') {
        $msgError = __('Please enter a message.', 'one-page');
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $msg = stripslashes(trim($_POST['msg']));
        } else {
            $msg = trim($_POST['msg']);
        }
    }
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[PHP Snippets] From ' . $name;
        $body = __('Name:', 'one-page') . $name . "<br/>" . __('Email:', 'one-page') . $email . "<br/>" . __('Message:', 'one-page') . $msg;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= __('From:', 'one-page') . $name . ' <' . $emailTo . '>' . "\r\n" . __('Reply-To:', 'one-page') . $email;
        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>

<!-- contact Section -->

<!-- /contact Section -->
