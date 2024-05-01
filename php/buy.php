<!DOCTYPE html>
<html lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
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
                    <li><a href="exapmle.php">ورود</a></li>
                    <li><a href="exapmle.php">ثبت نام</a></li>
                    <li><a href="../index.html">خانه</a></li>
                </ul>
            </nav>
            <div class="menu-toggle">&#9776;</div>
        </div>
    </header>
    <div class="content">
        <h2>سبد خرید</h2>
        <table class="cart">
            <thead>
                <tr>
                    <th>محصول</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>مجموع</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <!-- محتوای سبد خرید اینجا قرار می‌گیرد -->
                <tr>
                    <td>
                    <?php $conesen=mysqli_connect("localhost","root","","robot_live");
	                                $pas=mysqli_query($conesen,"SELECT * FROM buy");
	                                while($row=mysqli_fetch_assoc($pas))
		{
		   echo $row['number']* $row['price'] ."<br />";
        }
	    mysqli_close($conesen);?></td>
                </tr>
            </tbody>
        </table>
        <div class="total">
            <p>مجموع کل: <span id="total-price"><?php  ?></span> تومان</p>
            <button>پرداخت نهایی</button>
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