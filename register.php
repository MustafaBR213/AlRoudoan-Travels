<?php
include 'connect.php';


// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted form data
    $name = $_POST["name"];
    $university = $_POST["university"];
    $location = $_POST["email"];
    $end_hour = $_POST["end_hour"];

    // Save the traveler's details in the database
    $sql = "INSERT INTO travelers (student_name, university_name, student_location,end_hour) VALUES ('$name', '$university', '$location','$end_hour')";
    if (mysqli_query($conn, $sql)) {
        // Store the user details in session variables
        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["university"] = $university;
        $_SESSION["location"] = $location;
        $_SESSION["end_hour"] = $end_hour;

        // Redirect to details.php page
        header("Location: details.php");
        exit();
    } else {
        echo "Error saving traveler details: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
