
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
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <form>
                            <fieldset>
                                <div class="form-group">
                                    <select class="form-control" id="exampleSelect1">
                                        <option>Сортувати за спаданням ціни</option>
                                        <option>Сортувати за зростанням ціни</option>
                                        <option>Сортувати за зростанням рейтингу</option>
                                        <option>Сортувати за спаданням рейтингу</option>
                                    </select>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                    <?php foreach ($productList as $item):?>
                        <div class="row justify-content-start item-product">
                            <div class="col-xl-3 col-md-4 col-lg-3">
                                <div class="rate round"><?=$item['rate']?></div>
                                <a href="<?="/item/".$item['id_category']."/".$item['id']?>">
                                    <img src="<?=$item['img']?>" class="img-thumbnail" alt="">
                                </a>

                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-8">

                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th colspan="2">
                                            <a href="<?="/item/".$item['id_category']."/".$item['id']?>" class="name"><?=$item['name']?></a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <?=$item['description']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Ціна:</th>
                                        <td> <div class="price"> <?=$item['price']?> <?=$valut;?></div> </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach;?>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xl-offset-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                        <?= $pagination->get();?>
                    </div>
                </div>

            </div>
        </div>
    </div>



<?php HTML::printJs()?>
<?php HTML::endBody()?>
<?php HTML::endPage()?>