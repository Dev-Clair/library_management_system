<!-- layout.php -->
<!DOCTYPE html>
<html>

<head>
    <?php include VIEW_PATH . '/components/head.php'; ?>
</head>

<body>
    <?php include VIEW_PATH . '/components/nav.php'; ?>
    <?php include VIEW_PATH . '/components/status.php'; ?>

    <div class="content">
        <?php include $content; ?>
    </div>

    <?php include VIEW_PATH . '/components/footer.php'; ?>
</body>

</html>