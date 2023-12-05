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
    <link rel="stylesheet" href="tt.css" />
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }
    </style>
</head>


<body>
    <header style="heiht: 100px;">
        <h3 style="top: 30px">Quản lý đơn thuốc</h3>
    </header>
    <div class="d-flex">
        <nav class="vertical-nav">
            <ul style="margin-top: 52px">
                <li><a href="index.php">Thêm bệnh nhân</a></li>
                <li><a href="thongtin.php">Thông tin bệnh nhân</a></li>
                <li><a href="addthuoc.php">Thêm thuốc mới</a></li>
                <li><a href="ttthuoc.php">Thông tin thuốc </a></li>
                <li><a href="ttdonthuoc.php">Thông tin đơn thuốc </a></li>
                <li><a href="tkthuoc.php">Thông tin kê đơn thuốc </a></li>
            </ul>
        </nav>
        <div class="list">
            <div class="listi d-flex justify-content-between p-3">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Names</th>
                        <th>Dose Min</th>
                        <th>Dose Max</th>
                        <th>Day Dose Min</th>
                        <th>Day Dose Max</th>
                    </tr>
                    <?php
             require 'connect.php'; 

            // Truy vấn dữ liệu
            $sql = "SELECT id, names, doseMin, doseMax, daydoseMin, daydoseMax FROM medicine";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Hiển thị dữ liệu trong bảng
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['names'] . "</td>";
                    echo "<td>" . $row['doseMin'] . "mg</td>";
                    echo "<td>" . $row['doseMax'] . "mg</td>";
                    echo "<td>" . $row['daydoseMin'] . "mg</td>";
                    echo "<td>" . $row['daydoseMax'] . "mg</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
            }

            // Đóng kết nối
            mysqli_close($conn);
        ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>