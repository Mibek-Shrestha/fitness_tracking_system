<!DOCTYPE html>
<html>
<head>
  <title>Half Screen Layout</title>
    <link rel="stylesheet" type="text/css" href="style/detailCard.css">
</head>
<body>
  <div class="container">
      <?php
    // Database connection details
    include 'AdminPanel/db.php';
     $id = $_GET['updateid'];
    // Retrieve GIF image from the database
    $sql = "SELECT * FROM exercise where id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Retrieve and display the GIF image
            $title = $row['title'];
            $description = $row['description'];
            $gifContent = $row['gif_content'];
            // echo '<img src="data:image/gif;base64,' . base64_encode($gifContent) . '"><br><br>';
            // echo $title;
            // echo "<br>";
            // echo $description;

            ?>
            <div class="image">
         <?php echo '<img src="data:image/gif;base64,' . base64_encode($gifContent) . '"><br><br>';?>
    </div>
    <div class="content">
      <h1 class="title"><?php  echo $title?></h1>
      <p class="information"><?php  echo $description?></p>


<?php
            
        }
    } else {
        echo "No GIF images found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
    
      <div class="part">
         <img src="assests/body-part.png" alt="Logo" class="logo">
        <p class="text-message">Thank you for visiting!</p>
      </div>
        <div class="part">
         <img src="assests/body-part.png" alt="Logo" class="logo">
        <p class="text-message">Thank you for visiting!</p>
      </div>
        <div class="part">
         <img src="assests/body-part.png" alt="Logo" class="logo">
        <p class="text-message">Thank you for visiting!</p>
      </div>
      
    </div>
  </div>
</body>
</html>