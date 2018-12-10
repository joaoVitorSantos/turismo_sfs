<script>
    function validarSenha(form){
        senha = document.getElementById('password').value;
        senhaRepetida = document.getElementById('password_rp').value;
        if (senha != senhaRepetida){
            alert("Repita a senha corretamente");
            document.getElementById('password_rp').focus();
            return false;
        }
    }

    $(document).ready(function () {
       $('.formulario').submit(function () {
           var email = $('#email').val();
           $.post("../controller/Home.php", {acao: verificaEmail, email: email}, function (data, status) {
               if (data = 'falso'){
                   alert('Email ja cadastrado!');
                   $('#email').focus();
                   return false;
               }
          });
       });
    });
</script>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6 formLogin rounded" style="margin: 15% 0 15% 0; padding: 1em 1em 1em 1em">
            <form action="../controller/Home.php" method="post" onsubmit="return validarSenha(this);" class="formulario">
                <div class="form-group">
                    <label for="email">Endereço de Email</label>
                    <input type="email" required name="email" class="form-control" id="email" placeholder="Seu email">
                    <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com ninguém</small>
                </div>
                <div class="form-group">
                    <label for="user">Nome de Usuário</label>
                    <input type="text" required name="user" class="form-control" id="user" placeholder="Usuário">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" required name="senha" class="form-control senha" id="password" placeholder="Senha">
                </div>
                <div class="form-group">
                    <label for="password_rp">Repita sua Senha</label>
                    <input type="password" required name="senha_rp" class="form-control password_rp" id="password_rp" placeholder="Repita sua Senha">
                </div>
                <input type="text" class="text-hide" value="cadastroUsuario" name="acao">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
    <div class="marginFooter" style="margin-bottom: 110%"></div>
</div>