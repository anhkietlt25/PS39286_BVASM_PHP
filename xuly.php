<?php


// Cau 2
function getDataFromJsonFile($filePath) {

    $jsonData = file_get_contents($filePath);

    $data = json_decode($jsonData, true);
    

    return $data;
}

function xep_loai($diemtb) {
    if ($diemtb >= 9.0) {
        return "Xuất sắc";
    } else if ($diemtb >= 8.0) {
        return "Giỏi";
    } else if ($diemtb >= 6.5) {
        return "Khá";
    } else if ($diemtb >= 5.0) {
        return "Trung bình";
    } else {
        return "Yếu";
    }
}





// $diemtb_cao = 0;
// $sinh_vien_ong_vang = array();
// foreach ($sinh_vien as $sv) {
//     if ($sv['diem_tb'] > $diem_cao_nhat) {
//         $diemtb_cao = $sv['diem_tb'];
//         $sinh_vien_ong_vang = $sv;
//     }
// }



?>