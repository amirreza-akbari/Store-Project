<!DOCTYPE html>
<html lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ثبت نام</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">لوگو</div>
            <nav>
                <ul>
                    <li><a href="exapmle.php">محصولات</a></li>
                    <li><a href="about.php">درباره ما</a></li>
                    <li><a href="buy.php">سبد خرید</a></li>
                    <li><a href="../index.html">خانه</a></li>
                </ul>
            </nav>
            <div class="menu-toggle">&#9776;</div>
        </div>
    </header>

    <div class="content">
        <div class="register-form">
            <h2>ثبت نام</h2>
            <form action="../config/actoin.php" method="POST">
                <div class="form-group">
                    <label for="name">نام و  :</label>
                    <input type="text" id="username" name="username" >
                </div>
                <div class="form-group">
                    <label for="email">ایمیل:</label>
                    <input type="text" id="email" name="email" >
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور:</label>
                    <input type="password" id="password" name="password" >
                </div>
                <div class="form-group">
                    <label for="confirm-password">تایید رمز عبور:</label>
                    <input type="password" id="password1" name="password1" >
                </div>
                <button type="submit">ثبت نام</button>
            </form>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>Lorem, ipsum.</p>
        </div>
    </footer>
    <script src="../js/script.js"></script>
</body>
</html>
