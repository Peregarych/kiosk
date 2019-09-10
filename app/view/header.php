<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="/style/main.css" rel="stylesheet" >
        <?php if(isset($styles) && is_array($styles)):?>
            <?php foreach($styles AS $style):?>
        <link href="<?=$style['href']?>" rel="stylesheet">
            <?php endforeach;?>
        <?php endif;?>
        <script src="/js/main.js" type="text/javascript"></script>
        <?php if(isset($scripts) && is_array($scripts)):?>
            <?php foreach($scripts AS $script):?>
        <script src="<?=$script['src']?>" type="text/javascript"></script>
            <?php endforeach;?>
        <?php endif;?>
    </head>