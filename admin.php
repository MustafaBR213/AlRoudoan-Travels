<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>مدير الموقع</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        @media (max-width: 380px) {
            .container {
                margin-top: 20px;
            }
            h1, h2, h3 {
                font-size: 22px;
            }
            table {
                font-size: 12px;
            }
            .btn {
                font-size: 12px;
            }
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    
<?php include 'navigation.php'; ?>

<div class="container">
    <h1 class="text-right">صفحة المدير</h1>
    <br>

    <br>

    <?php

    include 'connect.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
        // Check if at least one traveler is selected
        if (isset($_POST['traveler_id'])) {
            // Get the selected traveler IDs to delete
            $travelerIDs = $_POST["traveler_id"];

            // Delete the selected traveler records from the database
            $ids = implode(",", $travelerIDs); // Convert the array to a comma-separated string
            $sql = "DELETE FROM travelers WHERE id IN ($ids)";
            if (mysqli_query($conn, $sql)) {
                echo "<p class='alert alert-success'>تم حذف المسافرين بنجاح!</p>";
            } else {
                echo "<p class='alert alert-danger'>حدث خطأ أثناء حذف المسافرين: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p class='alert alert-warning'>يرجى تحديد مسافر واحد على الأقل لحذفه.</p>";
        }
    }
    ?>


    <h2 class="text-right">قائمة الطلاب:</h2>
    <?php
    // Fetch and display the existing travelers from the database
    $sql = "SELECT * FROM travelers";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<form method='post' action=''>";
        echo "<table class='table'>";
        echo "<tr><th>الرقم التسلسلي</th><th>اسم الطالب</th><th>الجامعة</th><th>موقع الطالب</th><th>ساعة الانتهاء</th><th>حذف</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['university_name'] . "</td>";
            echo "<td>" . $row['student_location'] . "</td>";
            echo "<td>" . $row['end_hour'] . "</td>";
            echo "<td><input type='checkbox' name='traveler_id[]' value='" . $row['id'] . "'></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<button type='submit' name='delete' class='btn btn-danger'>حذف المحددين</button>";
        echo "</form>";
    } else {
        echo "<p class='text-right'>لا يوجد طلاب مسجلين.</p>";
    }
    ?>
    <br><br>

    <!-- Change Username Modal -->
    <div class="modal fade" id="changeUsernameModal" tabindex="-1" role="dialog" aria-labelledby="changeUsernameModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeUsernameModalLabel">تغيير اسم المستخدم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="new_username">اسم مستخدم جديد:</label>
                            <input type="text" name="new_username" id="new_username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">كلمة مرور جديدة:</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">تحديث</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>

    <h3 class="text-right">تغيير اسم المستخدم وكلمة المرور</h3>
    <br>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#changeUsernameModal">
    تحديث
    </button>
    <br>
    <br>
</div>
<br>
<br><br>
<br>
<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
