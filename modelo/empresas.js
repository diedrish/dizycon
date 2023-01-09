$(document).ready(function () {
    var editar = false;
var idEmpre="";
    
    listarEmpresas();

    $('#tablaEmpresas').DataTable({
        "ajax": {
            "url": "./controlador/crudEmpresas/buscarEmpresa.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idEmpresa" },
            { "data": "empresa" },
            { "data": "nit" },
            { "data": "nrc" },
            { "data": "giro" },
            { "data": "telefono" },
            { "data": "categoria" },
            { "data": "direccion" },
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
        $(".modal-title").text("Registrar Empresa");
        $("#modalCRUD").modal("show");
        id = null;
        editar = false;
    });


    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        editar = true;
        fila = $(this).closest("tr");
        idEmpresa = fila.find('td:eq(0)').text();
        nombre = fila.find('td:eq(1)').text();
        nit = fila.find('td:eq(2)').text();
        nrc = fila.find('td:eq(3)').text();
        giro = fila.find('td:eq(4)').text();
        telefono = fila.find('td:eq(5)').text();
        categoria = fila.find('td:eq(6)').text();
        direccion = fila.find('td:eq(7)').text();

        $("#txt_nombre").val(nombre);
        $("#txt_nit").val(nit);
        $("#txt_nrc").val(nrc);
        $("#txt_giro").val(giro);
        $("#txt_telefono").val(telefono);
        $("#txt_categoria").val(categoria);
        $("#txt_direccion").val(direccion);
        editar = true;
        idEmpre=idEmpresa;


        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Empresa");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        idEmpresa = parseInt($(this).closest("tr").find('td:eq(0)').text());


        empresa = parseInt($(this).closest("tr").find('td:eq(1)').text());

        var respuesta = confirm("¿Está seguro de eliminar la empresa : " + empresa + "?");
        if (respuesta) {
            $.ajax({
                url: "./controlador/crudEmpresas/borrarEmpresa.php",
                type: "POST",
                dataType: "json",
                data: { idEmpresa: idEmpresa },
                success: function () {
                    listarEmpresas();
                }
            });
        }
    });


    //para editar y guardar cuentas
    $('#form-Empresas').submit(e => {
        const postData = {
            nombre: $('#txt_nombre').val(),
            nit: $('#txt_nit').val(),
            nrc: $('#txt_nrc').val(),
            giro: $('#txt_giro').val(),
            telefono: $('#txt_telefono').val(),
            categoria: $('#txt_categoria').val(),
            direccion: $('#txt_direccion').val(),
            idEmpresa:idEmpre
        };
        var url = '';
        if (editar) {
            url = './controlador/crudEmpresas/editarEmpresa.php';
        } else {
            url = './controlador/crudEmpresas/crearEmpresa.php';
        }

        $.post(url, postData, function (response) {
            console.log(response);
            $('#form-Empresas').trigger('reset');
            listarEmpresas();

        });
        e.preventDefault();

        $("#modalCRUD").modal("hide");
        editar = false;
        idEmpre='';

    });

    //llenar tabla empresas.

    function listarEmpresas() {
        $.ajax({
            url: "./controlador/crudEmpresas/buscarEmpresa.php",
            method: "GET",
            success: function (respuesta) {
                const tasks = JSON.parse(respuesta);
                let template = '';
                tasks.forEach(task => {
                    template += `
                    <tr >
                 <td>${task.idEmpresa}</td>
                 <td>${task.empresa}</td>
                 <td>${task.nit}</td>
                 <td>${task.nrc}</td>
                 <td>${task.giro}</td>
                 <td>${task.telefono}</td>
                 <td>${task.categoria}</td>
                 <td>${task.direccion}</td>
                 <td><div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button> &nbsp <button class='btn btn-danger btnBorrar'>Borrar</button></div></div></td>
                 </tr>
                 `
                });
                $('#empresas').html(template);
            }
        });
    }




});
