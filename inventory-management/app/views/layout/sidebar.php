<div class="sidebar-top">
    <img src="<?php echo BASE_URL ?>public/assets/images/logo.png" alt="" />
    <nav class="menu">
        <ul>
            <?php foreach ($this->routes as $routeKey => $route): ?>
                <?php if ($routeKey === 'dashboard' || $routeKey === 'products' || $routeKey === 'categories' || $routeKey === 'users'): ?>
                    <li><a href="<?php echo BASE_URL . 'public/' . $routeKey; ?>"><?php echo ucfirst($routeKey); ?></a></li>
                <?php endif ?>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>


<div class="sidebar-bottom">
    <nav class="settings">
        <ul>
            <?php if (isset($this->routes['settings'])): ?>
                <li><a href="<?php echo BASE_URL . 'public/' . 'settings'; ?>">Settings</a></li>
            <?php endif; ?>

            <?php if (isset($this->routes['logout'])): ?>
                <li><a href="<?php echo BASE_URL . 'public/' . 'logout'; ?>">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

