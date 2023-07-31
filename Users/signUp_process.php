<?php
// Ensure that the form has been submitted

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Hash the password for security

    // Database connection parameters
    include '../AdminPanel/db.php';

    $check = mysqli_num_rows(mysqli_query($conn,"Select * from register where email = '$email' OR username ='$username'"));
    if($check >0 ){
        echo "email already existed";
    }else{


  
    // Prepare and execute the SQL insert query
    $sql = "INSERT INTO register (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
    die("Error in SQL: " . $conn->error);
    }
    $stmt->bind_param("sss", $username, $email, $password);
    
    if ($stmt->execute()) {
        $email = $_POST["email"];
         $sql = "SELECT email FROM register WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
    // User found, proceed with sending OTP

    // Include the PHPMailer library
    include_once("SMTP/class.phpmailer.php");
    include_once("SMTP/class.smtp.php");
    // require 'vendor/autoload.php';

    // Function to generate OTP
    function generateOTP()
    {
        return mt_rand(100000, 999999); // 6-digit OTP
    }

    // Function to send OTP via email
    function sendOTP($userEmail, $otp)
    {
        // Instantiate PHPMailer class
        $mail = new PHPMailer;

        // Set up SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
        $mail->Port = 587; // Replace with your SMTP server port
        $mail->SMTPAuth = true;
        $mail->Username = 'mbushrestha@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'ztefiokrkemcfkuj'; // Replace with your SMTP password
        $mail->SMTPSecure = 'tls'; // Use 'ssl' if your SMTP server requires SSL/TLS

        // Set up the email details
        $mail->setFrom('noreply@example.com', 'Your Application'); // Replace with your application's noreply email address
        $mail->addAddress($userEmail); // Replace with recipient's email address
        $mail->Subject = 'OTP for Login'; // Email subject
        $mail->Body = 'Your OTP is: ' . $otp; // Email content

        // Send the email
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }

    // Fetch the user's email from the database
    $row = $result->fetch_assoc();
    $userEmail = $row['email'];

    $otp = generateOTP();
    if (sendOTP($userEmail, $otp)) {
       $insert_query = mysqli_query($conn,"insert into tbl_otp_check set otp='$otp', is_expired='0'");
      header('location:otpverify.php');
    } else {
        echo 'Error sending OTP to ' . $userEmail;
    }
} else {
    echo 'Email not found in the database. Please try again or register an account.';
}
}
    

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
}
?>
