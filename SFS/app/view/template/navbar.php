<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <form method="post" action="Home.php">
        <button class="btn btn-danger" type="submit"><img class="" id="iconNav" src="../../assets/open_iconic/png/home-3x.png" alt="icon name"></button>
        <button class="navbar-brand btn btn-danger titulonav" type="submit">Click São Chico</button>
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline my-2 my-lg-0 formNav" action="Index.php" method="post">
           <button class="btn btn-info my-2 my-sm-0" id="btnSearch" type="submit">PT/EN</button>
        </form>
        <?php if (isset($_SESSION['lang'])){ ?>
        <form class="form-inline my-2 my-lg-0" action="Home.php" method="post">
            <input class="text-hide" name="acao" value="pesquisa">
            <input class="form-control mr-sm-2" type="search" name="termo" placeholder="<?php if ($_SESSION['lang'] == 'en'){traduzir('Procure');} else {echo 'Procure';}?>" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" id="btnSearch" type="submit"><?php if ($_SESSION['lang'] == 'en'){traduzir('Pesquisar');} else {echo 'Pesquisar';}?></button>
        </form>
        <?php } ?>
<?php if (isset($_SESSION['lang'])){ ?>
        <?php if(!isset($_SESSION['tipo'])){
            echo "<form class=\"formNav\"  action=\"Home.php\" method=\"post\">
            <input type=\"text\" class=\"text-hide\" name=\"acao\" value=\"formLogin\">
            <button type=\"submit\" class=\"btn btn-info\">Login</button>
        </form>";
        }

        elseif (isset($_SESSION['tipo']) and $_SESSION['tipo'] == 1){
            echo "<form class=\"formNav\" action=\"\" method=\"post\">
            <input type=\"text\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-info\">". $_SESSION['usuario'] ."</button>
        </form>
        <form class=\"formNav\" action=\"Home.php\" method=\"post\">
            <input type=\"text\" name=\"acao\" value=\"logout\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-outline-warning\">Logout</button>
        </form>";
        }

        elseif (isset($_SESSION['tipo']) and $_SESSION['tipo'] == 2){
            echo "<form class=\"formNav\" action=\"\" method=\"post\">
            <input type=\"text\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-info\">". $_SESSION['usuario'] ."</button>
        </form>
        <form class=\"formNav\" action=\"Home.php\" method=\"post\">
            <input type=\"text\" name=\"acao\" value=\"viewAdmin\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-info\">Área do Admin</button>
        </form>
        <form class=\"formNav\" action=\"Home.php\" method=\"post\">
            <input type=\"text\" name=\"acao\" value=\"logout\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-outline-warning\">Logout</button>
        </form>";
        }

        ?>
<?php } ?>
    </div>
</nav>