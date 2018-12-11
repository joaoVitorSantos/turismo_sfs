
<script>
</script>

<body>
<div class="container">
<div class="row">
    <div class="col-md-3"></div>

    <div class="col-md-6 formLogin rounded" style="margin: 15% 0 15% 0; padding: 1em 1em 1em 1em">
    <form action="../controller/Home.php" method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" required name="email" class="form-control" id="email" placeholder="Seu email">
            <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com ninguém</small>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" required name="senha" class="form-control" id="password" placeholder="Senha">
        </div>
        <input type="text" class="text-hide" value="verificaLogin" name="acao">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
        <form action="Home.php" method="post">
            <input class="text-hide" name="acao" value="cadastroForm">
            <label for="btnCadastro">Nao tem um Cadastro?</label>
            <button class="btn btn-success btn-sm" id="btnCadastro" type="submit">Cadastrar</button>
        </form>
</div>
</div>
    <div class="marginFooter" style=""></div>
</div>