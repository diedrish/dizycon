$(document).ready(function () {
    var editar = false;
    listarMaestroCuentas();

    Listarempresas();
    $('#tablaMaestroCuentas').DataTable({
        "ajax": {
            "url": "./controlador/crudMaestroCuentas/buscarCuenta.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "codigo" },
            { "data": "empresa" },
            { "data": "tipo" },
            { "data": "cuenta" },
            { "data": "costo" },
            { "data": "movimiento" },
            { "data": "rubro" },
            { "data": "cuentaMayor" },
             {
                "targets": -1,
                "data": null,
                "defaultContent": "<td><div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button> &nbsp <button class='btn btn-danger btnBorrar'>Borrar</button></div></div></td>"
                
            }
        ]

    });



    $("#btnNuevo").click(function () {
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Registrar nueva Cuenta");
        $("#modalCRUD").modal("show");
        id = null;
        editar = false;
    });


    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        editar = true;
        fila = $(this).closest("tr");
        codigo = parseInt(fila.find('td:eq(0)').text());
        idEmpresa = fila.find('td:eq(1)').text();
        tipoCuenta = fila.find('td:eq(2)').text();
        nombreCuenta = fila.find('td:eq(3)').text();
        centroCosto = fila.find('td:eq(4)').text();
        movimiento = fila.find('td:eq(5)').text();
        rubro = fila.find('td:eq(6)').text();
        cuentaMayor = fila.find('td:eq(7)').text();

        $("#txt_codigo").val(codigo);

        $("#txt_idEmpresa").value = idEmpresa;;
        $("#txt_tipo").value = tipoCuenta;
        $("#txt_nombre").val(nombreCuenta);
        $("#txt_centroCosto").value = centroCosto;
        $("#txt_movimiento").value = movimiento;
        $("#txt_rubro").value = rubro;
        $("#txt_cuentaMayor").val(cuentaMayor);
        editar = true;


        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Maestro Cuentas");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        codigo = parseInt($(this).closest("tr").find('td:eq(0)').text());


        empresa = parseInt($(this).closest("tr").find('td:eq(1)').text());

        var respuesta = confirm("¿Está seguro de eliminar la cuenta  con codigo : " + codigo + "?");
        if (respuesta) {
            $.ajax({
                url: "./controlador/crudMaestroCuentas/borrarCuenta.php",
                type: "POST",
                dataType: "json",
                data: { codigo: codigo, empresa: empresa },
                success: function () {
                    listarMaestroCuentas();
                }
            });
        }
    });


    //para editar y guardar cuentas
    $('#form-MaestroCuentas').submit(e => {
        const postData = {
            codigo: $('#txt_codigo').val(),
            empresa: $('#txt_idEmpresa').val(),
            tipo: $('#txt_tipo').val(),
            cuenta: $('#txt_nombre').val(),
            costo: $('#txt_centroCosto').val(),
            movimiento: $('#txt_movimiento').val(),
            rubro: $('#txt_rubro').val(),
            cuentaMayor: $('#txt_cuentaMayor').val()
        };
        var url = '';
        if (editar) {
            url = './controlador/crudMaestroCuentas/editarCuenta.php';
        } else {
            url = './controlador/crudMaestroCuentas/crearCuenta.php';
        }

        $.post(url, postData, function (response) {
            console.log(response);
            listarMaestroCuentas();
            $('#form-MaestroCuentas').trigger('reset');

        });
        e.preventDefault();

        $("#modalCRUD").modal("hide");
        editar = false;

    });



    //llenar empresas.
    function Listarempresas() {

        $.ajax({
            type: "GET",
            url: './controlador/crudEmpresas/buscarEmpresa.php',
            data: {


            },
            dataType: "json",
            success: function (data) {
                $.each(data, function (key, registro) {
                    console.log(registro);

                    $("#txt_idEmpresa").append('<option value=' + registro.idEmpresa + '>' + registro.empresa + '</option>');
                });
            },
            error: function (data) {

            }
        });
    }


    //llenar tabla.

    function listarMaestroCuentas() {
        $.ajax({
            url: "./controlador/crudMaestroCuentas/buscarCuenta.php",
            method: "GET",
            success: function (respuesta) {
                const tasks = JSON.parse(respuesta);
                let template = '';
                tasks.forEach(task => {
                    template += `
                    <tr >
                 <td>${task.codigo}</td>
                 <td>${task.empresa}</td>
                 <td>${task.tipo}</td>
                 <td>${task.cuenta}</td>
                 <td>${task.costo}</td>
                 <td>${task.movimiento}</td>
                 <td>${task.rubro}</td>
                 <td>${task.cuentaMayor}</td>
                 <td><div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button> &nbsp <button class='btn btn-danger btnBorrar'>Borrar</button></div></div></td>
                 </tr>
                 `
                });
                $('#catalogo').html(template);
            }
        });
    }




});
