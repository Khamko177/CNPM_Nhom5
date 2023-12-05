<?php
    require 'connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $prescriptiondetail_id = $_GET['id'];
        // Thực hiện truy vấn xóa bệnh nhân có ID là $patient_id từ cơ sở dữ liệu
        $delete_sql = "DELETE FROM prescriptiondetail WHERE id = $prescriptiondetail_id";
        if ($conn->query($delete_sql) === TRUE) {
            mysqli_close($conn);
            header('Location: ' . $_SERVER['HTTP_REFERER']); 
            exit();
        } else {
            echo "Lỗi khi xóa: " . $conn->error;
        }
    } else {
        // Xử lý khi không có thông tin ID hoặc yêu cầu không hợp lệ
    }
?>