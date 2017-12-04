
<?php HTML::startPage(); ?>
<?php HTML::startHead(); ?>
<?php HTML::setTitle('Home'); ?>
<?php HTML::printCss(); ?>
<?php HTML::endHead(); ?>
<?php HTML::startBody(); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once ROOT.'/views/layout/head.php'?>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 hidden-xs row">
                <ul class="nav nav-border nav-pills nav-stacked col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" id="border">
                    <?php foreach ($categoryList as $item):?>
                    <li><a href="<?="/category/{$item['id']}"?>"><?=$item['name']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10 align-self-center">
                <?include_once ROOT."/views/layout/Sort.php"?>
                <div class="item-list">
                    <?include_once ROOT.'/views/layout/ItemList.php'?>
                </div>
            </div>
        </div>
        <?php include_once ROOT."/views/layout/footer.php"?>
    </div>
<?php HTML::printJs()?>
<?php HTML::endBody()?>
<?php HTML::endPage()?>