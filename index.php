<?php
    include "db/connection.php";
    require "tasks/show.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-6 col-lg-4 ps-4 pe-4 pt-3 pb-2 border rounded shadow">
                <form action="tasks/add.php" method="post" class="mb-4">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- 📋 Contenedor de la tabla -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 border rounded shadow p-4 bg-light">
                <h4 class="mb-4 text-center">📋 Lista de tareas</h4>
                <div class="table-responsive">
                    <?php
                    // 👀 Mostrar tareas en tabla
                    showTasks($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-fullscreen-sm-down fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">✏️ Editar tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form action="tasks/update.php" method="post">
                <input type="hidden" name="id" id="modal-id">

                <div class="mb-3">
                    <label for="modal-title" class="form-label">Título</label>
                    <input type="text" name="title" id="modal-title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="modal-description" class="form-label">Descripción</label>
                    <input type="text" name="description" id="modal-description" class="form-control">
                </div>

                <button type="submit" class="btn btn-success w-100">Guardar cambios</button>
                </form>
            </div>

            </div>
        </div>
    </div>

    <script>
        function cargarDatosModal(id, title, description) {
            document.getElementById('modal-id').value = id;
            document.getElementById('modal-title').value = title;
            document.getElementById('modal-description').value = description;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>