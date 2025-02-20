<?php
require_once 'db_connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['id'] ?? '';

    if (empty($car_id)) {
        echo json_encode(["status" => "error", "message" => "ID no recibido."]);
        exit();
    }

    try {
        $stmt = $cnnPDO->prepare("DELETE FROM cars WHERE id = :id");
        $stmt->bindParam(':id', $car_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "No se pudo eliminar el auto."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error en la base de datos: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
}
