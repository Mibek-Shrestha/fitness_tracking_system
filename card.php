
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container py-5">
    <div class="row mt-4">
       <?php
    // Database connection details
    include 'AdminPanel/db.php';

    // Retrieve GIF image from the database
    $sql = "SELECT * FROM exercise where id <= 12
    ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Retrieve and display the GIF image
            $id = $row['id'];
            $title = $row['title'];
            $description = $row['description'];
            $gifContent = $row['gif_content'];
            // echo '<img src="data:image/gif;base64,' . base64_encode($gifContent) . '"><br><br>';
            // echo $title;
            // echo "<br>";
            // echo $description;

            ?>
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                  <?php echo '<img src="data:image/gif;base64,' . base64_encode($gifContent) . '"><br><br>';?>
                  <div class="card-body">
                  <h5 class="card-title"><?php echo $title?></h5>
                 <!-- <a href="detailCard.php?detailCard='.<?php $id ?>.'" class="btn btn-primary">view More</a> -->
                 <?php 
                  if ($id === -1) {
                        echo "Title not found.";
                    } else {
                        // $title = $result[$index]['title'];
                        echo  '<button class="btn btn-danger"><a href="detail.php?updateid='.$id  .'"
                        class="text-light" style="text-decoration:none;">Detail information</a></button>';
                    }

                 ?>
             </div>
            </div>
            </div>

            <?php

            
        }
    } else {
        echo "No GIF images found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
      
 </div>
</div>
