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
                    <li class="breadcrumb-item active">Керування комплектуючими</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 cil-xs-4 col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 cil-xs-offset-1">

                <a href="/admin/item/add" class="add row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 cil-xs-2"><span class="glyphicon glyphicon-plus"></span></div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 cil-xs-10"><h3>Додати</h3></div>
                </a>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 cil-xs-8 col-xl-offset-2 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 cil-xs-offset-2 ">

                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>Ім'я</th>
                        <th>Короткий опис</th>
                        <th>Ціна</th>
                        <th>Дата</th>
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php foreach ($list as $value):?>
                    <tr>
                        <td><?=$value['id']?></td>
                        <td><?=$value['name']?></td>
                        <td><?=$value['description']?></td>
                        <td><?=$value['price']?> USD</td>
                        <td><?=$value['date']?></td>
                        <td><a href="/admin/product/update/<?=$value['id']?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td><a href="/admin/product/delete/<?=$value['id']?>"><span class="glyphicon glyphicon-remove"></span></a></td>

                    </tr>
                <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php HTML::printJs()?>
<?php HTML::endBody()?>
<?php HTML::endPage()?>