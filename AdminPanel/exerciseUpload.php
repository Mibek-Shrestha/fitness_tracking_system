<!DOCTYPE html>
<html>
<head>
    <title>Insert GIF Image</title>
</head>
<body>
    <h1>Insert GIF Image</h1>

    <?php
    // Database connection details
      include 'db.php';    
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $title = $_POST["title"];
        $description = $_POST["description"];

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

            // Insert the GIF image into the database
            $sql = "INSERT INTO `exercise`(`gif_content`, `title`, `description`) VALUES ('$gifContent','$title','$description')";
            if ($conn->query($sql) === TRUE) {
                echo "GIF image uploaded and inserted into the database successfully.";
            } else {
                echo "Error: " . "<br>" . $conn->error;
            }
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="5" cols="30" required></textarea><br><br>

        <label for="gifFile">Select a GIF file to upload:</label>
        <input type="file" name="gifFile" id="gifFile" required><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
