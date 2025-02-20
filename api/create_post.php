<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serial_num = $_POST['serial_num'] ?? '';
    $mark = $_POST['mark'] ?? '';
    $year = $_POST['year'] ?? '';
    $cost = $_POST['cost'] ?? '';
    $category = $_POST['category'] ?? '';
    $mileage = $_POST['mileage'] ?? '';

    if (empty($serial_num) || empty($mark) || empty($year) || empty($cost) || empty($category) || empty($mileage)) {
        die("Error: Todos los campos son obligatorios.");
    }

    try {
        $stmt = $cnnPDO->prepare("INSERT INTO cars (serial_num, mark, year, cost, category, mileage) VALUES (:serial_num, :mark, :year, :cost, :category, :mileage)");
        $stmt->bindParam(':serial_num', $serial_num);
        $stmt->bindParam(':mark', $mark);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':mileage', $mileage);
        
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error al insertar los datos.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no válido.";
}
?>