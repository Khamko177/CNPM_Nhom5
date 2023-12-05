<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <header style="heiht: 100px;">
        <h3>Quản lý đơn thuốc</h3>
    </header>
    <main>
        <nav class="vertical-nav">
            <ul class="mt-4">

                <li><a href="index.php">Thêm bệnh nhân</a></li>
                <li><a href="thongtin.php">Thông tin bệnh nhân</a></li>
                <li><a href="addthuoc.php">Thêm thuốc mới</a></li>
                <li><a href="ttthuoc.php">Thông tin thuốc </a></li>
                <li><a href="ttdonthuoc.php">Thông tin đơn thuốc </a></li>
                <li><a href="tkthuoc.php">Thông tin kê đơn thuốc </a></li>
            </ul>
        </nav>
        <div class="tt"></div>
        <form action="save_data.php" class="full-screen-form" method="post">
            <input type="hidden" name="patient_form" value="1">
            <div class="name">
                <h4>Họ và tên</h4>
                <input type="text" name="names" />
            </div>
            <div class="ngaysinh">
                <h4>Giới tính</h4>
                <input type="text" name="gender" />
            </div>
            <div class="dc">
                <h4>Số điện thoại</h4>
                <input type="text" name="phone" />
            </div>
            <div class="dc">
                <h4>Bác sĩ phụ trách</h4>
                <?php
              require 'connect.php'; 
              $sql = "SELECT id , names FROM doctor";
              $result = $conn->query($sql);
              
              echo '<select name="doctor"  style="width: 326px; height: 33px; border-radius: 30px;" name="doctor">';
              echo '<option class="doctor" value="0">Chọn bác sĩ</option>';
              
              while ($row = $result->fetch_assoc()) {
                  echo '<option class="doctor" value="' . $row['id'] . '">' . $row['names'] . '</option>';
              }
              
              echo '</select>';
              $conn->close();
            
            ?>
            </div>
            <button type="submit">
                Lưu bệnh nhân
            </button>
        </form>
        <div id="result"></div>
    </main>
</body>

</html>