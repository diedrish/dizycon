<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->

<!--INICIO del cont principal-->
<div class="container">
    <h1>Registro de Empresas</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaEmpresas" class="table table-striped table-bordered table-condensed"
                        style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>idEmpresa</th>
                                <th>Empresa</th>
                                <th>Nit </th>
                                <th>Nrc</th>
                                <th>Giro</th>
                                <th>Telefono</th>
                                <th>Categoria</th>
                                <th>Direccion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="empresas">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-Empresas">
                    <div class="modal-body">

                    
                        <div class="form-group">
                            <label for="txt_nombre" class="col-form-label">Nombre de Empresa</label>
                            <input type="text" class="form-control" id="txt_nombre"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                        </div>

                        
                        <div class="form-group">
                            <label for="txt_nit" class="col-form-label">Digite el numero de NIT</label>
                            <input type="text" class="form-control" id="txt_nit"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                        </div>

                        
                        <div class="form-group">
                            <label for="txt_nrc" class="col-form-label">Digite el NRC </label>
                            <input type="text" class="form-control" id="txt_nrc"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                        </div>

                        
                        <div class="form-group">
                            <label for="txt_direccion" class="col-form-label">Direccion Empresa</label>
                            <input type="text" class="form-control" id="txt_direccion"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                        </div>
                        
                        <div class="form-group">
                            <label for="txt_giro" class="col-form-label">Digite el Giro de la Empresa</label>
                            <input type="text" class="form-control" id="txt_giro"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                        </div>
                        
                        <div class="form-group">
                            <label for="txt_telefono" class="col-form-label">Telefono de Empresa</label>
                            <input type="text" class="form-control" id="txt_telefono"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="txt_categoria" class="col-form-label">Categoria de Empresa</label>
                            <input type="text" class="form-control" id="txt_categoria"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                        </div>




                       
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<!--FIN del cont principal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

 

  
    <!-- datatables JS -->
    <script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>    
    <!-- código propio JS --> 
    <script type="text/javascript" src="./modelo/empresas.js"></script>  

<?php require_once "vistas/parte_inferior.php" ?>