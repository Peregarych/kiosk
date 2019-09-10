<?php
    require_once __DIR__ . '/header.php';
?>
<body>
    <div class="document page">
        <?php
            require_once __DIR__ . '/breadcrumbs.php';
        ?>
        <div class="title">
            <h1><?=$document[0]['title']?></h1>
        </div>
        <div class="text">
        </div>
    </div>
    <script>
        PDFObject.embed("/upload<?=$document[0]['url']?>", ".text");
    </script>
</body>
<?php
    require_once __DIR__ . '/footer.php';
?>