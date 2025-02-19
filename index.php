<?php
require_once './api/db_connection.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drived Dynamics.</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/table-styles.css" type="text/css" />
    <link rel="icon" href="./styles/logo.jpg" />
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Gestión de Autos</a>
    </nav>

    <button class="btn btn-success m-3" id="openCreateModal">
        <i class="fas fa-plus"></i> Agregar Auto
    </button>

    <!-- Modal Crear -->
    <div class="modal fade" id="createCarModal" tabindex="-1" aria-labelledby="createModalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="createModalTitle">Agregar Auto</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createCarForm">
                        <div class="form-group">
                            <label for="create_serial_num">Número de Serie:</label>
                            <input type="text" class="form-control" id="create_serial_num" name="serial_num" required>
                        </div>
                        <div class="form-group">
                            <label for="create_mark">Marca:</label>
                            <input type="text" class="form-control" id="create_mark" name="mark" required>
                        </div>
                        <div class="form-group">
                            <label for="create_year">Año:</label>
                            <input type="number" class="form-control" id="create_year" name="year" min="1900" max="2100" required>
                        </div>
                        <div class="form-group">
                            <label for="create_cost">Costo:</label>
                            <input type="number" class="form-control" id="create_cost" name="cost" min="0" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="create_category">Categoría:</label>
                            <select class="form-control" id="create_category" name="category" required>
                                <option value="NUEVO">NUEVO</option>
                                <option value="SEMINUEVO">SEMINUEVO</option>
                                <option value="USADO">USADO</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create_mileage">Kilometraje:</label>
                            <input type="number" class="form-control" id="create_mileage" name="mileage" min="0" required>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="editCarModal" tabindex="-1" aria-labelledby="editModalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="editModalTitle">Editar Auto</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCarForm">
                        <input type="hidden" id="edit_car_id" name="car_id">
                        <div class="form-group">
                            <label for="edit_serial_num">Número de Serie:</label>
                            <input type="text" class="form-control" id="edit_serial_num" name="serial_num" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_mark">Marca:</label>
                            <input type="text" class="form-control" id="edit_mark" name="mark" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_year">Año:</label>
                            <input type="number" class="form-control" id="edit_year" name="year" min="1900" max="2100" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_cost">Costo:</label>
                            <input type="number" class="form-control" id="edit_cost" name="cost" min="0" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_category">Categoría:</label>
                            <select class="form-control" id="edit_category" name="category" required>
                                <option value="NUEVO">NUEVO</option>
                                <option value="SEMINUEVO">SEMINUEVO</option>
                                <option value="USADO">USADO</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_mileage">Kilometraje:</label>
                            <input type="number" class="form-control" id="edit_mileage" name="mileage" min="0" required>
                        </div>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>