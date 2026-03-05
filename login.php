<?php
session_start();
 
// If already logged in, redirect to index
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
 
$error = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Static admin login
    if ($username === "admin" && $password === "admin") {
 
        $_SESSION['username'] = "ADMIN";
        header("Location: index.php");
        exit();
 
    } else {
        $error = "Invalid username or password!";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* OVERRIDE ALL STYLES FOR LOGIN PAGE - KEEPING BLUE THEME */
        body {
            margin: 0 !important;
            padding: 0 !important;
            background: linear-gradient(135deg, #e0f2ff, #f4f9ff) !important;
            min-height: 100vh !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            font-family: "Segoe UI", Arial, sans-serif !important;
        }
        
        .login-card {
            width: 350px !important;
            max-width: 90% !important;
            background: white !important;
            padding: 35px 30px !important;
            border-radius: 16px !important;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15) !important;
            text-align: center !important;
            margin: 0 auto !important;
        }
        
        .login-card h2 {
            font-size: 28px !important;
            color: #1e3a8a !important;
            margin: 0 0 25px 0 !important;
            font-weight: 600 !important;
        }
        
        .login-card label {
            display: block !important;
            text-align: left !important;
            font-size: 14px !important;
            font-weight: 500 !important;
            color: #334155 !important;
            margin-bottom: 5px !important;
        }
        
        .login-card input {
            width: 100% !important;
            padding: 12px 15px !important;
            margin-bottom: 20px !important;
            border: 1.5px solid #e2e8f0 !important;
            border-radius: 10px !important;
            font-size: 14px !important;
            background: #f8fafc !important;
            transition: all 0.3s ease !important;
            box-sizing: border-box !important;
        }
        
        .login-card input:focus {
            border-color: #2563eb !important;
            background: white !important;
            outline: none !important;
            box-shadow: 0 0 0 4px rgba(37,99,235,0.1) !important;
        }
        
        .login-card button {
            width: 100% !important;
            padding: 14px !important;
            background: linear-gradient(90deg, #2563eb, #1d4ed8) !important;
            color: white !important;
            border: none !important;
            border-radius: 10px !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            margin-top: 10px !important;
            letter-spacing: 0.5px !important;
        }
        
        .login-card button:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 20px rgba(37,99,235,0.3) !important;
            background: linear-gradient(90deg, #1d4ed8, #1e40af) !important;
        }
        
        .error-message {
            color: #dc2626 !important;
            margin-bottom: 20px !important;
            padding: 12px !important;
            background: #fef2f2 !important;
            border-radius: 8px !important;
            font-size: 14px !important;
            border-left: 4px solid #dc2626 !important;
            text-align: left !important;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login Form</h2>
        
        <?php if ($error != ""): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>
            
            <label>Password:</label>
            <input type="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>