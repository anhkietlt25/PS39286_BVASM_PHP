<?php
$number = $_POST["number"];
if($number >= 1 && $number <= 9) {
    echo "<h2>Bảng cửu chương đã nhập" . $number . "</h2>";
    for($i = 1; $i <= 10; $i++) {
       $kq = $number * $i;
       echo "$number x $i = <b>$kq</b><br>";
    }
}else {
    echo "vui long nhap so tu 1 => 9";
}
?>