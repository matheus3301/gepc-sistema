<?php
    include 'include/nav.php';
    include 'controller/campus.php';
    include 'config/database.php';
?>
<div class="container mt-3 mb-5">
    <h2>Cadastro</h2>
    <div class="row">
    <div class="col-md-8">

    <div id="resposta">
    
    </div>    
    <form name="cadastro" id="formcadastro" onSubmit="cadastrar(event)">
    <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input required="" type="text"
                            class="form-control" name="nome" id="nome" placeholder="seu nome..." >
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                          <label for="">Matrícula</label>
                          <input required="" type="tel"
                            class="form-control" name="matricula" id="matricula"  placeholder="sua matricula..." >
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="curso">Curso</label>
                            <input list="cursos" required="" type="text"
                            class="form-control" name="curso" id="curso"  placeholder="seu curso..." >
                                <datalist id="cursos">
                                    <option value="Engenharia de Computação">
                                    <option value="Ciência da Computação">
                                    <option value="Sistemas de Informação">
                                    <option value="Sistemas e Midias Digitais">


                                    
                                </datalist>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="campus">Campus</label>
                          <select  class="form-control" name="campus" id="campus" required>
                              <option value="">selecione...</option>

                            <?php
                                $allCampus = getAllCampus($conexao);
                                foreach($allCampus as $campus){
                            ?>
                                <option value="<?php echo $campus['idtb_campus'];?>"><?php echo $campus['nome']; ?></option>
                            <?php
                                }
                            ?>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input required="" type="email"
                    class="form-control" name="email" id="email"   placeholder="seu email...">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input required="" type="password"
                                class="form-control" name="senha" id="senha"   placeholder="sua senha...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="senha">Confirmação de senha</label>
                            <input required="" type="password"
                                class="form-control" name="confirmasenha" id="confirmasenha" placeholder="confirme sua senha...">
                        </div>
                    </div>
                </div>
                <button id="submit" type="submit" class="btn btn-primary" style="float:right">Cadastrar</button>
</div>
</form>
</div>
</div>
<script>
    function mostrarMensagem(erro,tipo){
        if(tipo){
            $("#resposta").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sucesso!</strong> '+erro+'</div>');
        }else{
            $("#resposta").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Erro!</strong> '+erro+'</div>');
        }
    }

    function cadastrar(e){
        e.preventDefault();

        console.log("Cadastrando...");
	    let form = $("#formcadastro");

        if($("#senha").val() == $("#confirmasenha").val()){
            $.ajax({
                type:"POST",
                url: "controller/user.php?op=create",
                data: form.serialize(),
                processData: false,
                beforeSend:function(){
                    $("#submit").html("aguarde...");
                },
                success: function (data) {
                    if(data == "1"){   
                        mostrarMensagem("O seu cadastro foi enviado para avaliação, um de nossos Administradores verificar seus dados.Em breve você receberá um email confirmando seu cadastro, <a href='index.php'>clique aqui</a> para ser direcionado à pagina inicial",true);
              
                    }else{
                        mostrarMensagem("Ocorreu um erro ao editar suas informações, verifique os dados e tente novamente",false);
                    }

                    document.getElementById("formcadastro").reset();
                    $("#submit").html("Cadastrar");
                    $("#submit").attr("disabled",true);                    
                    console.log(data);
                },
                error: function (data) {
                    mostrarMensagem("Ocorreu um erro ao editar suas informações, sua conexão com a internet",false);
                    console.log('Erro de conexão...');
                },
                
            });
        }else{
            console.log("Senhas não conferem");
            mostrarMensagem("As senhas não conferem, tente novamente",false);
            $("#confirmasenha").val("");
            $("#senha").val("");            
        }

        
    }
</script>
<?php
    include 'include/footer.php';
?>