<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php-intermediate/inventory-management/public/assets/css/styles.css">
    <title>Login</title>
</head>
<body>
    <div class="main-login-container">
        <img class="logo-big" src="/php-intermediate/inventory-management/public/assets/images/Logo_big.png" alt="">
        <div class="form-section">
            <img src="/php-intermediate/inventory-management/public/assets/images/logo_small.png" alt="">
            <h1>Login </h1>
            <form action="" method="POST">
                <div class="form-field">
                    <label for="login_email">Email *</label>
                    <input type="text" name="login_email" id="login_email" required>
                </div>
                <div class="form-field">
                    <label for="login_password">Password *</label>
                    <input type="password" name="login_password" id="login_password" required>
                </div>
                <input type="submit" value="Login">
            </form>
            <div class="bottom" style="margin-top: 1rem">
                <span style="margin-right: 1rem; ">No Account?</span><a href="register">Signup</a>
            </div>
            <?php if (isset($error_message)): ?>
                <div class="error"><?= $error_message; ?></div>
            <?php endif; ?>
            
        </div>
    </div>
    
</body>
</html>

