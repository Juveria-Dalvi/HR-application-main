<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $functionality = $_POST["functionality"];
    $email_sender = $_POST["email_sender"];
    $recipients = $_POST["recipients"];
    $email_template = $_POST["email_template"];

    $to = $recipients;
    $subject = "Selected Functionality: $functionality";
    $message = $email_template;
    $headers = "From: $email_sender";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
}
?>
