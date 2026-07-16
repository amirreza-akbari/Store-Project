<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = md5($_POST['password'] ?? '');
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['national_code'] = $user['national_code'];
        $_SESSION['phone'] = $user['phone'];
        
        if ($user['role'] === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: user.php');
        }
    } else {
        header('Location: index.html?error=1');
    }
    exit;
}
?>