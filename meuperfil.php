<?php
    include 'include/navlogado.php';
    include 'controller/user.php';
    include 'controller/campus.php';
    include 'config/database.php';
?>
<style>
.img-profile{
    object-fit: cover;

    border-radius:50%;
    border-style:solid;
    border-color:#07243d;
    border-width: 4px;

    width:256px;
    height:256px;

}
.btn.btn-file {
  position: relative;
  overflow: hidden;
}
.btn.btn-file > input[type='file'] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  max-width: 100%;

  min-height: 100%;
  font-size: 100px;
  text-align: right;
  opacity: 0;
  filter: alpha(opacity=0);
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
</style>
<script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<div class="container">
    <h2 class="mt-3">Meu Perfil</h2>

    <form onsubmit="update(event)" id="form" enctype='multipart/form-data'>
    <div class="row mt-5 mb-5">
    <?php
        $user = getUser($_SESSION['id'],$conexao);
                
        if($user['img'] == null){
           $user['img'] = 'img/user/default.png';
        }
    ?>
        <div class="col-md-4 text-center mb-5">
            <img class="img-profile mb-5" src="<?php echo $user['img'];?>" id="output" alt="Foto">
            
            <span id="btn-img" class="btn btn-lg btn-primary btn-file text-white" style="width:250px;background-color:#07243d;display:none" ></i>
                Buscar Foto <input id="imagem" type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
            </span>
            
        </div>
        <div class="col-md-8">
                <div id="resposta">
                
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text"
                            class="form-control" name="nome" id="nome" value="<?php echo $user['nome'] ?>" placeholder="seu nome..." disabled>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                          <label for="">Matrícula</label>
                          <input type="text"
                            class="form-control" name="matricula" id="matricula" value="<?php echo $user['matricula'] ?>" placeholder="matricula..." disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input type="text"
                            class="form-control" name="cargo" id="cargo" value="<?php echo ucfirst( $user['tipo']); ?>" placeholder="seu cargo..." disabled>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                          <label for="">Data de Cadastro</label>
                          <input type="text"
                            class="form-control" name="desde" id="desde" value="<?php echo date("d/m/Y",strtotime($user['desde'])) ?>" placeholder="desde..." disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email"
                    class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>" disabled placeholder="seu email">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="curso">Curso</label>
                            <input type="text"
                            class="form-control" name="curso" id="curso" value="<?php echo $user['curso'] ?>" placeholder="seu curso..." disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="campus">Campus</label>
                          <select disabled class="form-control" name="campus" id="campus" required>
                              <option value="">selecione...</option>

                            <?php
                                $allCampus = getAllCampus($conexao);
                                foreach($allCampus as $campus){
                            ?>
                                <option value="<?php echo $campus['idtb_campus'];?>" <?php if($campus['idtb_campus'] == $user['campus']){echo 'selected';}?>><?php echo $campus['nome']; ?></option>
                            <?php
                                }
                            ?>
                          </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="biografia">Biografia</label>
                  <textarea class="form-control" name="biografia" id="biografia" rows="3" disabled><?php echo $user['biografia']; ?></textarea>
                </div>

                <button id="editar" onClick="edit()" type="button" class="btn btn-primary ml-2" style="float:right">Editar</button>
                <button  id="submit" type="submit" class="btn btn-success" style="float:right;display:none">Salvar</button>                 

        </div>
    </div>
    </form>

    <script>
        var editando = false;
        var info = {
            
        };

        function mostrarMensagem(erro,tipo){
            if(tipo){
                $("#resposta").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sucesso!</strong> '+erro+'</div>');
            }else{
                $("#resposta").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Erro!</strong> '+erro+'</div>');
            }
        }

        function edit(){
            if(!editando){
                editando = true;

                info.imagem = $("#output").attr("src");
                info.nome = $("#nome").val();
                info.email = $("#email").val();
                info.curso = $("#curso").val();
                info.biografia = $.trim($("#biografia").val());
                info.campus = $("#campus option:selected").val();

                $("#editar").html("Cancelar");
                $("#submit").show();
                $("#btn-img").show();

                document.getElementById("nome").disabled = false;
                document.getElementById("email").disabled = false;
                document.getElementById("curso").disabled = false;
                document.getElementById("biografia").disabled = false;
                document.getElementById("campus").disabled = false;

                console.log(info);
            }else{
                editando = false;

                $("#editar").html("Editar");
                $("#submit").hide();
                $("#btn-img").hide();

                $("#output").attr("src",info.imagem);
                $("#nome").val(info.nome);
                $("#email").val(info.email);
                $("#curso").val(info.curso);
                $("#biografia").val(info.biografia);
                $("#campus").val(info.campus);

                document.getElementById("nome").disabled = true;
                document.getElementById("email").disabled = true;
                document.getElementById("curso").disabled = true;
                document.getElementById("biografia").disabled = true;
                document.getElementById("campus").disabled = true;
            }
        }

        function update(e){
            e.preventDefault();

            console.log("Logging...");
			let form = $("#form");

            info.file = $("#imagem").prop('files');

            if(info.file.length > 0){
                        let formData = new FormData();

                        formData.append('file',info.file[0]);

                        $.ajax({
                            async: true,
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,                           
                            url : "controller/user.php?op=updateimage",
                            type : 'post',
                            
                            beforeSend : function(){
                                                                
                            }
                            })
                            .done(function(msg){
                                console.log(msg);                          
                                
                            })
                            .fail(function(jqXHR, textStatus, msg){
                                alert(msg);
                            });      
            }



            $.ajax({
                type:"POST",
                url: "controller/user.php?op=update",
                data: form.serialize(),
                processData: false,
                beforeSend:function(){
                    $("#submit").html("aguarde...");
                },
                success: function (data) {
                    if(data == "1"){


                        console.log("Shooww");
                        editando = false;                    

                        $("#editar").html("Editar");                        
                        $("#submit").hide();
                        $("#btn-img").hide();

                        document.getElementById("nome").disabled = true;
                        document.getElementById("email").disabled = true;
                        document.getElementById("curso").disabled = true;
                        document.getElementById("biografia").disabled = true;
                        document.getElementById("campus").disabled = true;
                        
                        info.imagem = $("#output").attr("src");

                        info.nome = $("#nome").val();
                        info.email = $("#email").val();
                        info.curso = $("#curso").val();
                        info.biografia = $.trim($("#biografia").val());
                        info.campus = $("#campus option:selected").val();
    
                        mostrarMensagem("Informações alteradas no sistema!",true);



                    
                    }else{
                        mostrarMensagem("Ocorreu um erro ao editar suas informações, verifique os dados e tente novamente",false);
                       

                    }


                    $("#submit").html("Salvar");
                    console.log(data);
                },
                error: function (data) {
                    mostrarMensagem("Ocorreu um erro ao editar suas informações, sua conexão com a internet",false);

                    console.log('Erro de conexão...');
                },
                
            });
        }

    </script>
</div>
<?php
		include 'include/footer.php';
?>