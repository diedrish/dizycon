<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Creacion de Partidas</h1>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nueva Partida</button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPartidas" class="table table-striped table-bordered table-condensed"
                        style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>id Periodo</th>
                                <th>numero Partida</th>
                                <th>Concepto</th>
                                <th>Debe</th>
                                <th>Haber</th>
                                <th>diferencia</th>
                                <th>fecha</th>
                                <th>idEmpresa</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="partidas">

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
                <form id="form-Partidas">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_numeroPartida" class="col-form-label">Numero Partida</label>
                            <input type="text" class="form-control" id="txt_numeroPartida" autocomplete="off">

                        </div>
                        <div class="form-group">

                            <label for="txt_concepto" class="col-form-label">Concepto Partida </label>
                            <input type="text" class="form-control" id="txt_concepto" autocomplete="off">

                        </div>
                        <div class="form-group">
                            <label for="txt_fecha" class="col-form-label">Fecha</label>

                            <input type="date" id="txt_fecha" name="trip-start" value="" min="2023-01-01" max="2023-12-31">
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
<script type="text/javascript" src="./modelo/partidas.js"></script>

<?php require_once "vistas/parte_inferior.php" ?>