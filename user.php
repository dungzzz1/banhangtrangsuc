<?php
    function checkuser($username,$passwrod){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM nguoidung WHERE username='".$username."' AND passwrod='".$passwrod."'");
        $stmt ->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchALL();
        return $kq[0]['role'];
    }

?>