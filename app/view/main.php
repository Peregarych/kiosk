<?php
    require_once __DIR__ . '/header.php';
?>
<body>
    <div class="main page">
        <?php
            require_once __DIR__ . '/breadcrumbs.php';
        ?>
        <div class="menu">
            <?php foreach($menu AS $elem):?>
            <a class="elem" href="<?=$elem['uri']?>">
                <div class="icon" style="mask-image: url(/upload/icon/<?=$elem['image']?>);-webkit-mask-image: url(/upload/icon/<?=$elem['image']?>);">
                </div>
                <div class="title">
                    <?=$elem['name']?>
                </div>
            </a>
            <?php endforeach;?>
        </div>
    </div>
</body>
<?php
    require_once __DIR__ . '/footer.php';
?>