<?php
    $Id = $_GET['Id'];
    $sql = "DELETE FROM cthoadon WHERE Id = '$Id'";
    $query = mysqli_query($conn,$sql);
    if($query == TRUE){
        echo "xóa thành công!";
        include "apphd.php";
    }else{
        echo "Error:". $sql . "</br>". $conn->error;
    }
?>