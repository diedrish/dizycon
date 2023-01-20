$(document).ready(function () {
    var editar = false;

    listarPartidas();

    $('#tablaPartidas').DataTable({
        "ajax": {
            "url": "./controlador/crudPartidas/buscarPartida.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idPeriodo" },
            { "data": "numeroPartida" },
            { "data": "concepto" },
            { "data": "debe" },
            { "data": "haber" },
            { "data": "diferencia" },
            { "data": "fecha" },
            { "data": "idEmpresa" },
            {
                "targets": -1,
                "data": null,
                "defaultContent": "<td><div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button> &nbsp <button class='btn btn-danger btnBorrar'>Borrar</button> &nbsp <button class='btn btn-info btnAdd'>ADD</button></div></div></td>"

            }
        ]

    });



    $("#btnNuevo").click(function () {
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Registrar Partida");
        $("#modalCRUD").modal("show");
        id = null;
        editar = false;
        traerActual();
    });



    $("#btnAgregarPartida").click(function () {

        let tabla = document.getElementById('detallePartida').insertRow(0);
        let col1 = tabla.insertCell(0);
        let col2 = tabla.insertCell(1);
        let col3 = tabla.insertCell(2);
        let col4 = tabla.insertCell(3);
        var cuenta = $('#txt_codigo').val();
        var concepto = $('#txt_conceptoPartida').val();
        var debe = $('#txt_debe').val();
        var haber = $('#txt_haber').val();

        col1.innerHTML = cuenta;
        col2.innerHTML = concepto;
        col3.innerHTML = debe;
        col4.innerHTML = haber;




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
        idEmpre = idEmpresa;


        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Partida");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        idEmpresa = parseInt($(this).closest("tr").find('td:eq(0)').text());


        empresa = parseInt($(this).closest("tr").find('td:eq(1)').text());

        var respuesta = confirm("¿Está seguro de eliminar la partida : " + empresa + "?");
        if (respuesta) {
            $.ajax({
                url: "./controlador/crudPartidas/borrarPartida.php",
                type: "POST",
                dataType: "json",
                data: { idEmpresa: idEmpresa },
                success: function () {
                }
            });
        }
    });


    //para editar y guardar cuentas
    $('#form-Partidas').submit(e => {
        var periodo = "001";
        var empresa = "1";
        const postData = {
            numero: $('#txt_numeroPartida').val(),
            concepto: $('#txt_concepto').val(),
            fecha: $('#txt_fecha').val(),
            periodo: periodo,
            empresa: empresa
        };
        var url = '';
        if (editar) {
            url = './controlador/crudPartidas/editarPartida.php';
        } else {
            url = './controlador/crudPartidas/crearPartida.php';
        }
        

        $.post(url, postData, function (response) {




        });
        e.preventDefault();

        $("#modalCRUD").modal("hide");
        editar = false;
        idEmpre = '';
        

    });

    //llenar tabla partidas.

    function listarPartidas() {
        $.ajax({
            url: "./controlador/crudPartidas/buscarPartida.php",
            method: "GET",
            success: function (respuesta) {
                const tasks = JSON.parse(respuesta);
                let template = '';
                tasks.forEach(task => {
                    template += `
                    <tr >
                 <td>${task.idPeriodo}</td>
                 <td>${task.numeroPartida}</td>
                 <td>${task.concepto}</td>
                 <td>${task.debe}</td>
                 <td>${task.haber}</td>
                 <td>${task.diferencia}</td>
                 <td>${task.fecha}</td>
                 <td>${task.idEmpresa}</td>
                 <td><div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button> &nbsp <button class='btn btn-danger btnBorrar'>Borrar</button> &nbsp <button class='btn btn-info btnAdd'>ADD</button></div></div></td>
                 
                 </tr>
                 `
                });
                $('#partidas').html(template);
            }
        });
    }

    function traerActual() {

        $.ajax({
            url: "./controlador/crudPeriodos/buscarPeriodo.php",
            type: "POST",
            dataType: "json",
            data: {
                idEmpresa: "1",
                idPeriodo: "001"
            },
            success: function (respuesta) {


                $("#txt_numeroPartida").val(respuesta);

            }
        });

    }



    


   

});
