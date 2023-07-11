
    <?php
    // Create connection
    $conn = new mysqli('localhost', 'root', '','fitLyfe');

    // Check connection
   if(!$conn){
     die(mysqli_error($conn));
   }
    
    ?>
