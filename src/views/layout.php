<!-- layout.php -->
<!DOCTYPE html>
<html>

<head>
    <?php
    require __DIR__ . '/';
    ?>
</head>

<body>
    <?php
    include __DIR__ . '/';

    include __DIR__ . '/';
    ?>

    <div class="content">
        <?php include $content; ?>
    </div>

    <?php
    include  __DIR__ . '/';
    ?>
</body>

</html>