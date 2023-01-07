$(document).ready(function () {

  listarMaestroCuentas();
  Listarempresas();



  //agregar cuentas solo metodos
  $('#maestroCuentas-form').submit(e => {
    var opcion = 'crearRegistro';
    const postData = {
      metodo: opcion,
      codigo: $('#txt_codigo').val(),
      empresa: $('#txt_idEmpresa').val(),
      tipo: $('#txt_tipo').val(),
      cuenta: $('#txt_nombre').val(),
      costo: $('#txt_centroCosto').val(),
      movimiento: $('#txt_movimiento').val(),
      rubro: $('#txt_rubro').val(),
      cuentaMayor: $('#txt_cuentaMayor').val()
    };

    $.post('maestroCuentas.php', postData, function (response) {

      $('#maestroCuentas-form').trigger('reset');
      listarMaestroCuentas();
    });
    e.preventDefault();

  });



  //llenar empresas.
  function Listarempresas() {
    $.ajax({
      type: "GET",
      url: 'listarEmpresas.php',
      dataType: "json",
      success: function (data) {
        $.each(data, function (key, registro) {
          $("#txt_idEmpresa").append('<option value=' + registro.id + '>' + registro.nombre + '</option>');
        });
      },
      error: function (data) {
       
      }
    });
  }


  //llenar tabla.

  function listarMaestroCuentas() {
    $.ajax({
      url: "maestroCuentas.php",
      method: "GET",
      data: { funcion: "listarCatalogo" },
      success: function (respuesta) {
        const tasks = JSON.parse(respuesta);
        let template = '';
        tasks.forEach(task => {
          template += `
                 <tr taskId="${task.codigo}">
                 <td>${task.codigo}</td>
                 <td>
                 <a href="#" class="task-item">
                   ${task.tipo} 
                 </a>
                 </td>
                 <td>${task.cuenta}</td>
                 <td>${task.rubro}</td>
                 <td>${task.empresa}</td>
                 <td>
                   <button type="button" class="btn btn-outline-danger">
                    Delete 
                   </button>
                 </td>
                 <td>
                   <button type="button" class="btn btn-outline-warning">
                    Editar 
                   </button>
                 </td>
                 </tr>
               `
        });
        $('#catalogo').html(template);
      }
    });
  }

  //buscar por nombre 
  $('#txt_buscarCuenta').keyup(function () {
    if ($('#txt_buscarCuenta').val()) {
      $.ajax({
        url: "maestroCuentas.php",
        method: "GET",
        data: {
          funcion: "listarCatalogoName",
          search: $('#txt_buscarCuenta').val()
        },
        success: function (response) {
          console.log(response);

          if (!response.error) {
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
              template += `
            <tr taskId="${task.codigo}">
            <td>${task.codigo}</td>
            <td>
            <a href="#" class="task-item">
              ${task.tipo} 
            </a>
            </td>
            <td>${task.cuenta}</td>
            <td>${task.rubro}</td>
            <td>${task.empresa}</td>
            <td>
              <button type="button" class="btn btn-danger"">
               Delete 
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-warning">
               Editar 
              </button>
            </td>
            </tr>
                  `
            });

            $('#catalogo').html(template);
          }


        }
      });


    }
  });




});
