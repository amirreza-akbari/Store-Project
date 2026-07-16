<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: index.html');
    exit;
}

require_once 'config.php';


$stmt = $pdo->prepare("SELECT * FROM test_results WHERE user_id = ? ORDER BY test_date DESC");
$stmt->execute([$_SESSION['user_id']]);
$results = $stmt->fetchAll();
$latest_result = $results[0] ?? null;
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل کاربر</title>
    <link rel="stylesheet" href="css/user.css">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="user-container">
        <header class="user-header">
            <div class="header-content">
                <h1>🏥 پنل کاربر</h1>
                <div class="user-info">
                    <span>👤 <?= htmlspecialchars($_SESSION['full_name']) ?></span>
                    <span>شماره تلفن <?= htmlspecialchars($_SESSION['phone']) ?></span>
                    <span>کدملی: <?= htmlspecialchars($_SESSION['national_code']) ?></span>
                    <a href="logout.php" class="logout-btn">خروج</a>
                </div>
            </div>
        </header>

        <?php if ($latest_result): ?>
            <div class="result-card">
                <div class="result-header">
                    <h2>نتیجه آزمایش</h2>
                    <div class="result-meta">
                        <span>تاریخ: <?= date('Y/m/d', strtotime($latest_result['test_date'])) ?></span>
                        <span>شماره: #<?= str_pad($latest_result['id'], 6, '0', STR_PAD_LEFT) ?></span>
                         <span>👤 <?= htmlspecialchars($_SESSION['full_name']) ?></span>
                        <span>کدملی: <?= htmlspecialchars($_SESSION['national_code']) ?></span>
                    </div>
                </div>

                <div class="result-content" id="printArea">
                    <div class="result-section">
                        <h3>CBC - شمارش کامل سلول‌های خون</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">WBC</span>
                                <span class="value"><?= $latest_result['wbc'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">RBC</span>
                                <span class="value"><?= $latest_result['rbc'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">Hemoglobin</span>
                                <span class="value"><?= $latest_result['hemoglobin'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">Hematocrit</span>
                                <span class="value"><?= $latest_result['hematocrit'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">Platelets</span>
                                <span class="value"><?= $latest_result['platelets'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="result-section">
                        <h3>FBS - قند خون ناشتا</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">FBS</span>
                                <span class="value"><?= $latest_result['fbs'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="result-section">
                        <h3>Lipid Profile - چربی‌های خون</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">Cholesterol</span>
                                <span class="value"><?= $latest_result['cholesterol'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">Triglyceride</span>
                                <span class="value"><?= $latest_result['triglyceride'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">HDL</span>
                                <span class="value"><?= $latest_result['hdl'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">LDL</span>
                                <span class="value"><?= $latest_result['ldl'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="result-section">
                        <h3>عملکرد کلیه</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">BUN</span>
                                <span class="value"><?= $latest_result['bun'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">Creatinine</span>
                                <span class="value"><?= $latest_result['creatinine'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="result-section">
                        <h3>آنزیم‌های کبدی</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">ALT</span>
                                <span class="value"><?= $latest_result['alt'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">AST</span>
                                <span class="value"><?= $latest_result['ast'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">ALP</span>
                                <span class="value"><?= $latest_result['alp'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">Bilirubin</span>
                                <span class="value"><?= $latest_result['bilirubin'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="result-section">
                        <h3>عملکرد تیروئید</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">TSH</span>
                                <span class="value"><?= $latest_result['tsh'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="result-section">
                        <h3>ویتامین‌ها</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">Vitamin D</span>
                                <span class="value"><?= $latest_result['vitamin_d'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="result-section">
                        <h3>آهن و فریتین</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">Iron</span>
                                <span class="value"><?= $latest_result['iron'] ?? '-' ?></span>
                            </div>
                            <div class="result-item">
                                <span class="label">Ferritin</span>
                                <span class="value"><?= $latest_result['ferritin'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="result-actions">
                    <button onclick="window.print()" class="btn btn-print">🖨️ پرینت نتیجه</button>
                </div>
            </div>

     
            
      
        <?php endif; ?>
    </div>

    <script>
        function printResult() {
            window.print();
        }
    </script>
</body>
</html>