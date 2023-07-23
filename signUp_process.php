<?php
// Ensure that the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"], PASSWORD_DEFAULT; // Hash the password for security

    // Database connection parameters
    include 'AdminPanel/db.php';
    // Prepare and execute the SQL insert query
    $sql = "INSERT INTO register (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
    die("Error in SQL: " . $conn->error);
    }
    $stmt->bind_param("sss", $username, $email, $password);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
