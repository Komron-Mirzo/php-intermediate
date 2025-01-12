<!-- app/views/layouts/layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php-intermediate/inventory-management/public/assets/css/styles.css">
    <title>Inventory Management</title>
</head>
<body>

    <div id="main-container">
        <div class="sidebar">
            <?php include __DIR__ . '/sidebar.php'; ?>
        </div>
        <div class="content-area">
            <div class="header">
                <?php include __DIR__ . '/top.php'; ?>
            </div>
            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    

    

 

</body>
</html>
