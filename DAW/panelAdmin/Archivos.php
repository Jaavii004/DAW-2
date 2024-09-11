<?php
include 'config/config.php';
require_once 'login/validar_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Archivos</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="shortcut icon" href="<?php echo LOGO; ?>" type="image/x-icon">
    <style>
        .file-list {
            max-height: 600px;
            overflow-y: auto;
        }
        .file-content {
            max-height: 800px;
            overflow-y: auto;
            white-space: pre-wrap;
            word-wrap: break-word;
            background-color: #f8f9fa;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }
        table.file-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.file-table th, table.file-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        table.file-table th {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Sidebar and Navbar here (same as before) -->
        <div id="main">
            <!-- Main content -->
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Editor de Archivos</h3>
                    <p class="text-subtitle text-muted">Selecciona un archivo para visualizar y editar su contenido.</p>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Archivos Disponibles
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="list-group file-list" id="fileList">
                                        <!-- File list will be populated here by JavaScript -->
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h4 id="fileName">Selecciona un archivo</h4>
                                    <textarea class="file-content" id="fileContent" readonly></textarea>
                                    <button id="saveChanges" class="btn btn-primary mt-2" disabled>Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Footer here (same as before) -->
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function loadFileList() {
                $.ajax({
                    url: 'load_files.php',
                    method: 'GET',
                    success: function (response) {
                        $('#fileList').html(response);
                    },
                    error: function () {
                        alert('Error al cargar la lista de archivos.');
                    }
                });
            }

            loadFileList();

            $(document).on('click', '.file-item', function (e) {
                e.preventDefault();
                var fileName = $(this).data('file');
                $.ajax({
                    url: 'read_file.php',
                    method: 'GET',
                    data: { file: fileName },
                    success: function (response) {
                        $('#fileName').text('Editando: ' + fileName);
                        $('#fileContent').val(response);
                        $('#fileContent').prop('readonly', false);
                        $('#saveChanges').prop('disabled', false).data('file', fileName);
                    },
                    error: function () {
                        alert('Error al cargar el contenido del archivo.');
                    }
                });
            });

            $('#saveChanges').click(function () {
                var fileName = $(this).data('file');
                var fileContent = $('#fileContent').val();
                $.ajax({
                    url: 'save_file.php',
                    method: 'POST',
                    data: { file: fileName, content: fileContent },
                    success: function () {
                        alert('Cambios guardados exitosamente.');
                        $('#fileContent').prop('readonly', true);
                        $('#saveChanges').prop('disabled', true);
                    },
                    error: function () {
                        alert('Error al guardar los cambios.');
                    }
                });
            });
        });
    </script>
</body>
</html>
