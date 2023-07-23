<!DOCTYPE html>
<html>
<head>
    <title>Exercise List</title>
    <style>
         <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
        }
    </style>
    </style>
</head>
<body>
    <h1>Exercise List</h1>
<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Exercise Name</th>
                    <th>Exercise Info</th>
                    <th>Exercise GIF</th>
                </tr>
  
        </thead>
        <tbody>
            <?php
    // Database connection details
    include 'db.php';

    // Retrieve GIF image from the database
    $sql = "SELECT * FROM exercise";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Retrieve and display the GIF image
            $id = $row['id'];
            $title = $row['title'];
            $description = $row['description'];
            $gifContent = $row['gif_content'];
            echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$title.'</td>
                 <td>'.$description.'</td>
                <td><img src="data:image/gif;base64,' . base64_encode($gifContent) . '" /></td>
                
            <tr>';
            
            // '<img src="data:image/gif;base64,' . base64_encode($gifContent) . '"><br><br>';
            // echo $title;
            // echo "<br>";
            // echo $description;
            
        }
    } else {
        echo "No GIF images found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
        </tbody>
           
      
        
</table>
</body>
</html>
