<?php
require 'connect.php';

function checkDosage($conn, $medicine_id, $dose_only, $dose_day, $day) {
    $sql_medicine = "SELECT * FROM medicine WHERE id = $medicine_id";
    $result = $conn->query($sql_medicine);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $doseMin = $row['doseMin'];
            $doseMax = $row['doseMax'];
            $daydoseMin = $row['daydoseMin'];
            $daydoseMax = $row['daydoseMax'];
            $dose_day_check = $dose_only * $dose_day;
            $dose_all_check = $dose_day_check * $day;

            $dose_1day = ($daydoseMin < $dose_day_check && $dose_day_check < $daydoseMax);
            $dose_all = ($doseMin < $dose_all_check && $dose_all_check < $doseMax);

            if (!$dose_1day) {
                echo '<script>alert("Liều dùng của bạn trong 1 ngày không hợp lý");</script>';
                echo '<script>window.history.back();</script>';
                return false;
            }

            if (!$dose_all) {
                echo '<script>alert("Tổng liều dùng của bạn không hợp lý");</script>';
                echo '<script>window.history.back();</script>';
                return false;
            }

            return true;
        }
    } else {
        echo "Không tìm thấy medicine với ID = $medicine_id";
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prescription_detail'])) {
        $prescription_id = $_POST['id'];
        $medicine = $_POST['medicine'];
        $dose_only = $_POST['dose_only'];
        $dose_day = $_POST['dose_day'];
        $day = $_POST['day'];

        // Kiểm tra liều dùng bằng hàm checkDosage
        $dosageIsValid = checkDosage($conn, $medicine, $dose_only, $dose_day, $day);

        if ($dosageIsValid) {
            $prescriptiondetail_sql = "INSERT INTO prescriptiondetail (prescription_id, medicine_id, frequency) VALUES ('$prescription_id', '$medicine', '$dose_day')";
            $result = mysqli_query($conn, $prescriptiondetail_sql);

            if ($result) {
                mysqli_close($conn);
                echo '<script>alert("Dữ liệu thuốc đã được lưu thành công.");</script>';
                echo '<script>window.history.back();</script>';
                exit();
            } else {
                echo '<script>alert("Có lỗi xảy ra khi lưu dữ liệu thuốc.");</script>';
            }
        }
    }
}
?>