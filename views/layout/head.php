<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?=$_SERVER['SERVER_NAME']?>">Brand</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Грошові одиниці <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/UAH">UAH</a></li>
                    <li><a href="/EUR">EUR</a></li>
                    <li><a href="/USD">USD</a></li>

                </ul>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-right" role="search" method="post" action="http://<?=$_SERVER['SERVER_NAME']?>/search/">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button type="submit" name="sub_search" class="btn btn-default">Знайти</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
            </ul>
        </div>
    </div>
</nav>