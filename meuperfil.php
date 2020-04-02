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
    <form action="">
    <div class="row mt-5 mb-5">
    <?php
        $user = getUser($_SESSION['id'],$conexao);
                
        if($user['img'] == null){
           $user['img'] = 'img/user/default.png';
        }
    ?>
        <div class="col-md-4">
            <img class="img-profile mb-5" src="<?php echo $user['img'];?>" id="output" alt="Foto">
            
            <span class="btn btn-lg btn-primary btn-file text-white" style="width:250px;background-color:#07243d" ></i>
                Buscar Foto <input type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
            </span>
            
        </div>
        <div class="col-md-8">
            
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
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email"
                    class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>" disabled placeholder="seu email">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Curso</label>
                            <input type="text"
                            class="form-control" name="nome" id="nome" value="<?php echo $user['curso'] ?>" placeholder="seu nome..." disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Campus</label>
                          <select disabled class="form-control" name="" id="">
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
                  <textarea class="form-control" name="biografia" id="biografia" rows="3" disabled></textarea>
                </div>
            
        </div>
    </div>
    </form>
</div>
<?php
		include 'include/footer.php';
?>