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
                <form method="post" action="/admin/category/additem">
                    <fieldset>
                        <legend>Додати категорію</legend>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ім'я</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Аліас</label>
                            <input type="text" class="form-control" name="alias" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Кількість полів</label>
                            <input type="number" class="form-control" name="count_col" id="exampleInputPassword1">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php HTML::printJs()?>
<?php HTML::endBody()?>
<?php HTML::endPage()?>