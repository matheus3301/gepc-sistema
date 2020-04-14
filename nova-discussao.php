<?php
    include 'include/navlogado.php';
    
?>
<div class="container mt-3 mb-5">
    <h2>Nova Discussão</h2>
    <div id="resposta"></div> 
    <div class="row">
        
        <div class="col-md-8 mt-5" >
            <div class="form-group">
                <label for="titulo">Título da Questão</label>
                <input type="text"
                    class="form-control" name="titulo" id="titulo"  placeholder="o nome da questão igual no judge">
            </div>
            <div class="form-group">
            <label for="">Link</label>
                <input type="text"
                    class="form-control" name="link" id="link" aria-describedby="helpId" placeholder="Ex: https://neps.academy/problem/2">
            </div>

        </div>
        
    </div>
    <form>

    


    </form>
</div> 
<?php
    include 'include/footer.php';
?>