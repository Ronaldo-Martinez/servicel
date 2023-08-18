

$(document).ready(function() {

    $(document).on('click', '.btn-eliminar', function() {
        var caracteristicaId = $(this).data('caracteristicaid');
        eliminarCaracteristica(caracteristicaId);
    });

    $('#caracteristicaForm').submit(function(e) {
        e.preventDefault();
        $("#maquina_id").removeAttr("disabled");
        var formData = $(this).serialize();
        $("#maquina_id").attr("disabled", "disabled");
        console.log(formData);
        $.ajax({
            url: "/caracteristicas", // Asegúrate de tener una ruta definida en tu archivo de rutas
            method: 'POST',
            data: formData,
            success: function(response) {
                // Limpiar el formulario después de la creación exitosa
                let maquina=$("#maquina_id").val();
                $('#caracteristicaForm')[0].reset();
                $("#maquina_id").val(maquina);
                // Actualizar la tabla de características
                updateCaracteristicasTable();
            },
            error: function(error) {
                // Aquí puedes manejar los errores en caso de que ocurran
                console.error(error);
            }
        });
    });

    
    // Función para actualizar la tabla de características
    function updateCaracteristicasTable() {
        let id_maquina=$('#maquina_id').val();
        $.ajax({
            url: `/maquinas/${id_maquina}/caracteristicas`, // Definir una nueva ruta en las rutas de Laravel
            method: 'GET',
            success: function(response) {
                // Actualizar los datos en la tabla
                var tbody = $('#caracteristicasTable tbody');
                tbody.empty();

                response.forEach(function(caracteristica) {
                    var row = $('<tr>');
                    row.append($('<td>').text(caracteristica.caracteristica));
                    row.append($('<td>').text(caracteristica.valor));
                    row.append($('<td>').text(caracteristica.maquina_id));
                    row.append($('<td>').html(
                        `
                        <button type="submit" class="btn btn-secondary">Editar</button>
                        <button type="submit" class="btn btn-danger btn-eliminar" data-caracteristicaid="${caracteristica.id}">Eliminar</button>
                        `
                    ));
                    tbody.append(row);
                });
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    function eliminarCaracteristica(id){
        console.log(id)
        $.ajax({
            url: `/caracteristicas/${id}`, // Asegúrate de tener una ruta definida en tu archivo de rutas
            method: 'DELETE',
            headers:{
                'X-CSRF-TOKEN': window.csrfToken
            },
            success: function(response) {
                updateCaracteristicasTable();
            },
            error: function(error) {
                // Aquí puedes manejar los errores en caso de que ocurran
                console.error(error);
            }
        });
    }

    //Subir imágenes
    $('#imagenForm').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: "/imagenes", // Asegúrate de tener una ruta definida en tu archivo de rutas
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': window.csrfToken
            },
            success: function(response) {
                // Hacer algo después de subir la imagen exitosamente
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

    // Llamar a updateCaracteristicasTable al cargar la página
    updateCaracteristicasTable();
});