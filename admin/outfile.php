<?php
    include("config/config.php");
    include("Classes/PHPExcel.php");
    if(isset($_POST['outfile'])){

        $objExecl = new PHPExcel;
        $objExecl ->setActiveSheetIndex(0);
        $sheet = $objExecl -> getActiveSheet() ->setTitLe('Sheet1');

        $rowCount = 1;
        $sheet->setCellValue('A',$rowCount,'Mã Hóa Đơn');
        $sheet->setCellValue('B',$rowCount,'Mã Khách Hàng');
        $sheet->setCellValue('C',$rowCount,'Mã Loại');
        $sheet->setCellValue('D',$rowCount,'Mã Sản Phẩm');
        $sheet->setCellValue('E',$rowCount,'Địa Chỉ');
        $sheet->setCellValue('F',$rowCount,'Ngày Hóa Đơn');
        $sheet->setCellValue('G',$rowCount,'Trạng Thái');
        $sheet->setCellValue('H',$rowCount,'Tổng Tiền');

        $result = $conn->query(" SELECT hoadon.maHD,makh,masp,ngayhd,diachi,tongtien,tinhtrang FROM hoadon");
        while($row = mysqli_fetch_array($result)){
            print_r($row);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method = "POST">
            <button class="btn btn-primary" name ="outfile" type = "submit" >Out File</button>
        </form>
</body>
</html>