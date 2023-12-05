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
        <h3>Quản lý đơn thuốc</h3>
    </header>
    <div class="d-flex">
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
        <div class="list">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Action</th>
                </tr>
                <?php
            require 'connect.php'; 
            $sql = "SELECT pa.id as id, pa.names as patientName, pa.gender as gender, pa.phone as phone,doc.names as doctorName FROM patient as pa join doctor as doc on pa.doctor_id = doc.id";
           
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['patientName'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['doctorName'] . "</td>";
                    echo "<td><a style='background-color: yellow; color: black; padding: 5px;' href='edit_patient.php?id=" . $row['id'] . "'>Sửa</a>   <a style='background-color: red; color: black; padding: 5px;' href='delete_patient.php?id=" . $row['id'] . "' >Xóa</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
            }
            mysqli_close($conn);
        ?>
            </table>
        </div>
    </div>
</body>

</html>