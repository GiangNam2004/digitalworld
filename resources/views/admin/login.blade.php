<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Login - Bán Máy Tính</title>
    <link rel="stylesheet" href="backend/asset/css/login_style.css">
</head>

<body>
    <div class="login-wrapper">
        <div class="login-box">
            <div class="logo-container">
                <img src="backend\asset\images\logo_admin.png" alt="Logo" class="logo">
            </div>
            <h1>Chào mừng trở lại!</h1>
            <form action="/check_login" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Đăng Nhập</button>
            </form>
            <p class="signup-link">Chưa có tài khoản? <a href="/register">Đăng ký ngay</a></p>
        </div>
    </div>

</body>

</html>
