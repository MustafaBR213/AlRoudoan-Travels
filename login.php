<?php

include 'connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // التحقق من وجود المفاتيح "username" و "password"
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // تنقيح المدخلات
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // استعلام قاعدة البيانات للتحقق من صحة اسم المستخدم وكلمة المرور
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            // تم التحقق من صحة اسم المستخدم وكلمة المرور
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit();
        } else {
            // اسم المستخدم أو كلمة المرور غير صحيحة
            $error = "اسم المستخدم أو كلمة المرور غير صحيحة.";
        }
    } else {
        // المفاتيح "username" و "password" غير موجودة في المصفوفة $_POST
        $error = "يرجى تقديم اسم المستخدم وكلمة المرور.";
    }
}

?>

<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 100px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">تسجيل الدخول</h1>
    <br>

    <form method="post" action="">
        <div class="form-group">
            <label for="username">اسم المستخدم:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <?php if (isset($error)) { ?>
            <p class="alert alert-danger"><?php echo $error; ?></p>
        <?php } ?>
        <button type="submit" name="submit" class="btn btn-primary">تسجيل الدخول</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
