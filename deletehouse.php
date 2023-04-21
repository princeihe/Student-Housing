<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delete House</title>
</head>
<body>

<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "housing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the house ID is provided as a URL parameter
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Retrieve the existing house data from the database
    $sql = "SELECT * FROM Houses WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $location = $row["location"];
        $rooms = $row["rooms"];
        $size = $row["size"];
        $furnished = $row["furnished"];
        $parking = $row["parking"];
        $price = $row["price"];
    } else {
        echo "House not found.";
    }

    // Check if the form has been submitted
    if (isset($_POST["submit"])) {
        // Execute DELETE query to remove the entry from the database
        $sql = "DELETE FROM Houses WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}

// Close connection
mysqli_close($conn);
?>

<div class="topnav">
        <a href="home.html">Home</a>
        <a class="active" href="house.php">Houses</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
</div>

<div class="select-house">
    <h2>Select a House to Delete</h2>
    <form method="get">
        <label for="id">House ID:</label>
        <input type="text" name="id" required>
        <input type="submit" value="Delete">
    </form>
</div>

<div class="edit">
    <?php if (isset($id)) { ?>
        <h2>Delete House <?php echo $id; ?></h2>
        <p>Are you sure you want to delete this house?</p>
        <p>Location: <?php echo $location; ?></p>
        <p>Rooms: <?php echo $rooms; ?></p>
        <p>Size: <?php echo $size; ?></p>
        <p>Furnished: <?php echo $furnished == 1 ? "Yes" : "No"; ?></p>
        <p>Parking: <?php echo $parking == 1 ? "Yes" : "No"; ?></p>
        <p>Price: <?php echo $price; ?></p>
        <form method="post">
            <input type="submit" name="submit" value="Delete Entry">
        </form>
    <?php } else { ?>
        <p>No house selected for deletion.</p>
    <?php } ?>
</div>

</body>
</html>
