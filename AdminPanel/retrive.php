<!DOCTYPE html>
<html>
<head>
    <title>Displaying GIF Image</title>
    <!-- <meta http-equiv="refresh" content="5"> Refresh the page every 5 seconds -->
     
</head>
<body>
    <h1>Displaying GIF Image</h1>

    <?php
    // Database connection details
    include 'db.php';

    // Retrieve GIF image from the database
    $sql = "SELECT gif_content FROM gifs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Retrieve and display the GIF image
            $gifContent = $row['gif_content'];
            echo '<img src="data:image/gif;base64,' . base64_encode($gifContent[1]) . '"><br><br>';
        }
    } else {
        echo "No GIF images found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
