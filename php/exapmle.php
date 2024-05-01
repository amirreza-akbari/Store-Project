<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت فروشگاهی</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">لوگو</div>
            <nav>
                <ul>
                    <li><a href="about.php">درباره ما</a></li>
                    <li><a href="buy.php">سبد خرید</a></li>
                    <li><a href="login.php">ورود</a></li>
                    <li><a href="register.php">ثبت نام</a></li>
                    <li><a href="../index.html">خانه</a></li>
                </ul>
            </nav>
            <div class="menu-toggle">&#9776;</div>
        </div>
    </header>
    <form action="../config/example.php" method="post">
    <div class="content">
        <!-- محتوا سایت -->
        <div class="products">
            <div class="product">
                <img src="pic/02.png" alt="محصول 1">
                <h3>محصول 1</h3>
                <p>توضیحات محصول 1</p>
                <p>قیمت: 100 تومان</p>
                <button type="submit" name="sub">افزودن به سبد خرید</button>
            </div>
        </div>
    </div>
    </form>
    <footer>
        <div class="container">
            <p>Lorem, ipsum.</p>
        </div>
    </footer>
    <script src="../js/script.js"></script>
</body>
</html>
