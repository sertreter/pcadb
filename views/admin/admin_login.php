
<?php HTML::startPage(); ?>
<?php HTML::startHead(); ?>
<?php HTML::setTitle('Home'); ?>
<?php HTML::printCss(); ?>
<?php HTML::endHead(); ?>
<?php HTML::startBody(); ?>
<div class="container-fluid">
<?php include_once ROOT."/views/admin/header_admin.php"?>
    <div class="row">
        <form method="post" action="http://<?=$_SERVER['SERVER_NAME']?>/admin" class="col-xl-4 col-lg-4 col-md-6 col-sm-6 cil-xs-8 col-xl-offset-4 col-lg-offset-4 col-md-offset-3 col-sm-offset-3 cil-xs-offset-2">
        <fieldset>
            <legend>Панель адміністратора</legend>
            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" name="login" id="exampleInputEmail1"  placeholder="Enter login">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" >Password</label>
                <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">

                <input type="submit" name="submit" class="form-control" id="exampleInputPassword1" value="SUBMIT">
            </div>
        </fieldset>
        </form>
    </div>
</div>
<?php HTML::printJs()?>
<?php HTML::endBody()?>
<?php HTML::endPage()?>