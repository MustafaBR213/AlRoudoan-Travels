<?php

include 'connect.php';


// Check if the cancellation form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the traveler's information from session variables
    session_start();
    $name = $_SESSION["name"];
    $university = $_SESSION["university"];
    $location = $_SESSION["location"];

    // Delete the traveler's record from the database
    $sql = "DELETE FROM travelers WHERE student_name = '$name' AND university_name = '$university' AND student_location = '$location'";
    if (mysqli_query($conn, $sql)) {
        // Display a success message
        echo "<div class='alert alert-success'>تم الإلغاء بنجاح!</div>";

        // Clear the session variables
        session_unset();
        session_destroy();

        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting traveler: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html >
<head>
    <title>إلغاء الرحلة</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'navigation.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body text-center">
                    <h1 class="card-title">إلغاء الرحلة</h1>
                    <p class="card-text">هل أنت متأكد من أنك تريد إلغاء الرحلة؟</p>
                    <form method="post" action="">
                        <button type="submit" class="btn btn-danger">نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>

</body>
</html>
