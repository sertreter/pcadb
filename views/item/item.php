
<?php HTML::startPage(); ?>
<?php HTML::startHead(); ?>
<?php HTML::setTitle('Home'); ?>
<?php HTML::printCss(); ?>
<?php HTML::endHead(); ?>
<?php HTML::startBody(); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once ROOT."/views/layout/head.php"?>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 hidden-xs row">
                <ul class="nav nav-border nav-pills nav-stacked col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" id="border">
                    <?php foreach ($categoryList as $item):?>
                        <li><a href="<?="/category/{$item['id']}"?>"><?=$item['name']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10 align-self-center">
                <div class="row justify-content-start">
                    <div class="col-xl-3 col-md-5 col-lg-5">
                        <div class="rate-main round"><?=$rate?></div>
                        <a href="#">
                            <img src="<?=$itemDesc['img_main'];?>" class="img-main" alt="">
                        </a>
                    </div>
                    <div class="col-xl-9 col-lg-6 col-md-4">
                        <div class="lead">
                            <a href="#"><?=$itemDesc['name'];?></a>
                        </div>
                        <p><?=$itemDesc['description']?></p>
                        <table>
                            <tr>
                                <th><p class="lead"><strong>Ціна:</strong></p></th>
                                <th><p class="lead"><strong> <?=$itemDesc['price'];?> <?=$valut?></strong></p></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <img src="<?=$itemDesc['img_main'];?>" class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 img-thumbnail img-show" alt="">
                   <? foreach ($img as $value):?>
                    <img src="<?=$value['directory']?>" class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 rounded img-show" alt="">
                   <? endforeach;?>
                     </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <h2>Характеристики</h2>
                    </div>
                </div>
                <div class="row desc">
                        <p class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <table class="table table-striped table-hover ">
                            <tbody>
                            <tr>
                                <th>Виробник:</th>
                                <td><?=$itemDesc['manufacturer']?></td>
                            </tr>
                            <?php foreach ($itemCategory as $key=>$value):?>
                            <tr>
                                <th><?=$key?>:</th>
                                <td><?=$value?></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        </p>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <h2>Опис</h2>
                    </div>
                </div>
                <div class="row desc">
                    <p class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <p class="lead"><?=$itemDesc['full_description']?></p>
                    </P>
                </div>
                <div class="row reviews">
                    <h2 class="row">Відгуки</h2>
                    <hr>
                    <div class="row desc">
                        <form action="#" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ім'я:</label>
                                    <? if(isset($errors['name'])):?>
                                        <?="<p class='error'>{$errors['name']}</p>"?>
                                    <? endif;?>
                                    <input type="text" name="name" class="form-control" placeholder="Ваше ім'я">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">Оцінка:</label>
                                    <? if(isset($errors['rate'])):?>
                                        <?="<p class='error'>{$errors['rate']}</p>"?>
                                    <? endif;?>
                                    <select class="form-control" name="rate" id="exampleSelect1">
                                        <option value="1">1</option>
                                        <option value="2" >2</option>
                                        <option value="3" >3</option>
                                        <option value="4" >4</option>
                                        <option value="5" >5</option>
                                        <option value="6" >6</option>
                                        <option value="7" >7</option>
                                        <option value="8" >8</option>
                                        <option value="9" >9</option>
                                        <option value="10" selected>10</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea">Відгук:</label>
                                    <? if(isset($errors['review'])):?>
                                        <?="<p class='error'>{$errors['review']}</p>"?>
                                    <? endif;?>
                                    <textarea class="form-control" name="review" id="exampleTextarea" rows="3"></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Додати коментар</button>
                            </fieldset>
                        </form>
                        </form>
                    </div>
                    <?php foreach ($reviewItem as $value):?>
                    <div class="row desc">
                        <hr>
                        <div class="row review">
                            <div class="round col-xl-1 col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                <img class="logo" src="../../template/dist/img/user.png" alt="">
                            </div>
                            <div class="lead login col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <?=$value['login'];?>
                            </div>
                            <div class="lead login col-xl-1 col-lg-2 col-md-2 col-sm-2 col-xs-3">Оцінка: <?=$value['rating']?></div>
                        </div>
                        <div class="row">
                            <blockquote>
                                    <div class="lead">
                                        <?=$value['review'];?>
                                    </div>
                                <div class="text-muted"><?=$value['date']?></div>
                            </blockquote>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php include_once ROOT."/views/layout/footer.php"?>
    </div>
<?php HTML::printJs()?>
<?php HTML::endBody()?>
<?php HTML::endPage()?>