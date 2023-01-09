<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Catalogo de Cuentas</h1>
    

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
                        <table id="tablaMaestroCuentas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Codigo Cuenta</th>
                                <th>Empresa</th>
                                <th>Tipo Cuenta</th>                                
                                <th>Nombre</th>  
                                <th>Centro Costo</th>
                                <th>Movimiento</th>
                                <th>Rubro</th>
                                <th>Cuenta Mayor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="catalogo">
                                                 
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="form-MaestroCuentas">    
            <div class="modal-body">
                
                <div class="form-group">
                <label for="txt_codigo" class="col-form-label" >Codigo Cuenta</label>
                <input type="text"  class="form-control" id="txt_codigo" autocomplete="off" >

              </div>
              <div class="form-group">
                
                <label for="txt_idEmpresa" class="col-form-label">Empresa </label>
                <select name="txt_idEmpresa" id="txt_idEmpresa" autocomplete="off">
                  
                </select>
              </div>
              <div class="form-group">
                <label for="txt_tipo" class="col-form-label">Tipo Cuenta</label>
                <select name="txt_tipo" id="txt_tipo" autocomplete="off">
                  <option value="activo">Activo</option>
                  <option value="pasivo">Pasivo</option>
                  <option value="capital">Capital</option>
                  <option value="resultados">Resultados</option>
                </select>
              </div>
              <div class="form-group">
                <label for="txt_nombre" class="col-form-label">Nombre de cuenta</label>
                <input type="text" class="form-control" id="txt_nombre"onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="txt_centroCosto" class="col-form-label">Centro de Costo</label>
                <select name="txt_centroCosto" id="txt_centroCosto" autocomplete="off">
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </div>
              <div class="form-group">
                <label for="txt_movimiento" class="col-form-label">Acepta Movimiento</label>
                <select name="txt_movimiento" id="txt_movimiento" autocomplete="off" >
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </div>
              <div class="form-group">
                <label for="txt_rubro" class="col-form-label">Rubro</label>
                <select name="txt_rubro" id="txt_rubro" autocomplete="off">
                  <option value="deudor">Deudor</option>
                  <option value="acreedor">Acreedor</option>
                </select>
              </div>
              <div class="form-group">
                <label for="txt_cuentaMayor" class="col-form-label">Numero Cuenta Mayor</label>
                <input type="text" class="form-control" id="txt_cuentaMayor" autocomplete="off" >
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
    <script type="text/javascript" src="./modelo/maestroCuentas.js"></script>  

<?php require_once "vistas/parte_inferior.php"?>