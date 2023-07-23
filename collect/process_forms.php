<?php
// process_forms.php

// Start the session to store form data
session_start();

// Check which form was submitted and store its data in the session
if (isset($_POST["form1_submit"])) {
    $_SESSION["form1_data"] = $_POST["field_form1"];
    header("Location: form2.php"); // Redirect to the next form (form2.php)
    exit();
} elseif (isset($_POST["form2_submit"])) {
    $_SESSION["form2_data"] = $_POST["field_form2"];
    header("Location: form3.php"); // Redirect to the next form (form3.php)
    exit();
} elseif (isset($_POST["form3_submit"])) {
    $_SESSION["form3_data"] = $_POST["field_form3"];
    
    // All forms are submitted, proceed to insert data into the database

    // Insert data into the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO user (field_form1, field_form2, field_form3) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $_SESSION["form1_data"], $_SESSION["form2_data"], $_SESSION["form3_data"]);
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();

    // Clear the session data after insertion
    session_unset();
    session_destroy();

    // Redirect to a thank you page or wherever you want
    header("Location: thank_you_page.php");
    exit();
}
?>
