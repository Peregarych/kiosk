<?php if(isset($breadcrambs)):?>
    <div class="breadcrumbs">
        <?php foreach($breadcrambs AS $cramb):?>
        <div class="cramb">
            <a href="<?=$cramb['uri'];?>">
                <?php if(array_key_exists('short_title', $cramb) && !is_null($cramb['short_title'])):?>
                <?=$cramb['short_title'];?>
                <?php else:?>
                <?=$cramb['name'];?>
                <?php endif?>
            </a>
        </div>
        <div class="separator">&nbsp;</div>
        <?php endforeach;?>
    </div>
<?php endif;