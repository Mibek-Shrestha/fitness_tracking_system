<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
    <h1>Registration</h1>
    <link rel="stylesheet" type="text/css" href="register.css">
    <!-- <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $username = $_POST["username"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $goals = $_POST["goals"];
        $level = $_POST["level"];
        
        // Database connection details
        $servername = "localhost";
        $usernameDB = "your_username";
        $passwordDB = "your_password";
        $dbname = "your_database_name";

        // Create connection
        $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert form data into the database
        $sql = "INSERT INTO users (username, age, email, goals, level) VALUES ('$username', '$age', '$email', '$goals', '$level')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?> -->

    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="goals">Desired Goals:</label>
        <select name="goals" id="goals" required>
            <option value="sixpack">Six Pack</option>
            <option value="chest">Chest</option>
        </select><br><br>
        
        <label for="level">Level:</label>
        <select name="level" id="level" required>
            <option value="hard">Hard</option>
            <option value="simple">Simple</option>
        </select><br><br>
        
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>
