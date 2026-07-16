<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.html');
    exit;
}

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? 0;
    $test_date = $_POST['test_date'] ?? date('Y-m-d');
    

    $fields = [
        'wbc', 'rbc', 'hemoglobin', 'hematocrit', 'platelets',
        'fbs',
        'cholesterol', 'triglyceride', 'hdl', 'ldl',
        'bun', 'creatinine',
        'alt', 'ast', 'alp', 'bilirubin',
        'tsh',
        'vitamin_d',
        'iron', 'ferritin'
    ];
    
    $values = [];
    foreach ($fields as $field) {
        $values[$field] = !empty($_POST[$field]) ? $_POST[$field] : null;
    }
    
    try {
        $sql = "INSERT INTO test_results (user_id, test_date, 
                wbc, rbc, hemoglobin, hematocrit, platelets,
                fbs,
                cholesterol, triglyceride, hdl, ldl,
                bun, creatinine,
                alt, ast, alp, bilirubin,
                tsh,
                vitamin_d,
                iron, ferritin) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $params = array_merge([$user_id, $test_date], array_values($values));
        $stmt->execute($params);
        
        header('Location: admin.php?success=2');
    } catch (PDOException $e) {
        header('Location: admin.php?error=2');
    }
} else {
    header('Location: admin.php');
}
?>