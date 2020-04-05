<?php
    include 'include/navlogado.php';
    
?>
<link rel="stylesheet" type="text/css" href="plugins/dataables/datatables.min.css"/>
<style>
.clickable-row{
    cursor:pointer;
}
label{
    display:inline;
}
</style>

<div class="container mt-3 mb-5">
    <h2>Fórum</h2>
    <span>O fórum é um ambiente para discutir questões. Para conhecer as regras e como usar, <a href="#" data-toggle="modal" data-target="#modalTutorial">clique aqui</a>.</span>
        <div class="modal fade" id="modalTutorial" tabindex="-1" role="dialog" aria-labelledby="modalTutorial" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Como usar o fórum</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac porttitor dui, eu lacinia lacus. Etiam tristique tempor elit, vehicula mattis mi porttitor sed. Proin feugiat, eros iaculis blandit aliquet, nulla purus consectetur nulla, vel tempus nunc lectus quis ex. Suspendisse in aliquam eros. Aenean condimentum nec mi et semper. Morbi non erat libero. Etiam aliquam varius orci ac pretium. Nam eget ullamcorper risus. Nunc maximus nunc a erat lobortis commodo. Ut nisi eros, sodales at sapien et, elementum pretium nulla. Nunc sit amet nunc quis turpis auctor lacinia. Nulla egestas non quam sed accumsan. Quisque posuere ac tellus volutpat aliquet.

                Integer eget rhoncus lorem. In porta, libero non dapibus tristique, elit nulla facilisis nunc, eget accumsan lorem mauris a arcu. Aliquam sagittis imperdiet arcu et tincidunt. Vivamus sit amet est sed augue rhoncus faucibus. Nam sed magna magna. Nam vestibulum ipsum vitae congue pretium. Mauris mollis et leo sed mollis.

                Cras libero mauris, dapibus vel lobortis malesuada, laoreet mollis urna. Vivamus accumsan augue eget metus semper ornare. Fusce fermentum justo fermentum mollis tristique. Nam malesuada felis vel tempor aliquam. Sed elementum tempus leo vitae tincidunt. Nam finibus luctus dui eget viverra. Cras at scelerisque sem, blandit tincidunt magna.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Entendi</button>
                </div>
            </div>
        </div>
    </div> 
    <div id="resposta" class="mb-5"></div>
    <table id="tabela" class="table table-hover mt-3">
        <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Judge</th>
            </tr>
            </thead>
            <tbody>            
                <tr class='clickable-row' data-href='discussao.php?id=1'>
                   <td scope="row">1</td>
                    <td>Danone 2D</td>
                    <td>Neps</td>
                </tr>          

                <tr>
                    <td scope="row">2</td>
                    <td>Greatest Common Divisor</td>
                    <td>URI</td>
                </tr>
            </tbody>
    </table>



</div>
 

<?php
    include 'include/footer.php';
?>
<script type="text/javascript" src="plugins/datatables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            language:{
                url:'plugins/datatables/Portuguese-Brasil.json'
            }
        });
    } );

    jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
