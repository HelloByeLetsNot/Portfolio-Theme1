<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and sanitize them
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Set up the recipient email address
    $to = "your_email@example.com"; // Replace with your email address

    // Set up the email subject
    $subject = "New Contact Form Submission";

    // Set up the email message
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Set up the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Thank you for your message. We will get back to you soon!</p>";
    } else {
        echo "<p>Oops! Something went wrong. Please try again later.</p>";
    }
} else {
    // If the form is not submitted, redirect to the contact page
    header("Location: contact.php");
    exit;
}
?>