

<!DOCTYPE html>
<html>
<head>
    <title>حجز إيصال</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <style>
        
        

        .university-option {
            display: none;
        }
        .university-option.active {
            display: block;
        }
        .university-card {
            
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }
        .university-card:hover {
            background-color: #f9f9f9;
        }
        .university-card img {
            width: 105px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .university-card .university-option-label {
            font-size: 16px;
            font-weight: bold;
        }
        .university-card.selected img {
            filter: brightness(50%);
        }
        .university-card.selected .check-icon {
            display: block;
        }
        .check-icon {
            display: none;
            position: absolute;
            top: 10px;
            right: 110px;
            color: white;
            font-size: 80px;
        }
        input:radio{
            visibility:hidden;
        }
        @media (max-width: 360px) {
    .university-card img {
        width: 40vw;
        height: 40vw;
        max-width: 110px;
        max-height: 110px;
    }
    
    .university-card .university-option-label {
        font-size: 12px;
    }
    
    .check-icon {
        font-size: 50px;
        right: 50px;
    }
}

    </style>
    
</head>
<body>
    
<?php include 'navigation.php'; ?>
<?php include 'bg.php'; ?>

    <div class="container">
        <div class="text-center mt-5">
            <h1>شركة الرضوان لنقل الطلبة الجامعيين</h1>
        </div>

        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form id="contact-form" method="post" action="register.php">

                                <div class="form-group">
                                    <label for="name">الاسم *</label>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="أدخل الاسم" required="required">
                                </div>

                                <div class="form-group">
    <label>الجامعة *</label>
    <div class="university-options">
        <div class="row">
            <div class="col-md-6">
                <div class="university-card">
                    <input class="form-check-input" type="radio" name="university" id="university1" value="الجامعة الدولية للعلوم والنهضة" style="visibility:hidden;">
                    <label class="form-check-label" for="university1">
                        <img src="images/uni1.jpg" alt="الجامعة الدولية للعلوم والنهضة">
                        <div class="check-icon">&#10003;</div>
                        <div class="university-option-label">الجامعة الدولية للعلوم والنهضة</div>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="university-card">
                    <input class="form-check-input" type="radio" name="university" id="university2" value="جامعة غازي عنتاب(كلية الشريعة)" style="visibility:hidden;">
                    <label class="form-check-label" for="university2">
                        <img src="images/uni3.jpg" alt="جامعة غازي عنتاب(كلية الشريعة)">
                        <div class="check-icon">&#10003;</div>
                        <div class="university-option-label">جامعة غازي عنتاب(كلية الشريعة)</div>
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="university-card">
                    <input class="form-check-input" type="radio" name="university" id="university3" value="جامعة حلب الحرة" style="visibility:hidden;">
                    <label class="form-check-label" for="university3">
                        <img src="images/uni2.jpg" alt="جامعة حلب الحرة">
                        <div class="check-icon">&#10003;</div>
                        <div class="university-option-label">جامعة حلب الحرة</div>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="university-card">
                    <input class="form-check-input" type="radio" name="university" id="university4" value="جامعة ميديبول" style="visibility:hidden;">
                    <label class="form-check-label" for="university4">
                        <img src="images/uni4.jpg" alt="جامعة ميديبول">
                        <div class="check-icon">&#10003;</div>
                        <div class="university-option-label">جامعة ميديبول</div>
                    </label>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="university-card">
                    <input class="form-check-input" type="radio" name="university" id="university5" value="جامعة الشام العالمية" style="visibility:hidden;">
                    <label class="form-check-label" for="university5">
                        <img src="images/uni5.jpg" alt="جامعة الشام العالمية">
                        <div class="check-icon">&#10003;</div>
                        <div class="university-option-label">جامعة الشام العالمية</div>
                    </label>
                </div>
            </div>
    </div>
    </div>
</div>


                                <div class="form-group">
                                    <label for="email">الموقف *</label>
                                    <input id="email" type="text" name="email" class="form-control" placeholder="أدخل الموقف" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="end_hour">ساعة انتهاء الدوام *</label>
                                    <input id ="end_hour" type="number" name="end_hour" class="form-control" placeholder="أدخل ساعة انتهاء دوامك" required="required">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">حجز مقعد</button>
                                </div>
                                <br><br> </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        // Show the selected university option when a card is clicked
        $('.university-card').on('click', function() {
            $('.university-card').removeClass('selected');
            $(this).addClass('selected');
            $('input[name="university"]').prop('checked', false);
            $(this).find('input[name="university"]').prop('checked', true);
        });
    </script>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
