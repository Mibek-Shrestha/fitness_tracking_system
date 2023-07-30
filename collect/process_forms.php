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
    header("Location: form4.php"); // Redirect to the next form (form3.php)
    exit();
} elseif (isset($_POST["for_height"])) {
    $_SESSION["heightData"] = $_POST["height"];
    header("Location: form5.php"); // Redirect to the next form (form3.php)
    exit();
} 
elseif (isset($_POST["for_weight"])) {
    $_SESSION["weightData"] = $_POST["weight"];
    header("Location: form3.php"); // Redirect to the next form (form3.php)
    exit();
} 
elseif (isset($_POST["Submit_age"])) {
    $_SESSION["ageData"] = $_POST["age"];
    
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
    $sql = "INSERT INTO user (goals, gender,height,weight,age) VALUES (?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $_SESSION["form1_data"], $_SESSION["form2_data"],$_SESSION["heightData"], $_SESSION["weightData"],$_SESSION["ageData"] );

    if ($stmt->execute()) {
        // Step 4: Get the inserted ID
        $insertedId = $conn->insert_id;

        // Step 5: Redirect to the next file with the inserted ID as a query parameter
        header("Location: output.php?id=" . urlencode($insertedId));
        exit(); // Make sure to include exit after the header() function to stop further execution
    } else {
        echo "Error: " . $stmt->error;
    }


    // Close the connection
    $stmt->close();
    $conn->close();

    // Clear the session data after insertion
    session_unset();
    session_destroy();

    // Redirect to a thank you page or wherever you want
    
    exit();
}
?>
