<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.html');
    exit;
}

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $national_code = $_POST['national_code'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = md5($_POST['password'] ?? '');
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (full_name, national_code, phone, username, password, role) 
                               VALUES (?, ?, ?, ?, ?, 'user')");
        $stmt->execute([$full_name, $national_code, $phone, $username, $password]);
        
        header('Location: admin.php?success=1');
    } catch (PDOException $e) {
        header('Location: admin.php?error=1');
    }
} else {
    header('Location: admin.php');
}
?>