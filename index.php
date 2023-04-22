<?php
    $ErrorMessage = "";

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
    if (isset($_POST["login"])) {
        // Get the form data
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Execute SELECT query to check if user exists in the database
        $sql = "SELECT * FROM User WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Login successful.";
            // Redirect to the house.php page
            header("Location: home.html");
            exit();
        } else {
            $ErrorMessage = "Invalid Email or Password";
        }
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    
    <div class="topnav">
            <a class="active" href="index.php">Login</a>
            <a href="register.php">Register</a>
            <a href="contact2.html">Contact</a>
            <a href="about2.html">About</a>
    </div>

    <div class="login-form">
        <h2>Login</h2>
        <form method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br><br>
            <input type="submit" name="login" value="Login">
        </form>
        <button><a href="register.php">Register</a></button>
        <div class="error-message" <?php echo $ErrorMessage ? 'visible' : ''; ?>><?php echo $ErrorMessage; ?></div>
    </div>

</body>
</html>
