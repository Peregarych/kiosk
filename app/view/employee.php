<?php
    require_once __DIR__ . '/header.php';
?>
<body>
    <div class="employee page">
        <?php
            require_once __DIR__ . '/breadcrumbs.php';
        ?>
        <div class="text">
            <div class="image"><img src="/upload/image/employee/<?=$employee['image']?>"></div>
            <div class="description">
                <div class="post"><?=$employee['post_title']?></div>
                <div class="rank"><?=$employee['rank_title']?></div>
                <div class="name"><span class="lastname"><?=$employee['lastname']?></span><br> <span class="firstname"><?=$employee['firstname']?></span> <span class="middlename"><?=$employee['middlename']?></span></div>
            </div>
            <div class="hr"></div>
            <div class="about">
                <?=$employee['text']?>
            </div>
            <div class="contacts">
                
            </div>
        </div>
    </div>
</body>
<?php
    require_once __DIR__ . '/footer.php';
?>