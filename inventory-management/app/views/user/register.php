<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php-intermediate/inventory-management/public/assets/css/styles.css">
    <title>Register</title>
</head>
<body>
    <div class="main-register-container">
        <img class="logo-big" src="/php-intermediate/inventory-management/public/assets/images/Logo_big.png" alt="">
        <div class="form-section">
            <img src="/php-intermediate/inventory-management/public/assets/images/logo_small.png" alt="">
            <h1>Create an Account</h1>
            <form action="" method="POST">
                <div class="form-field">
                    <label for="register_name">Name *</label>
                    <input type="text" name="register_name" id="register_name" required>
                </div>
                <div class="form-field">
                    <label for="register_email">Email *</label>
                    <input type="text" name="register_email" id="register_email" required>
                </div>
                <div class="form-field">
                    <label for="register_password">Password *</label>
                    <input type="password" name="register_password" id="register_password" required>
                </div>
                <div class="form-field">
                    <label for="confirm_password">Confirm Password *</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
    
</body>
</html>






