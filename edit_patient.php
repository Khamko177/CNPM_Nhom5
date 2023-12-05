<?php
  require 'connect.php';

  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
      $patient_id = $_GET['id'];
      $sql = "SELECT id ,names, gender,phone  FROM patient WHERE id = $patient_id";
      $result = mysqli_query($conn, $sql);
  
      if ($result && mysqli_num_rows($result) > 0) {
          $patient_data = mysqli_fetch_assoc($result);
      } else {
          echo "Không tìm thấy thông tin bệnh nhân.";
          exit();
      }
  }else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_GET['id'];
      $updated_names = $_POST['names'];
      $updated_gender = $_POST['gender'];
      $updated_phone = $_POST['phone'];
     
  
      $update_sql = "UPDATE patient SET names = '$updated_names', gender = '$updated_gender', phone = '$updated_phone' WHERE id = $patient_id";
      if ($conn->query($update_sql) === TRUE) {
        echo '<script>alert("Thông tin bệnh nhân đã được cập nhật thành công.");';
        echo 'setTimeout(function() { window.location.href = "thongtin.php"; }, 500);</script>';
        mysqli_close($conn);
          exit();
      } else {
          echo "Lỗi khi cập nhật: " . $conn->error;
      }
  }
  
  // Đóng kết nối
  mysqli_close($conn);
  
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chỉnh sửa thông tin bệnh nhân</title>
    <style>
    body {
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #3c561c;
        /* Màu nền của trang */
    }

    .container {
        width: 300px;
        padding: 20px;
        background-color: #fff;
        /* Màu nền của form */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng bóng đổ */
    }

    .patient-form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input[type="text"],
    button {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #007bff;
        /* Màu nền của nút */
        color: #fff;
        /* Màu chữ trên nút */
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 103%;
    }

    button:hover {
        background-color: #0056b3;
        /* Màu nền khi di chuột vào nút */
    }
    </style>
</head>

<body>
    <!-- Form chỉnh sửa thông tin bệnh nhân -->
    <form method="post">
        <input type="text" name="names" value="<?php echo $patient_data['names']; ?>" placeholder="Tên">
        <input type="text" name="gender" value="<?php echo $patient_data['gender']; ?>" placeholder="Giới tính">
        <input type="text" name="phone" value="<?php echo $patient_data['phone']; ?>" placeholder="Số điện thoại">

        <button type="submit">Cập nhật thông tin</button>
    </form>
</body>

</html>