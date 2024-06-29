<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_from = 'info@yourwebsite.com';

$email_subject = 'New Form Submission';

$email_body = "User Name: $name.\n".
                "User Email: $visitor_email.\n".
                    "Subject : $subject.\n".
                    "User Message: $message.\n";

$to = 'ubrchristian@gmail.com';

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

header("Location:contact.html")

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

    // Validate email
    if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Email details
    $email_from = 'info@yourwebsite.com';
    $email_subject = 'New Form Submission';
    $email_body = "User Name: $name.\n".
                    "User Email: $visitor_email.\n".
                    "Subject: $subject.\n".
                    "User Message: $message.\n";

    $to = 'ubrchristian@gmail.com';
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: contact.html");
        exit;
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>