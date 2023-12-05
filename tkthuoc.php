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
    <link rel="stylesheet" href="tk.css" />
</head>

<body>
    <style>
    .conten {
        /* overflow: hidden; */
        margin-top: -23px;
        /* overflow: auto; */
    }

    .conten {
        margin-top: 100px;
        margin-left: 280px;
        background-image: url("./image/anh6.jpg");
        background-size: auto;
        color: #fff;
        padding-bottom: 100px
    }

    .list {
        margin-left: -0px;
    }

    .vertical-nav {
        /* position: relative; */
        margin-top: 90px;
    }

    .list1 {
        margin-top: -690px;
        margin-left: 500px;
    }

    input {
        width: 326px;
        height: 33px;

        border-radius: 15px;
    }

    select {
        width: 326px;
        height: 33px;

        border-radius: 15px;
    }

    button {
        width: 100px;
        height: 40px;
        color: white;
        background-color: blue;
        border-radius: 5px;
        position: relative;
        left: 350px;
        bottom: 50px;
    }

    .list1 input {
        padding-left: 40px;
    }

    .conten .search {
        margin-top: 150px;
        margin-left: -10px;
    }

    .conten .search input {
        height: 52px;
        border-radius: 16px;
        border: 1px solid #000;
        background: #a9a6a6;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        color: #fff;
        font-family: Inter;
        font-size: 24px;
        font-weight: 700;
        padding-left: 30px;
        z-index: -1;
    }

    .tk {
        height: 48px;
        background-color: #fff;
        width: 200px;
        gap: 90px;
        color: black;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2px;
        z-index: 99;
        margin-left: 835px;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
        position: absolute;
    }

    table {
        width: 70%;
        border-collapse: collapse;
        color: white;
        margin-left: 150px;
    }

    td {
        border: 1px solid #ccc;
        color: white;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        color: white;
    }
    </style>
    <header style="heiht: 100px;">
        <h3 style="top: 30px">Quản lý đơn thuốc</h3>
    </header>
    <div>
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
        <div class="conten">
            <form action="unitTest.php" method="post" style="padding-left: 20px">
                <input type="hidden" name="prescription_detail" value="1">
                <div class="list">
                    <div class="item1">
                        <div class="name">Chọn đơn thuốc</div>
                        <?php
                    require 'connect.php'; 
                    $sql = "SELECT *  FROM prescription";
                    $result = $conn->query($sql);
                    
                    echo '<select name="id"  style="width: 326px; height: 33px; border-radius: 30px;" >';
                    
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                    }
                    echo '</select>';
                    $conn->close();
                    
                    ?>
                    </div>

                    <div class="item1">
                        <div class="name">Chọn thuốc</div>
                        <?php
                    require 'connect.php'; 
                    $sql = "SELECT id , names FROM medicine";
                    $result = $conn->query($sql);
                    
                    echo '<select name="medicine"  style="width: 326px; height: 33px; border-radius: 30px;" name="doctor">';
                    echo '<option class="doctor" value="0">Chọn thuốc</option>';
                    
                    while ($row = $result->fetch_assoc()) {
                        echo '<option class="doctor" value="' . $row['id'] . '">' . $row['names'] . '</option>';
                    }
                    
                    echo '</select>';
                    $conn->close();
                    
                    ?>
                    </div>
                </div>
                <div class="list1">
                    <div class="item2">
                        <div class="name" style="color: #fff">liều dùng 1 lần dùng</div>
                        <input type="text" name="dose_only" placeholder="ví dụ:60mg  " />
                    </div>
                    <div class="item2">
                        <div class="name" style="color: #fff">Số lần dùng trong ngày</div>
                        <select name="dose_day">
                            <option value="2">2 buổi (sáng / tối)</option>
                            <option value="3">3 buổi (sáng / trưa / tối)</option>
                        </select>
                    </div>
                    <div class="item2">
                        <div class="name" style="color: #fff">Số ngày</div>
                        <input type="text" name="day" placeholder="ví dụ: 3 ngày  " />
                    </div>
                </div>
                <div class="search">
                    <div class="search-field">
                    </div>
                </div>
                <button type="submit">
                    Lưu
                </button>
            </form>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Prescription_ID</th>
                    <th>Medicine_Name</th>
                    <th>Frequency</th>
                    <th>Action</th>
                </tr>
                <?php
            require 'connect.php'; 
            $sql = "SELECT pd.id, pd.prescription_id, pd.medicine_id, pd.frequency, m.names AS medicine_names 
        FROM prescriptiondetail pd
        INNER JOIN medicine m ON pd.medicine_id = m.id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['prescription_id'] . "</td>";
                    echo "<td>" . $row['medicine_names'] . "</td>";
                    echo "<td>" . $row['frequency'] . " buổi</td>";
                    echo "<td></a>   <a style='background-color: red; color: black; padding: 5px;' href='delete_prescriptiondetail.php?id=" . $row['id'] . "' >Xóa</a></td>";
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