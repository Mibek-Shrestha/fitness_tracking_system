

<!DOCTYPE html>
<html>
<head>
    <title>Title Search</title>
</head>
<body>
    <form method="POST" action="">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <input type="submit" name="search" value="Search">
    </form>
    <?php
// Linear search function
function linearSearch($arr, $x)
{
    foreach ($arr as $index => $item) {
        // Check if the title matches the search term
        if (strcasecmp($item['title'], $x) === 0) {
            return $index;
        }
    }

    // If title is not found
    return -1;
}

// Connect to the database
$host = 'localhost';
$dbName = 'fitLyfe';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if the search button is clicked and a search term is provided
if (isset($_POST['search']) && isset($_POST['title'])) {
    $searchTerm = $_POST['title'];

    // Prepare and execute the query to fetch information from the database
    $stmt = $pdo->prepare("SELECT `title`FROM exercise");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Perform linear search on the titles array
    $index = linearSearch($result, $searchTerm);

    if ($index === -1) {
        echo "Title not found.";
    } else {
        $title = $result[$index]['title'];
           echo "<h1>Searched Exercise</h1>";
           echo "<h3>$title</h3>";
        echo  '<button class="btn btn-danger"><a href="detail.php?updateid='.$index + 1 .'"
          class="text-light">View in Detail</a></button>';

        ?>
        <!-- <a href="Detail.php?detailid<?php $index +1  ?>">View More</a> -->
        <?php
        // $information = $result[$index]['information'];
      

     
        // echo "<p>$information</p>";

    }
}
?>
</body>
</html>
