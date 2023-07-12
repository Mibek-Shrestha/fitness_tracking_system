<!DOCTYPE html>
<html>
<head>
    <title>GIF Upload Form</title>
</head>
<body>
    <h1>GIF Upload Form</h1>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        include 'db.php';

        // File upload handling
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["gifFile"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is a valid GIF image
        $check = getimagesize($_FILES["gifFile"]["tmp_name"]);
        if ($check === false || $imageFileType !== "gif") {
            echo "Invalid file format. Please upload a GIF image.";
        } else {
            // Read the content of the GIF file
            $gifContent = file_get_contents($_FILES["gifFile"]["tmp_name"]);
            $gifContent = $conn->real_escape_string($gifContent);

            // Insert the GIF file into the database
            $sql = "INSERT INTO gifs (gif_content) VALUES ('$gifContent')";
            if ($conn->query($sql) === TRUE) {
                echo "GIF file uploaded and inserted into the database successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label for="gifFile">Select a GIF file to upload:</label>
        <input type="file" name="gifFile" id="gifFile" required><br><br>
        
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
