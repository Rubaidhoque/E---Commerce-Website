<form method="POST" action="send_otp.php">

    <label for="email">Enter your email address:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Send OTP</button>
</form>
<?php
include 'components/connect.php';
session_start();

// Get user email
$email = $_POST['email'];

// Generate a random OTP
$otp = rand(100000, 999999);

// Store the OTP in session (you can also store it in the database if needed)
$_SESSION['otp'] = $otp;
$_SESSION['otp_time'] = time();  // Store time to expire OTP after a set period
$_SESSION['email'] = $email;

// Set up the email content
$subject = "Your OTP Code";
$message = "Your OTP is: $otp\nThis OTP is valid for 5 minutes.";
$headers = "From: rubaid101hoque@gmail.com";

// Send email using PHP's mail() function (for simple demonstration)
if (mail($email, $subject, $message, $headers)) {
    echo "OTP sent successfully to $email.";
    // Redirect to OTP verification page
    header('Location: verify_otp.php');
} else {
    echo "Failed to send OTP. Please try again.";
}
?>
