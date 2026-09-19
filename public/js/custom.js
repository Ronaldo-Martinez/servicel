$(document).ready(function() {
    // Obtener ID de la máquina actual
    function getMaquinaId() {
        if (window.maquinaId) return window.maquinaId;
        var appId = $('#maquinaEditApp').data('maquina-id');
        if (appId) return appId;
        return $('input[name="maquina_id"]').val() || $('#maquina_id').val();
    }

    // Token CSRF
    function getCsrfToken() {
        return window.csrfToken || $('meta[name="csrf-token"]').attr('content');
    }

    // Almacenamiento local de imágenes para reordenamiento
    var currentImagenes = [];

    // Iconos vectoriales SVG limpios
    var SVG_ICONS = {
        delete: '<svg class="svg-icon" viewBox="0 -960 960 960" fill="currentColor" width="1.1em" height="1.1em" aria-hidden="true"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/></svg>',
        star: '<svg class="svg-icon" viewBox="0 -960 960 960" fill="currentColor" width="1em" height="1em" aria-hidden="true"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>',
        check_circle: '<svg class="svg-icon" viewBox="0 -960 960 960" fill="currentColor" width="1em" height="1em" aria-hidden="true"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/></svg>'
    };

    // =========================================================================
    // GESTIÓN DE GALERÍA DE FOTOS (MODERNA)
    // =========================================================================

    // Clic en dropzone para abrir selector de archivos
    $('#dropzoneTrigger').on('click', function(e) {
        if (e.target.id !== 'fileInputModern') {
            $('#fileInputModern').trigger('click');
        }
    });

    // Drag & Drop visual feedback
    $('#dropzoneTrigger')
        .on('dragover dragenter', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dropzone-active');
        })
        .on('dragleave dragend drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dropzone-active');
        });

    $('#dropzoneTrigger').on('drop', function(e) {
        var files = e.originalEvent.dataTransfer.files;
        if (files && files.length > 0) {
            document.getElementById('fileInputModern').files = files;
            $('#fileInputModern').trigger('change');
        }
    });

    // Vista previa de archivos seleccionados
    $('#fileInputModern').on('change', function() {
        var files = this.files;
        var previewContainer = $('#selectedFilesList');
        previewContainer.empty();

        if (files.length > 0) {
            $('#selectedFilesPreview').removeClass('d-none');
            Array.from(files).forEach(function(file) {
                var isImg = file.type.startsWith('image/');
                var pill = $('<span class="badge bg-white text-secondary border p-2 d-inline-flex align-items-center gap-1 shadow-xs">')
                    .html('📷 <span>' + file.name + '</span> <small class="text-muted">(' + (file.size / 1024).toFixed(0) + ' KB)</small>');
                previewContainer.append(pill);
            });
        } else {
            $('#selectedFilesPreview').addClass('d-none');
        }
    });

    // Limpiar selección
    $('#btnClearSelection').on('click', function() {
        $('#fileInputModern').val('');
        $('#selectedFilesList').empty();
        $('#selectedFilesPreview').addClass('d-none');
    });

    // Subida ágil de fotos
    $('#imagenFormModern').on('submit', function(e) {
        e.preventDefault();
        var id_maquina = getMaquinaId();
        if (!id_maquina) return;

        var fileInput = document.getElementById('fileInputModern');
        if (!fileInput.files || fileInput.files.length === 0) {
            alert('Por favor selecciona al menos una imagen para subir.');
            return;
        }

        var formData = new FormData(this);
        formData.set('maquina_id', id_maquina);

        var btnSubmit = $('#btnUploadImages');
        var originalBtnHtml = btnSubmit.html();
        btnSubmit.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span> Subiendo...');

        $.ajax({
            url: '/imagenes',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            },
            success: function(response) {
                $('#imagenFormModern')[0].reset();
                $('#selectedFilesList').empty();
                $('#selectedFilesPreview').addClass('d-none');
                showGalleryFeedback(response.message || 'Imágenes subidas con éxito.');
                updateImagenesGrid();
            },
            error: function(xhr) {
                var msg = 'Ocurrió un error al subir las imágenes.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.error) {
                    msg = xhr.responseJSON.error;
                }
                alert(msg);
            },
            complete: function() {
                btnSubmit.prop('disabled', false).html(originalBtnHtml);
            }
        });
    });

    // Función para renderizar la galería moderna en tarjetas
    function updateImagenesGrid() {
        var id_maquina = getMaquinaId();
        if (!id_maquina) return;

        $.ajax({
            url: '/maquinas/' + id_maquina + '/imagenes',
            method: 'GET',
            success: function(response) {
                currentImagenes = response || [];
                $('#fotosBadgeCount').text(currentImagenes.length);

                var grid = $('#imagenesGrid');
                grid.empty();

                if (currentImagenes.length === 0) {
                    $('#galleryEmptyState').removeClass('d-none');
                    return;
                }

                $('#galleryEmptyState').addClass('d-none');

                currentImagenes.forEach(function(imagen, index) {
                    var isPrimary = (index === 0);
                    var col = $('<div class="col-12 col-sm-6 col-md-4">');

                    var card = $(`
                        <div class="card photo-manager-card h-100 border rounded-4 overflow-hidden shadow-xs ${isPrimary ? 'is-primary-card' : ''}" data-id="${imagen.id}">
                            <div class="photo-preview-wrapper position-relative">
                                <img src="/storage/${imagen.url}" class="card-img-top photo-manager-img" alt="${imagen.nombre || 'Foto'}" loading="lazy">
                                
                                <div class="photo-badge-container position-absolute top-0 start-0 p-2 d-flex gap-1">
                                    ${isPrimary 
                                        ? '<span class="badge bg-warning text-dark fw-bold shadow-sm d-inline-flex align-items-center gap-1">' + SVG_ICONS.star + ' Portada (#1)</span>' 
                                        : `<span class="badge bg-dark bg-opacity-75 text-white fw-bold shadow-sm">#${index + 1}</span>`
                                    }
                                </div>

                                <div class="photo-delete-container position-absolute top-0 end-0 p-2">
                                    <button type="button" class="btn btn-sm btn-light bg-white text-danger rounded-circle shadow-sm btn-delete-photo" data-id="${imagen.id}" title="Eliminar foto">
                                        ${SVG_ICONS.delete}
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-2 d-flex flex-column justify-content-between">
                                <div class="mb-2">
                                    <span class="d-block fw-bold text-truncate text-secondary small">${imagen.nombre || 'Sin título'}</span>
                                    ${imagen.descripcion ? `<small class="text-muted d-block text-truncate" style="font-size: 0.75rem;">${imagen.descripcion}</small>` : ''}
                                </div>

                                <div class="photo-actions-toolbar d-flex align-items-center justify-content-between gap-1 pt-2 border-top">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-outline-secondary btn-order-move btn-sm py-1 px-2" data-index="${index}" data-dir="-1" ${index === 0 ? 'disabled' : ''} title="Mover hacia la izquierda">
                                            ◀
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary btn-order-move btn-sm py-1 px-2" data-index="${index}" data-dir="1" ${index === currentImagenes.length - 1 ? 'disabled' : ''} title="Mover hacia la derecha">
                                            ▶
                                        </button>
                                    </div>

                                    ${!isPrimary ? `
                                        <button type="button" class="btn btn-sm btn-outline-warning text-dark fw-bold btn-make-primary py-1 px-2 d-inline-flex align-items-center gap-1" data-id="${imagen.id}">
                                            ${SVG_ICONS.star} Hacer Portada
                                        </button>
                                    ` : `
                                        <span class="small fw-bold text-success d-inline-flex align-items-center gap-1">
                                            ${SVG_ICONS.check_circle} Principal
                                        </span>
                                    `}
                                </div>
                            </div>
                        </div>
                    `);

                    col.append(card);
                    grid.append(col);
                });
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    // Acción: Establecer como foto principal (Portada)
    $(document).on('click', '.btn-make-primary', function() {
        var imagenId = $(this).data('id');
        var btn = $(this);
        btn.prop('disabled', true);

        $.ajax({
            url: '/imagenes/' + imagenId + '/make-primary',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            },
            success: function(response) {
                showGalleryFeedback(response.message || 'Foto establecida como principal.');
                updateImagenesGrid();
            },
            error: function(err) {
                alert('No se pudo establecer como principal.');
                btn.prop('disabled', false);
            }
        });
    });

    // Acción: Mover orden hacia izquierda o derecha
    $(document).on('click', '.btn-order-move', function() {
        var index = parseInt($(this).data('index'));
        var dir = parseInt($(this).data('dir'));
        var targetIndex = index + dir;

        if (targetIndex < 0 || targetIndex >= currentImagenes.length) return;

        // Clonar IDs y reordenar
        var ids = currentImagenes.map(function(img) { return img.id; });
        var temp = ids[index];
        ids[index] = ids[targetIndex];
        ids[targetIndex] = temp;

        $.ajax({
            url: '/imagenes/reorder',
            method: 'POST',
            data: { ids: ids },
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            },
            success: function(response) {
                showGalleryFeedback('Orden actualizado.');
                updateImagenesGrid();
            },
            error: function() {
                alert('Error al actualizar el orden.');
            }
        });
    });

    // Acción: Eliminar foto
    $(document).on('click', '.btn-delete-photo, .btn-eliminar-imagen', function() {
        var imagenId = $(this).data('id') || $(this).data('imagenid');
        if (!confirm('¿Estás seguro de que deseas eliminar esta fotografía de la maquinaria?')) return;

        $.ajax({
            url: '/imagenes/' + imagenId,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            },
            success: function(response) {
                showGalleryFeedback('Fotografía eliminada.');
                updateImagenesGrid();
                if ($('#imagenesTable').length) updateImagenesTable();
            },
            error: function(error) {
                alert('Error al eliminar la fotografía.');
            }
        });
    });

    $('#btnRefreshGallery').on('click', function() {
        updateImagenesGrid();
    });

    function showGalleryFeedback(msg) {
        var el = $('#galleryFeedback');
        if (el.length) {
            el.text(msg).removeClass('d-none');
            setTimeout(function() {
                el.addClass('d-none');
            }, 3500);
        }
    }


    // =========================================================================
    // GESTIÓN DE CARACTERÍSTICAS TÉCNICAS (MODERNA)
    // =========================================================================

    // Chips de sugerencia rápida
    $('.chip-spec').on('click', function() {
        var key = $(this).data('key');
        $('#inputCaracNombre').val(key);
        $('#inputCaracValor').focus();
    });

    // Formulario moderno de características
    $('#caracteristicaFormModern').on('submit', function(e) {
        e.preventDefault();
        var id_maquina = getMaquinaId();
        if (!id_maquina) return;

        var caracNombre = $('#inputCaracNombre').val().trim();
        var caracValor = $('#inputCaracValor').val().trim();

        if (!caracNombre || !caracValor) {
            alert('Por favor indica la característica y su valor.');
            return;
        }

        var btnSubmit = $('#btnAddSpec');
        btnSubmit.prop('disabled', true);

        $.ajax({
            url: '/caracteristicas',
            method: 'POST',
            data: {
                caracteristica: caracNombre,
                valor: caracValor,
                maquina_id: id_maquina
            },
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            },
            success: function(response) {
                $('#inputCaracNombre').val('');
                $('#inputCaracValor').val('');
                showSpecsFeedback('Característica agregada exitosamente.');
                updateCaracteristicasModern();
            },
            error: function(error) {
                alert('Error al agregar la característica.');
            },
            complete: function() {
                btnSubmit.prop('disabled', false);
            }
        });
    });

    // Actualizar tabla moderna de características
    function updateCaracteristicasModern() {
        var id_maquina = getMaquinaId();
        if (!id_maquina) return;

        $.ajax({
            url: '/maquinas/' + id_maquina + '/caracteristicas',
            method: 'GET',
            success: function(response) {
                var specs = response || [];
                $('#specsBadgeCount').text(specs.length);

                var tbody = $('#caracteristicasTbody');
                tbody.empty();

                if (specs.length === 0) {
                    $('#specsEmptyState').removeClass('d-none');
                    $('#caracteristicasTableModern').addClass('d-none');
                    return;
                }

                $('#specsEmptyState').addClass('d-none');
                $('#caracteristicasTableModern').removeClass('d-none');

                specs.forEach(function(item) {
                    var tr = $('<tr>');
                    tr.append($('<td class="fw-bold text-secondary">').html('<span class="spec-dot me-2"></span>' + item.caracteristica));
                    tr.append($('<td class="text-dark">').text(item.valor));
                    tr.append($('<td class="text-end">').html(`
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete-spec rounded-pill px-2 py-1" data-id="${item.id}" title="Eliminar">
                            ${SVG_ICONS.delete}
                        </button>
                    `));
                    tbody.append(tr);
                });
            },
            error: function(err) {
                console.error(err);
            }
        });
    }

    // Acción: Eliminar característica
    $(document).on('click', '.btn-delete-spec, .btn-eliminar', function() {
        var id = $(this).data('id') || $(this).data('caracteristicaid');
        if (!confirm('¿Deseas eliminar esta característica de la ficha técnica?')) return;

        $.ajax({
            url: '/caracteristicas/' + id,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            },
            success: function(response) {
                showSpecsFeedback('Característica eliminada.');
                updateCaracteristicasModern();
                if ($('#caracteristicasTable').length) updateCaracteristicasTable();
            },
            error: function(err) {
                alert('Error al eliminar la característica.');
            }
        });
    });

    $('#btnRefreshSpecs').on('click', function() {
        updateCaracteristicasModern();
    });

    function showSpecsFeedback(msg) {
        var el = $('#specsFeedback');
        if (el.length) {
            el.text(msg).removeClass('d-none');
            setTimeout(function() {
                el.addClass('d-none');
            }, 3500);
        }
    }


    // =========================================================================
    // COMPATIBILIDAD LEGACY (Si existieran vistas antiguas)
    // =========================================================================
    if ($('#caracteristicaForm').length) {
        $('#caracteristicaForm').submit(function(e) {
            e.preventDefault();
            $("#maquina_id").removeAttr("disabled");
            var formData = $(this).serialize();
            $("#maquina_id").attr("disabled", "disabled");
            $.ajax({
                url: "/caracteristicas",
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': getCsrfToken() },
                success: function(response) {
                    let maquina = $("#maquina_id").val();
                    $('#caracteristicaForm')[0].reset();
                    $("#maquina_id").val(maquina);
                    updateCaracteristicasTable();
                }
            });
        });
    }

    function updateCaracteristicasTable() {
        let id_maquina = getMaquinaId();
        if (!id_maquina || !$('#caracteristicasTable').length) return;

        $.ajax({
            url: `/maquinas/${id_maquina}/caracteristicas`,
            method: 'GET',
            success: function(response) {
                var tbody = $('#caracteristicasTable tbody');
                tbody.empty();
                response.forEach(function(caracteristica) {
                    var row = $('<tr>');
                    row.append($('<td>').text(caracteristica.caracteristica));
                    row.append($('<td>').text(caracteristica.valor));
                    row.append($('<td>').text(caracteristica.maquina_id));
                    row.append($('<td>').html(
                        `<button type="button" class="btn btn-danger btn-eliminar" data-caracteristicaid="${caracteristica.id}">Eliminar</button>`
                    ));
                    tbody.append(row);
                });
            }
        });
    }

    if ($('#imagenForm').length) {
        $('#imagenForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('maquina_id', getMaquinaId());
            $.ajax({
                url: "/imagenes",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: { 'X-CSRF-TOKEN': getCsrfToken() },
                success: function() {
                    $('#imagenForm')[0].reset();
                    updateImagenesTable();
                }
            });
        });
    }

    function updateImagenesTable() {
        let id_maquina = getMaquinaId();
        if (!id_maquina || !$('#imagenesTable').length) return;

        $.ajax({
            url: `/maquinas/${id_maquina}/imagenes`,
            method: 'GET',
            success: function(response) {
                var tbody = $('#imagenesTable tbody');
                tbody.empty();
                response.forEach(function(imagen) {
                    var row = $('<tr>');
                    row.append($('<td>').html(`<img src="/storage/${imagen.url}" class="img-fluid img-list" alt="${imagen.descripcion}" loading="lazy">`));
                    row.append($('<td>').text(imagen.nombre));
                    row.append($('<td>').text(imagen.descripcion));
                    row.append($('<td>').html(
                        `<button type="button" class="btn btn-danger btn-eliminar-imagen" data-imagenid="${imagen.id}">Eliminar</button>`
                    ));
                    tbody.append(row);
                });
            }
        });
    }

    // Inicializar cargas iniciales según lo que esté en pantalla
    if ($('#maquinaEditApp').length) {
        updateImagenesGrid();
        updateCaracteristicasModern();
    } else {
        if ($('#caracteristicasTable').length) updateCaracteristicasTable();
        if ($('#imagenesTable').length) updateImagenesTable();
    }
});
