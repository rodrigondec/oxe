<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id='navbar' class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/index.php/oxe/sobre">Sobre</a></li>
                <li><a href="/index.php/cne/home">CNE</a></li>
                <!-- <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Torneios<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/oxe/index.php/cne/home">Atual</a>
                            <a href="/oxe/index.php/oxe/torneios">Anteriores</a>
                        </li>
                    </ul>
                </li> -->
                <?php 
                    if(isset($_SESSION['privilegio'])):
                        if($_SESSION['privilegio'] == 'capitao'):
                ?>
                <li><a href="/index.php/cne/time">Meu Time</a></li>
                <?php
                        elseif($_SESSION['privilegio'] == 'admin'):
                ?>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Admin<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/index.php/admin/listar_times">Times</a>
                            <a href="/index.php/admin/listar_capitaes">Capitaes</a>
                            <a href="/index.php/admin/listar_jogadores">Jogadores</a>
                        </li>
                    </ul>
                </li>
                <?php
                        endif;
                    endif;
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php 
                    if(isset($_SESSION['privilegio'])):
                        if($_SESSION['privilegio'] == 'admin'):
                ?>
                <li><a href="/index.php/configs">Configs</a></li>
                <li><a href="/admin/index.php">PHPMyAdmin</a></li>
                <?php
                        endif;
                    endif;
                ?>
                <li>
                    <?php 
                        if(isset($_SESSION['login'])){
                            echo "<a href='#' onclick='log_out()'>".$_SESSION['login']." (logout)</a>";
                        }
                        else{
                            echo "<a href='/index.php/login'>Iniciar Sessão</a>";
                        }
                    ?>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>