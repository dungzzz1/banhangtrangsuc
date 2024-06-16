<?php
    include("config/config.php");
    include("Classes/PHPExcel.php");
    if(isset($_POST['app'])){
        $file = $_FILES['file']['tmp_name'];
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        $objReader->setLoadSheetsOnly('Sheet1');

        $objExcel = $objReader->load($file);
        $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
        
        $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
        // echo $highestRow;
        for($row = 2; $row<=$highestRow; $row++){
            $masp = $sheetData[$row]['A'];
            $maloai = $sheetData[$row]['B'];
            $tensp = $sheetData[$row]['C'];
            $soluong = $sheetData[$row]['D']; 
            $gia = $sheetData[$row]['E']; 
            $anh = $sheetData[$row]['F']; 
            $mota = $sheetData[$row]['G'];

            $sql = "INSERT INTO sanpham(masp,maloai,tensp,soluong,gia,anh,mota) VALUES ('$masp','$maloai','$tensp',$soluong,$gia,$anh,'$mota')";
            $conn->query($sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../accset/css/app.css">
    <title>Document</title>
</head>
<body>
    <form style="margin-left: 10px;" method="POST" enctype="multipart/form-data">
        <input class="top" type="file" name="file">
        <button class="btn btn-primary" type="submit" name="app">App</button>
    </form>
</body>
</html>