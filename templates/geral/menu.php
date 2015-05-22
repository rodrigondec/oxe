<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/oxe/">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Torneios</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href='#' onclick='log()'>
                            <?php  
                                if(isset($_SESSION['login'])){
                                    echo $_SESSION['login'].' (logout)';
                                }
                                else{
                                    echo 'Iniciar Sessão';
                                }
                            ?>
                        </a>
                    </li>
                </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

