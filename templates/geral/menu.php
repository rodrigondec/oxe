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
                <li><a href="/oxe/index.php/oxe/sobre">Sobre</a></li>
                <li><a href="/oxe/index.php/cne/home">Torneio</a></li>
                <!-- <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Torneios<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/oxe/index.php/cne/home">Atual</a>
                            <a href="/oxe/index.php/oxe/torneios">Anteriores</a>
                        </li>
                    </ul>
                </li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php 
                            if(isset($_SESSION['login'])){
                                echo "<a href='#' onclick='log_out()'>".$_SESSION['login']." (logout)</a>";
                            }
                            else{
                                echo "<a href='/oxe/login.php'>Iniciar Sessão</a>";
                            }
                        ?>
                    </li>
                </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

