<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Residence Management</title>
</head>
<body>
    <h1>Student Residence Management</h1>
    <div class="topnav">
        <a href="home.html">Home</a>
        <a class="active" href="#houses">Houses</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
        </div>
    </div>
    <?php 
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $housing);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    
    <div>
        <ul><a href = "viewhouse.php">View houses currently in the database</a></ul>
        <ul><a href = "addhouse.php"> Add new house to the database</a></ul>
        <ul><a href = "edithouse.php">Edit house in the database</a></ul>
        <ul><a href = "deletehouse.php">Delete a house from the database</a></ul>
    </div>
</body>
</html>
