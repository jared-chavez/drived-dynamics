<?php
require_once 'db_connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'] ?? '';
    $serial_num = $_POST['serial_num'] ?? '';
    $mark = $_POST['mark'] ?? '';
    $year = $_POST['year'] ?? '';
    $cost = $_POST['cost'] ?? '';
    $category = $_POST['category'] ?? '';
    $mileage = $_POST['mileage'] ?? '';

    if (empty($car_id) || empty($serial_num) || empty($mark) || empty($year) || empty($cost) || empty($category) || empty($mileage)) {
        echo json_encode(["status" => "error", "message" => "Todos los campos son obligatorios."]);
        exit();
    }

    try {
        $stmt = $cnnPDO->prepare("UPDATE cars SET serial_num = :serial_num, mark = :mark, year = :year, cost = :cost, category = :category, mileage = :mileage WHERE id = :id");
        $stmt->bindParam(':id', $car_id);
        $stmt->bindParam(':serial_num', $serial_num);
        $stmt->bindParam(':mark', $mark);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':mileage', $mileage);
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "No se pudo actualizar el auto."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error en la base de datos: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
}