<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.html');
    exit;
}

require_once 'config.php';


$users = $pdo->query("SELECT * FROM users WHERE role = 'user' ORDER BY created_at DESC")->fetchAll();


$selected_user = null;
$results = null;
if (isset($_GET['user_id'])) {
    $selected_user = $_GET['user_id'];
    $stmt = $pdo->prepare("SELECT * FROM test_results WHERE user_id = ? ORDER BY test_date DESC LIMIT 1");
    $stmt->execute([$selected_user]);
    $results = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <div class="header-content">
                <h1>🏥 پنل مدیریت آزمایشگاه</h1>
                <div class="user-info">
                    <span><?= htmlspecialchars($_SESSION['full_name']) ?></span>
                    <a href="logout.php" class="logout-btn">خروج</a>
                </div>
            </div>
        </header>

        <div class="dashboard-grid">
    
            <div class="card">
                <div class="card-header">
                    <h2>ثبت کاربر جدید</h2>
                </div>
                <form action="add_user.php" method="POST" class="user-form">
                    <div class="form-group">
                        <label>نام و نام خانوادگی</label>
                        <input type="text" name="full_name" required placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <label>کد ملی</label>
                        <input type="text" name="national_code" required placeholder="کد ملی" pattern="\d{10}" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label>شماره تماس</label>
                        <input type="text" name="phone" required placeholder="۰۹۱۲۳۴۵۶۷۸۹" pattern="09\d{9}" maxlength="11">
                    </div>
                    <div class="form-group">
                        <label>نام کاربری</label>
                        <input type="text" name="username" required placeholder="نام کاربری">
                    </div>
                    <div class="form-group">
                        <label>رمز عبور</label>
                        <input type="text" name="password" required placeholder="رمز عبور" minlength="6">
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت کاربر</button>
                </form>
                <img src="img/00.webp" alt="" class="myimg">
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>ثبت نتایج آزمایش</h2>
                </div>
                <form action="save_results.php" method="POST" class="results-form">
                    <div class="form-group">
                        <label>انتخاب کاربر</label>
                        <select name="user_id" required onchange="this.form.submit()">
                            <option value="">انتخاب کنید...</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>" <?= ($selected_user == $user['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($user['full_name']) ?> - <?= $user['national_code'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="results-grid">
                        <h3>CBC - شمارش کامل سلول‌های خون</h3>
                        <div class="result-row">
                            <input type="text" name="wbc" placeholder="WBC" value="<?= $results['wbc'] ?? '' ?>">
                            <input type="text" name="rbc" placeholder="RBC" value="<?= $results['rbc'] ?? '' ?>">
                            <input type="text" name="hemoglobin" placeholder="Hemoglobin" value="<?= $results['hemoglobin'] ?? '' ?>">
                            <input type="text" name="hematocrit" placeholder="Hematocrit" value="<?= $results['hematocrit'] ?? '' ?>">
                            <input type="text" name="platelets" placeholder="Platelets" value="<?= $results['platelets'] ?? '' ?>">
                        </div>

                        <h3>FBS - قند خون ناشتا</h3>
                        <div class="result-row">
                            <input type="text" name="fbs" placeholder="FBS" value="<?= $results['fbs'] ?? '' ?>">
                        </div>

                        <h3>Lipid Profile - چربی‌های خون</h3>
                        <div class="result-row">
                            <input type="text" name="cholesterol" placeholder="Cholesterol" value="<?= $results['cholesterol'] ?? '' ?>">
                            <input type="text" name="triglyceride" placeholder="Triglyceride" value="<?= $results['triglyceride'] ?? '' ?>">
                            <input type="text" name="hdl" placeholder="HDL" value="<?= $results['hdl'] ?? '' ?>">
                            <input type="text" name="ldl" placeholder="LDL" value="<?= $results['ldl'] ?? '' ?>">
                        </div>

                        <h3>عملکرد کلیه</h3>
                        <div class="result-row">
                            <input type="text" name="bun" placeholder="BUN" value="<?= $results['bun'] ?? '' ?>">
                            <input type="text" name="creatinine" placeholder="Creatinine" value="<?= $results['creatinine'] ?? '' ?>">
                        </div>

                        <h3>آنزیم‌های کبدی</h3>
                        <div class="result-row">
                            <input type="text" name="alt" placeholder="ALT" value="<?= $results['alt'] ?? '' ?>">
                            <input type="text" name="ast" placeholder="AST" value="<?= $results['ast'] ?? '' ?>">
                            <input type="text" name="alp" placeholder="ALP" value="<?= $results['alp'] ?? '' ?>">
                            <input type="text" name="bilirubin" placeholder="Bilirubin" value="<?= $results['bilirubin'] ?? '' ?>">
                        </div>

                        <h3>عملکرد تیروئید</h3>
                        <div class="result-row">
                            <input type="text" name="tsh" placeholder="TSH" value="<?= $results['tsh'] ?? '' ?>">
                        </div>

                        <h3>ویتامین‌ها</h3>
                        <div class="result-row">
                            <input type="text" name="vitamin_d" placeholder="Vitamin D" value="<?= $results['vitamin_d'] ?? '' ?>">
                        </div>

                        <h3>آهن و فریتین</h3>
                        <div class="result-row">
                            <input type="text" name="iron" placeholder="Iron" value="<?= $results['iron'] ?? '' ?>">
                            <input type="text" name="ferritin" placeholder="Ferritin" value="<?= $results['ferritin'] ?? '' ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>تاریخ آزمایش</label>
                        <input type="date" name="test_date" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success">ذخیره نتایج</button>
                </form>
            </div>
        </div>

        <div class="card users-table">
            <div class="card-header">
                <h2>لیست کاربران</h2>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام و نام خانوادگی</th>
                            <th>کد ملی</th>
                            <th>شماره تماس</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($user['full_name']) ?></td>
                            <td><?= $user['national_code'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= date('Y/m/d', strtotime($user['created_at'])) ?></td>
                            <td>
                                <a href="admin.php?user_id=<?= $user['id'] ?>" class="btn btn-sm btn-info"> نتیجه</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>