<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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

    // Check if the form has been submitted
    if (isset($_POST["submit"])) {
        // Get the form data
        $location = $_POST["location"];
        $rooms = $_POST["rooms"];
        $size = $_POST["size"];
        $furnished = isset($_POST["furnished"]) ? "Yes" : "No";
        $parking = isset($_POST["parking"]) ? "Yes" : "No";
        $price = $_POST["price"];
        $id = $_POST["id"];

        // Execute INSERT query to add new entry to the database
        $sql = "INSERT INTO Houses (location, rooms, size, furnished, parking, price, id) VALUES ('$location', '$rooms', '$size', '$furnished', '$parking', '$price', '$id')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    ?>
<div class="add">
    <form method="post">
        <label for="location">Location:</label>
        <input type="text" name="location" required>
        <br><br>
        <label for="rooms">Rooms:</label>
        <input type="number" name="rooms" required>
        <br><br>
        <label for="size">Size:</label>
        <select name="size" id="size">
        <option value="Small">Small</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
        </select>
        <br><br>
        <label for="furnished">Furnished:</label>
        <select name="furnished" required>
                <option value="1" <?php if ($furnished == 1) echo "selected"; ?>>Yes</option>
                <option value="0" <?php if ($furnished == 0) echo "selected"; ?>>No</option>
        </select>
            <br><br>
        <label for="parking">Parking:</label>
        <select name="parking" required>
            <option value="1" <?php if ($parking == 1) echo "selected"; ?>>Yes</option>
            <option value="0" <?php if ($parking == 0) echo "selected"; ?>>No</option>
        </select>
        <br><br>
        <label for="price">Price:</label>
        <input type="number" name="price" required>
        <br><br>
        <label for="id">ID:</label>
        <input type="number" name="id" required>
        <br><br>
        <input type="submit" name="submit" value="Add Entry">
    </form>
</div>

<?php
// Close connection
mysqli_close($conn);
?>
</body>
</html>
