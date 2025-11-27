<form method="POST" action="verify_otp.php">
    <label for="otp">Enter OTP:</label>
    <input type="text" id="otp" name="otp" required>
    <button type="submit">Verify OTP</button>
</form>
<?php
include 'components/connect.php';
session_start();

// Get the user input
$entered_otp = $_POST['otp'];
$generated_otp = $_SESSION['otp'];
$otp_time = $_SESSION['otp_time'];

// Check if OTP matches and hasn't expired (e.g., 5 minutes)
$otp_valid_time = 300;  // OTP valid for 5 minutes (300 seconds)

if ($entered_otp == $generated_otp && (time() - $otp_time) <= $otp_valid_time) {
    echo "OTP verified successfully!";
    // Perform further actions like registering the user, logging them in, etc.
} else {
    echo "Invalid or expired OTP.";
}
?>
