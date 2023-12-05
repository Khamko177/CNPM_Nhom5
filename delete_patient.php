<?php
    require 'connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $patient_id = $_GET['id'];
        
        // Bắt đầu một giao dịch để đảm bảo tính nhất quán của việc xóa dữ liệu
        mysqli_begin_transaction($conn);
        
        // Xóa dữ liệu từ bảng 'prescription' đối với 'patient_id' đã chỉ định
        $delete_prescription_sql = "DELETE FROM prescription WHERE patient_id = $patient_id";
        if ($conn->query($delete_prescription_sql) === TRUE) {
            // Tiếp tục xóa dữ liệu từ bảng 'patient' sau khi xóa prescription thành công
            $delete_patient_sql = "DELETE FROM patient WHERE id = $patient_id";
            if ($conn->query($delete_patient_sql) === TRUE) {
                // Commit giao dịch nếu tất cả các truy vấn thành công
                mysqli_commit($conn);
                mysqli_close($conn);
                header('Location: ' . $_SERVER['HTTP_REFERER']); 
                exit();
            } else {
                // Rollback nếu có lỗi khi xóa bảng 'patient'
                mysqli_rollback($conn);
                echo "Lỗi khi xóa patient: " . $conn->error;
            }
        } else {
            // Rollback nếu có lỗi khi xóa bảng 'prescription'
            mysqli_rollback($conn);
            echo "Lỗi khi xóa prescription: " . $conn->error;
        }
    } else {
        // Xử lý các trường hợp khác nếu cần
    }
?>