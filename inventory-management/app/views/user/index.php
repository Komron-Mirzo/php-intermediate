<div class="user-main">
<h1>Edit/delete for Admin and users not done yet</h1>

    <div class="container-50 content">
        <table border="1">
            <tr>
                <th>No.</th>
                <th> User name </th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
                <?php
                    foreach($users as $index => $user) {
                        echo '<tr>';
                        echo '<td>';
                        echo $index +1;
                        echo '</td>';
                        echo '<td>';
                        echo $user['username'];
                        echo '</td>';
                        echo '<td>';
                        echo $user['email'];
                        echo '</td>';
                        echo '<td>';
                        echo $user['role'];
                        echo '</td>';
                        echo '<td>';
                        echo '<a href=users/edit?edit_id=' . $user['user_id'] . '>' . '<img width="20" height="20" src="/php-intermediate/inventory-management/public/assets/images/edit.png" />' . '</a>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href=?delete_id=' . $user['user_id'] . '>' . '<img width="24" height="24" src="/php-intermediate/inventory-management/public/assets/images/delete.png" />' . '</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
        </table>

        <?php include dirname(__DIR__, 1) . '/layout/pages.php';  ?>
       
    </div>
</div>

