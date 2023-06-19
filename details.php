<!DOCTYPE html>
<html>
<head>
    <title>إيصال الرحلة</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            padding:0px
        }
        .containt {
            margin-top: 50px;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            background-color: #f9f9f9;
            font-family: 'Lato', sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .cancel-button {
            text-align: center;
        }

        .cancel-button button {
            width: 100%;
        }

        .payment-details {
            text-align: center;
            font-size: 18px;
            margin-top: 30px;
        }
    </style>
<script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>
<?php include 'navigation.php'; ?>

<div class="containt" dir="rtl">
    <h1>وصل الحجز</h1>
    
    <?php
    // Get the current date
    $currentDate = date('Y-m-d');

    // Display the current date
    echo "<div class='invoice-details'>التاريخ: $currentDate</div>";
    ?>

    <?php
    session_start();
    // Check if the traveler's details are stored in session variables
    if (isset($_SESSION["name"]) && isset($_SESSION["university"]) && isset($_SESSION["location"])) {
        $name = $_SESSION["name"];
        $university = $_SESSION["university"];
        $location = $_SESSION["location"];
        $end_hour = $_SESSION["end_hour"];

        // Display the traveler's details
        
        echo "<table>";
        echo "<tr><th>الاسم</th><td>$name</td></tr>";
        echo "<tr><th>الجامعة</th><td>$university</td></tr>";
        echo "<tr><th>الموقف</th><td>$location</td></tr>";
        echo "<tr><th>ساعة انتهاء الدوام</th><td>$end_hour</td></tr>";
        echo "</table>";

        // Display the cancel button
        echo "<div class='cancel-button'>";
        echo '<form method="post" action="">';
        echo '<button type="submit" name="cancel" class="btn btn-danger">إلغاء الرحلة</button>';
        echo '</form>';
        echo "</div>";

        if (isset($_POST["cancel"])) {
            // Handle the cancel trip functionality
            // Add your code here to cancel the trip
            // For example, you can delete the traveler's details from the database
            // and perform any necessary actions

            // Redirect to a page confirming the cancellation
            header("Location: cancellation_confirmation.php");
            exit();
        }

        // Display payment details
        
        echo "<div class='payment-details'>الرجاء إتمام عملية الدفع بقيمة 50 ليرة تركية</div>";
        echo "<div class='payment-details'>التقط صورة لوصل الحجز</div>";
        
    } else {
        // Session variables not set, redirect to the index page
        header("Location: index.php");
        exit();
    }
    ?>
        <div class="text-center">
    <?php
    echo "<button class='btn btn-primary' onclick='printPage()'>احفظ الوصل</button>";
    echo ' <a href="index.php" class="btn btn-primary">الصفحة الرئيسية</a>';
    ?>
</div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    </div>

<br><br><br><br><br>


</body>

</html>
