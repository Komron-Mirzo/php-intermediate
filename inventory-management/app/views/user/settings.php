<div class="user-main">
    <div class="container-50 user-left content">
        <h1> <a href="<?php echo BASE_URL . 'public/' . 'users'; ?>"> <img  width="32" height="32" src="/php-intermediate/inventory-management/public/assets/images/back.png" /> </a> Edit user</h1>
        <form action="" method="POST">
            <input type="hidden" name="form_type" value="edit_user_info">
            <div class="form-field">
                <label for="user_name">Username</label>
                <input type="text" name="user_name" id="user_name" value="<?php echo $current_user['username']?>">
            </div>
            <div class="form-field">
                <label for="user_email">Email</label>
                <input type="text" name="user_email" id="user_email" value="<?php echo $current_user['email']?>">
            </div>
            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') : ?>
                <div class="form-field">
                    <label for="user_roles">User role</label>
                    <select name="user_roles" id="user_roles">
                        <?php
                            foreach ($user_roles as $role) {
                                if (isset($_GET['edit_id']) && $_GET['edit_id'] !== $_SESSION['user_id']) {
                                    if ($role['role'] !== 'admin'){
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                }
                                    
                                echo '<option class="user-role" ' . $selected . ' value="' . $role['role'] . '">' . $role['role'] . '</option>';
                            }
                            
                        ?>
                    </select>
                </div>
            <?php endif; ?>
            <input type="submit" value="Edit user">
        </form>
    </div>

    <div class="container-50 user-right content">
        <h1> Set new password</h1>
        <form action="" method="POST">
        <input type="hidden" name="form_type" value="edit_user_password">
           <div class="form-field">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" id="old_password">
            </div>
            <div class="form-field">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password">
            </div>
            <div class="form-field">
                <label for="confirm_new_password">Confirm New Password</label>
                <input type="password" name="confirm_new_password" id="confirm_new_password">
            </div>
            <input type="submit" value="Set New Password">
        </form>
    </div>
</div>

