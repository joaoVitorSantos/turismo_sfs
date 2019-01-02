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
       $('#email').change(function () {
           var email = $('#email').val();
           $.post("../controller/Home.php", {acao: 'verificaE', email: $('#email').val()}, function (data) {

               if (data == email + 'falso'){
                   $('#btnEnviar').addClass('disabled');
                   alert('Email ja cadastrado!');
                   return false;
               }

               else if (data == email+ 'suave'){
                   $('#btnEnviar').removeClass('disabled');
               }
          });
       });

        $( ".formulario" ).validate({
            highlight: function(element) {
                $(element).parent().parent().addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).parent().parent().removeClass('has-error');
            },
            debug: false,
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                user:{
                    required: true,
                    rangelength: [3,18]
                },
                senha:{
                    required: true,
                    rangelength: [6,18]
                },

                senha_rp:{
                    required: true,

                }
            },
            messages: {
                email: {
                    required: 'Esse campo é obrigatorio!',
                    email: 'Endereço de email inválido!'
                },

                user: {
                    required: 'Esse campo é obrigatorio!',
                    rangelength: 'Utilize no mínimo 3 e no máximo 18 caracteres!'
                },

                senha: {
                    required: 'Esse campo é obrigatorio!',
                    rangelength: 'Utilize no mínimo 6 e no máximo 18 caracteres!'
                },

                senha_rp: {
                    required: 'Esse campo é obrigatorio!'
                }
            }
        });

        $('#btnEnviar').click(function () {
            if ($('#email').hasClass('border-danger')){
                $('#email').focus();
                alert('Email ja cadastrado!');
            }

            else {
                $('.formulario').submit();
            }
        })
    });


</script>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6 formLogin rounded" style="margin: 15% 0 15% 0; padding: 1em 1em 1em 1em">
            <form action="../controller/Home.php" method="post" onsubmit="return validarSenha(this);" class="formulario">
                <div class="form-group">
                    <label for="email"><?php if ($_SESSION['lang'] == 'en'){traduzir("Endereço de email");} else {echo "Endereço de email";}?></label>
                    <input type="email" required="required" name="email" class="form-control" id="email" placeholder="<?php if ($_SESSION['lang'] == 'en'){traduzir("Seu email");} else {echo "Seu email";}?>">
                    <small id="emailHelp" class="form-text text-muted"><?php if ($_SESSION['lang'] == 'en'){traduzir("Nunca compartilharemos seu email com ninguém");} else {echo "Nunca compartilharemos seu email com ninguém";}?></small>
                </div>
                <div class="form-group">
                    <label for="user"><?php if ($_SESSION['lang'] == 'en'){traduzir("Nome de Usuário");} else {echo "Nome de Usuário";}?></label>
                    <input type="text" required="required" name="user" class="form-control" id="user" placeholder="<?php if ($_SESSION['lang'] == 'en'){traduzir("Usuário");} else {echo "Usuário";}?>">
                </div>
                <div class="form-group">
                    <label for="password"><?php if ($_SESSION['lang'] == 'en'){traduzir("Senha");} else {echo "Senha";}?></label>
                    <input type="password" required="required" name="senha" class="form-control senha" id="password" placeholder="<?php if ($_SESSION['lang'] == 'en'){traduzir("Senha");} else {echo "Senha";}?>">
                </div>
                <div class="form-group">
                    <label for="password_rp"><?php if ($_SESSION['lang'] == 'en'){traduzir("Repita sua Senha");} else {echo "Repita sua Senha";}?></label>
                    <input type="password" required="required" name="senha_rp" class="form-control password_rp" id="password_rp" placeholder="<?php if ($_SESSION['lang'] == 'en'){traduzir("Repita sua Senha");} else {echo "Repita sua Senha";}?>">
                </div>
                <input type="text" class="text-hide" value="cadastroUsuario" name="acao">
                <button type="button" id="btnEnviar" class="btn btn-primary disabled"><?php if ($_SESSION['lang'] == 'en'){traduzir("Enviar");} else {echo "Enviar";}?></button>
            </form>
        </div>
    </div>
    <div class="marginFooter" style=""></div>
</div>