<?php

include 'connect.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the admin table to check if the username and password match
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Check if the query returned a row
    if (mysqli_num_rows($result) === 1) {
        // Start the session
        session_start();

        // Store the user information in the session
        $_SESSION['username'] = $username;

        // Redirect to the admin page
        header("Location: admin.php");
        exit();
    } else {
        // Invalid username or password
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Admin Login</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
