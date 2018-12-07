<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <form method="post" action="Home.php">
    <button class="navbar-brand btn btn-danger" type="submit">Click São Chico</button>
    </form>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <?php if(!isset($_SESSION['tipo'])){
            echo "<form action=\"Home.php\" method=\"post\">
            <input type=\"text\" class=\"text-hide\" name=\"acao\" value=\"formLogin\">
            <button type=\"submit\" class=\"btn btn-info\">Login</button>
        </form>";
        }

        elseif (isset($_SESSION['tipo']) and $_SESSION['tipo'] == 1){
            echo "<form action=\"\" method=\"post\">
            <input type=\"text\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-info\">". $_SESSION['usuario'] ."</button>
        </form>
        <form action=\"Home.php\" method=\"post\">
            <input type=\"text\" name=\"acao\" value=\"logout\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-outline-warning\">Logout</button>
        </form>";
        }

        elseif (isset($_SESSION['tipo']) and $_SESSION['tipo'] == 2){
            echo "<form action=\"\" method=\"post\">
            <input type=\"text\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-info\">". $_SESSION['usuario'] ."</button>
        </form>
        <form action=\"Home.php\" method=\"post\">
            <input type=\"text\" name=\"acao\" value=\"viewAdmin\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-info\">Área do Admin</button>
        </form>
        <form action=\"Home.php\" method=\"post\">
            <input type=\"text\" name=\"acao\" value=\"logout\" class=\"text-hide\">
            <button type=\"\" class=\"btn btn-outline-warning\">Logout</button>
        </form>";
        }

        ?>

    </div>
</nav>