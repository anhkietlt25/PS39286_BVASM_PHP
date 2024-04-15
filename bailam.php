<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            background-color: yellow;
            display: inline-block;
        }
        input {
            display: block;
        }
    </style>
</head>
<body>
    <form action="xulyform.php" method="post">
        <input type="text" id="number" name="number">
        <button type="submit">Hiển thị</button>
    </form>

    <?php

        require 'xuly.php';
        $jsonFilePath = 'dulieu.json';
        $products = getDataFromJsonFile($jsonFilePath);
        $tong_diem_cao = 0;
        $sv_diem_cao = null;

        echo '<a href="?action=delete">Xóa danh sách sinh viên</a>';
        if (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $products = []; // Xóa toàn bộ sinh viên
            echo "<p>Danh sách sinh viên đã được xóa.</p>";
        }

        if (count($products) > 0) {

            echo "<table class='table table-hover table-responsive table-bordered' border='1'>
    <tr>
        <th>MSSV</th>
        <th>Ten</th>
        <th>Diem</th>
        <th>Xep Loai</th>
    </tr>";

            foreach ($products as $products) {

                echo "<tr>
            <td>" . $products['mssv'] . "</td>
            <td>" . $products['ten'] . "</td>
            <td>" . $products['diemtb'] . "</td>
            <td>" . xep_loai($products['diemtb']) . "</td>";
                echo "</tr>";
                if($products['diemtb'] > $tong_diem_cao) {
                    $tong_diem_cao = $products['diemtb'];
                    $sv_diem_cao = $products;
                }
            }
            echo "</table>";

    
        }
        else {
            echo "<div class='alert alert-danger'>No products found.</div>";
        }
        
        echo "<h2>Sinh vien ong vang co diem cao nhat</h2>";
        echo "<p> Ten sinh vien:" . $sv_diem_cao['ten'] . "</p>";
        echo "<p> Diem:" . $sv_diem_cao['diemtb'] . "</p>";

        ?>
          <!-- Form thêm sinh viên -->
    <h2>Thêm Sinh viên mới</h2>
    <form action="formsv.php" method="post">
        <label for="mssv">MSSV:</label>
        <input type="text" id="mssv" name="mssv" required><br><br>
        <label for="name">Tên sinh viên:</label>
        <input type="text" id="name" name="ten" required><br><br>
        <label for="grade">Điểm trung bình:</label>
        <input type="number" id="grade" name="diemtb" min="0" max="10" step="0.01" required><br><br>
        <button type="submit">Thêm Sinh viên</button>
    </form>
    <?php 
         
    ?>
</body>

</html>