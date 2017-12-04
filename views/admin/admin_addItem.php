<?php HTML::startPage(); ?>
<?php HTML::startHead(); ?>
<?php HTML::setTitle('Home'); ?>
<?php HTML::printCss(); ?>
<?php HTML::endHead(); ?>
<?php HTML::startBody(); ?>
    <div class="container-fluid">
        <?php include_once ROOT."/views/admin/header_admin.php"?>
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 cil-xs-5 col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 cil-xs-offset-1">
                <ol class="breadcrumb col-xl-10">
                    <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                    <li class="breadcrumb-item"><a href="/admin/item">Керування комплектуючими</a></li>
                    <li class="breadcrumb-item active">Додати продукт категорії</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 cil-xs-8 col-xl-offset-4 col-lg-offset-4 col-md-offset-3 col-sm-offset-3 cil-xs-offset-2">
                <form method="post" action="/admin/item"  enctype="multipart/form-data">
                    <fieldset>
                        <legend>Додати комплектуючу</legend>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ім'я</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Виробник</label>
                            <input type="text" class="form-control" name="manufacturer" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Короткий опис</label>
                            <input type="text" class="form-control" name="description" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Повний опис</label>
                            <textarea class="form-control" name="full_description" id="exampleTextarea" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                                <label class="control-label" for="disabledInput">Категорія</label>
                                <input class="form-control" id="disabledInput" type="hidden" name="category" value="<?=$category['alias']?>" placeholder="Категорія">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ціна</label>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Ціна</label>
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input type="number" class="form-control" name="price" id="exampleInputAmount" placeholder="сума">
                                    <div class="input-group-addon">USD</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Файл зображення</label>
                            <input type="file" name="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>

                        <hr>
                        <?php foreach ($property as $key=>$value):?>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?=$value?></label>
                            <input type="text" name="table[<?=$key?>]" class="form-control" id="exampleInputPassword1">
                        </div>
                        <?php endforeach;?>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php HTML::printJs()?>
<?php HTML::endBody()?>
<?php HTML::endPage()?>