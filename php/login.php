<!DOCTYPE html>
<html lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ورود</title>
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
            <h2>وزود</h2>
            <form action="../config/login.php" method="POST">
                <div class="form-group">
                    <label for="name">نام و نام خانوادگی:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">ورود</button>
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