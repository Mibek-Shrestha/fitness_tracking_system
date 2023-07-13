


      <?php
    // Database connection details
    $id = $_GET['updateid'];
    include 'AdminPanel/db.php';

    // Retrieve GIF image from the database
  $sql = "SELECT * FROM exercise where id = $id";
 

$result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if ($result) {
    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);

    // Use the data as needed
    if ($row) {
        echo "Card ID: " . $row['title'];

        // ...
    } else {
        echo "No card found";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>