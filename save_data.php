<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['patient_form'])){
        $names = $_POST['names'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $doctor_id = $_POST['doctor'];

        // Thêm dữ liệu vào bảng patient
        $patient_sql = "INSERT INTO patient (names, gender, phone, doctor_id) 
                        VALUES ('$names', '$gender', '$phone', '$doctor_id')";

        // Thực hiện truy vấn INSERT vào bảng patient
        if ($conn->query($patient_sql) === TRUE) {
            // Lấy ID của bản ghi vừa thêm vào bảng patient
            $patient_id = $conn->insert_id;

            // Sử dụng ID của patient để thêm vào bảng prescription
            $prescription = "INSERT INTO prescription (doctor_id, patient_id, date_time) 
                             VALUES ('$doctor_id', '$patient_id', NOW())";

            // Thực hiện truy vấn INSERT vào bảng prescription
            if ($conn->query($prescription) === TRUE) {
                mysqli_close($conn);
                echo '<script>alert("Dữ liệu bệnh nhân đã được lưu thành công.");</script>';
                echo '<script>window.history.back();</script>'; // Quay lại trang trước đó
                exit();
            } else {
                echo "Lỗi khi thêm dữ liệu vào bảng prescription: " . $conn->error;
            }
        } else {
            echo "Lỗi khi thêm dữ liệu vào bảng patient: " . $conn->error;
        }
    }
    else if(isset($_POST['medicine_form'])){
        // Nhận dữ liệu từ biểu mẫu medicine
        $names = $_POST['names'];
        $doseMin = $_POST['doseMin'];
        $doseMax = $_POST['doseMax'];
        $daydoseMin = $_POST['daydoseMin'];
        $daydoseMax = $_POST['daydoseMax'];

        // Thêm dữ liệu vào bảng medicine
        $medicine_sql = "INSERT INTO medicine (names, doseMin, doseMax, daydoseMin, daydoseMax) VALUES ('$names', '$doseMin', '$doseMax', '$daydoseMin', '$daydoseMax')";

        if ($conn->query($medicine_sql) === TRUE) {
         
            mysqli_close($conn);
            echo '<script>alert("Dữ liệu thuốc đã được lưu thành công.");</script>';
            echo '<script>window.history.back();</script>'; // Quay lại trang trước đó
            exit();
        } else {
            echo "Lỗi: " . $medicine_sql . "<br>" . $conn->error;
        }
    }
    else if(isset($_POST['_form'])){
        // Nhận dữ liệu từ biểu mẫu medicine
        $names = $_POST['names'];
        $doseMin = $_POST['doseMin'];
        $doseMax = $_POST['doseMax'];
        $daydoseMin = $_POST['daydoseMin'];
        $daydoseMax = $_POST['daydoseMax'];

        // Thêm dữ liệu vào bảng medicine
        $medicine_sql = "INSERT INTO medicine (names, doseMin, doseMax, daydoseMin, daydoseMax) VALUES ('$names', '$doseMin', '$doseMax', '$daydoseMin', '$daydoseMax')";

        if ($conn->query($medicine_sql) === TRUE) {
            echo "Dữ liệu thuốc đã được lưu thành công.";
            mysqli_close($conn);
            echo '<script>alert("Dữ liệu thuốc đã được lưu thành công.");</script>';
            echo '<script>window.history.back();</script>'; // Quay lại trang trước đó
            exit();
        } else {
            echo "Lỗi: " . $medicine_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>