<?php
if(isset($_POST['mssv'])&&isset($_POST['ten'])&&isset($_POST['diemtb'])) {
    $filestr = file_get_contents('dulieu.json');
    $ArrUsers = json_decode($filestr);
    $user['mssv'] = $_POST['mssv'];
    $user['ten'] = $_POST['ten'];
    $user['diemtb'] = $_POST['diemtb'];
    

    array_push($ArrUsers, $user);

    $userjson = json_encode($ArrUsers, JSON_PRETTY_PRINT);
    $file = fopen("dulieu.json", "w");
    fwrite($file, $userjson);
    fclose($file);
    header("location:bailam.php");
    
}else{
  echo "Đăng Kí";
}