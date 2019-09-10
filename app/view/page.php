<?php
    require_once __DIR__ . '/header.php';
?>
<body>
    <div class="arts page">
        <?php
            require_once __DIR__ . '/breadcrumbs.php';
        ?>
        <div class="title">
            <h1><?=$page[0]['title']?></h1>
        </div>
        <div class="text">
            <?=$page[0]['text']?>
        </div>
    </div>
</body>
<?php
    require_once __DIR__ . '/footer.php';
?>