<!-- layout.php -->
<!DOCTYPE html>
<html>

<head>
    <?php
    include VIEW_PATH . '/xampp/htdocs/library_management_system/src/app/View/components/head.php';
    ?>
</head>

<body>
    <?php
    include VIEW_PATH . '/xampp/htdocs/library_management_system/src/app/View/components/nav.php';

    include VIEW_PATH . '/xampp/htdocs/library_management_system/src/app/View/components/status.php';
    ?>

    <div class="content">
        <?php include $content; ?>
    </div>

    <?php
    include VIEW_PATH . '/xampp/htdocs/library_management_system/src/app/View/components/footer.php';
    ?>
</body>

</html>