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
            include 'db.php';
                $sql = "SELECT * FROM exercises";
                $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['e_id'];
                        $name = $row['exerciseName'];
                        $info = $row['exerciseInfo'];
                        $gif = $row['exerciseGif'];
                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$info.'</td>
                        <td><img src='.$gif.' width="200" height="150" /></td>
                        </tr>';
                    }
            

    ?> 
        </tbody>
           
      
        
</table>
</body>
</html>
