<!DOCTYPE html>
<html>
<head>
    <title>Exercise Form</title>
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

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Exercise Form</h1>

    <?php
     include 'db.php';
     if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $text_paragraph = $_POST['text_paragraph'];
        $image = $_FILES['file'];
        // print_r($file);
        echo $name;
         echo "<br>";
        echo $text_paragraph;
        
        print_r($image);
        $imagefilename = $image['name'];
        print_r($imagefilename);
        echo "<br>";
        $imagefileerror = $image['error'];
        print_r($imagefileerror);
        echo "<br>";
        $imagefiletmp = $image['tmp_name'];
        print_r($imagefiletmp);
        echo "<br>";
        $filename_seperate= explode('.',$imagefilename);
        print_r($filename_seperate);
        // $file_extension = strtolower($filename_seperate[1]);
        // echo "<br>";
        // print_r($file_extension);
        echo "<br>";
        $file_extension = strtolower(end($filename_seperate));
        print_r($file_extension);

        $extension = array('png','jpeg','jpg');
        if(in_array($file_extension,$extension)){
            $destinationfile = 'images/'.$imagefilename;
            move_uploaded_file($imagefiletmp,$destinationfile);
            $sql = "INSERT INTO exercises (exerciseName,exerciseInfo,exerciseGIF) VALUES ('$name','$text_paragraph','$destinationfile')";
            $result = $conn->query($sql);
            if($result){
                echo "Data inserted successfully";
            }
            else{
                echo "Data not inserted";
            }
        }
        else{
            echo "File extension not allowed";
        }
     }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="exercise_photo">Exercise Photo:</label>
        <input type="file" name="file" id="file" accept="image/png, image/jpeg"><br><br>
        
        <label for="text_paragraph">Text Paragraph:</label><br>
        <textarea name="text_paragraph" id="text_paragraph" rows="5" cols="30" required></textarea><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
     