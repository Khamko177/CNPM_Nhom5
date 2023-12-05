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
    <link rel="stylesheet" href="addthuoc.css" />
    <style>
    .conten {
        /* overflow: hidden; */
        /* margin-top: -23px; */
    }

    .list {
        overflow: hidden;
        margin-top: 30px
    }

    .vertical-nav {
        overflow: hidden;
        margin-top: 95px;

    }

    .item2 {
        margin-top: -450px;
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

    .list button {
        width: 62px;
        height: 32px;
        margin-left: 250px;
    }
    </style>
</head>

<body>

    <header style="height: 100px; margin-bottom: 10px;">
        <h3>Thêm bệnh nhân</h3>
    </header>
    <div>
        <div class="vertical-nav">
            <nav>
                <ul class="mt-4">
                    <li><a href="index.php">Thêm bệnh nhân</a></li>
                    <li><a href="thongtin.php">Thông tin bệnh nhân</a></li>
                    <li><a href="addthuoc.php">Thêm thuốc mới</a></li>
                    <li><a href="ttthuoc.php">Thông tin thuốc </a></li>
                    <li><a href="ttdonthuoc.php">Thông tin đơn thuốc </a></li>
                    <li><a href="tkthuoc.php">Thông tin kê đơn thuốc </a></li>
                </ul>
            </nav>
        </div>
        <form action="save_data.php" method="post">
            <input type="hidden" name="medicine_form" value="1">
            <div class="conten">
                <div class="list">
                    <div class="item1">
                        <div class="name">Tên thuốc</div>
                        <input type="text" name="names" />
                    </div>
                    <div class="item1">
                        <div class="name">Liều lượng</div>
                        <div class="d-flex gap-3">
                            <input type="text" name="doseMax" placeholder="Max"
                                style="width: 151px; padding-left: 30px" />
                            <input type="text" name="doseMin" placeholder="Min"
                                style="width: 151px; padding-left: 30px" />
                        </div>
                    </div>
                    <div class="item1">
                        <div class="name">Liều lượng trong 1 ngày</div>
                        <div class="d-flex gap-3">
                            <input type="text" name="daydoseMax" placeholder="Max"
                                style="width: 151px; padding-left: 30px" />
                            <input type="text" name="daydoseMin" placeholder="Min"
                                style="width: 151px; padding-left: 30px" />
                        </div>
                    </div>
                    <br />
                    <div class="item1">
                        <div>
                            <button type="submit" name="" id="" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>