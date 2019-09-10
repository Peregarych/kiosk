<?php
    require_once __DIR__ . '/header.php';
?>
<body>
    <div class="error page">
        <?php
            require_once __DIR__ . '/breadcrumbs.php';
        ?>
        <div class="content">
            <div class="icon" style="mask-image: url(<?=$icon;?>); -webkit-mask-image: url(<?=$icon;?>)">
            </div>
            <div class="message">
                <?=$message;?>
            </div>
        </div>
        
    </div>
</body>
<?php
    require_once __DIR__ . '/footer.php';
?>