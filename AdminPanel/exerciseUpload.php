<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">FitLyfe Admin</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="./admin.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li  class="active">
				<a href="./exerciseUpload.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Add Exercise</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		
				
 <?php
    // Database connection details
      include 'db.php';    
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
		$category = $_POST["category"];
        $title = $_POST["title"];
        $description = $_POST["description"];

		$category = $conn->real_escape_string($category);
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
            $sql = "INSERT INTO `exercise`(`gif_content`, `title`, `description`,`category`) VALUES ('$gifContent','$title','$description','$category')";
            if ($conn->query($sql) === TRUE) {
                echo "GIF image uploaded and inserted into the database successfully.";
            } else {
                echo "Error: " . "<br>" . $conn->error;
            }
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data"
	style="max-width: 400px; margin: 100px ; border: 1px solid #ccc; padding: 40px; border-radius: 5px;">
		<h1 style=" text-align:center">Add Exercise</h1>
		<label for="Category">Category:</label>
		<select name="category">
			<option  value="Back">Back</option>
			<option  value="Cardio">Cardio</option>
			<option value="Chest">Chest</option>
			<option  value="Lower Arms">Lower Arms</option>
			<option  value="Upper Arms">Upper Arms</option>
			<option  value="Upper Legs">Upper Legs</option>
			<option value="Upper Legs">Waist</option>
		
			</select>
	</br>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required
		style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;"><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="5" cols="30" required
		 style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;"
		></textarea><br><br>

        <label for="gifFile">Select a GIF file to upload:</label>
        <input type="file" name="gifFile" id="gifFile" required
		style="display: block; margin-bottom: 10px;"><br><br>

        <input type="submit" name="submit" value="Upload" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer;">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
			
				
				
			</ul>
				

	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>

