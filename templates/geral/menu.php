<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="/">!!! LOGO OxE !!!</a> -->
            <a class="navbar-brand" href="/oxe/">!!! LOGO OxE !!!</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#">Torneios<b class="caret"></b></a>
                    
                </li>
                <li class="dropdown">
                    <a href="#">Sobre<b class="caret"></b></a>
                </li>
                <li>
                    <a href='#' onclick='log()' style="float: right;">
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


