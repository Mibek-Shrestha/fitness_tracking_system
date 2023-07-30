<?php
// next_file.php

// Assuming you have the database credentials defined somewhere
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Step 1: Get the ID from the URL query parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Step 2: Establish a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Replace 'users' with the name of your database table
        

        // Step 3: Prepare and execute the SQL query to retrieve the age using the ID
        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->bind_param('i', $id); // 'i' indicates an integer data type for the ID parameter
        $stmt->execute();
        $result = $stmt->get_result();

        // Step 4: Check if a matching record was found
        if ($result->num_rows > 0) {
            // Fetch the age from the result set
            while ($row = mysqli_fetch_assoc($result)) {
        // Assuming your 'keepfit' table has columns like 'id', 'name', 'description', etc.
      $name = $row['goals'];
       $age = $row['age'];
        $weight =  $row['weight'];
        $height = $row['height'];
        if ($name == 'build_muscle') {
            if ($age > 20 && $age < 30 && $weight > 50 && $weight < 70 && $height > 5.5) {
            echo "Exercise Suggestions:\n";
           } elseif ($age > 30 && $age < 70 && $weight > 60 && $weight < 80 && $height > 7) {
        
           echo "- Cardio exercises like jogging, swimming, or dancing.\n";
         } else {
        echo "Invalid user data. Please enter 'stay first' or 'lose weight' as user data.\n";
      }
    } 


    }
        } else {
            echo "No record found with ID: " . $id;
        }

        // Close the prepared statement and the database connection
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID not provided in the URL.";
}
?>
