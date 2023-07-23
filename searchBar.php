

<div class="container">
<form method="POST" action="">
        <h1 style="text-align:center">Search Exercise</h1>
        
        <input type="text" name="title" id="title" style="width: 80%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        <input type="submit" name="search" value="Search" style="background-color: #008080; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
    </form>
</div>
    
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

