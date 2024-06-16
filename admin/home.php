<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php include("config/config.php"); 
?>
<div class="home" style = "    margin-bottom: 23px;font-size: 24px; color: #000;"> Home</div>
<div class="borderhome" style = "border: 1px solid;margin-bottom: 25px;"></div>
<div class="row" style = "justify-content: space-between; ">
    <div class=""  >
        <div class="dashboard__item" style = "margin-top:13px ;display: flex;box-shadow: 0px 0px 5px 0px rgb(184 184 184); width: 125%;height: 115px;">
            <div class="dab__icon" style = "padding: 15px; margin: 7px 7px 26px 7px;;background-color: #2d47b7;box-shadow: 0px 0px 5px 0px rgb(184 184 184);"><i class="fas fa-users" style = "font-size: 35px;color: #fff; "></i></div>
            <div class="dab__text">
                <h5 style= "padding: 10px; color: #000; font-size: 15px; ">Khách hàng</h5>
                <span style = " margin-left: 13px;color: #000;font-weight: 700;">
                    <?php echo $conn->query("SELECT * FROM khachhang1 ")->num_rows; ?>    
                </span>
            </div>
        </div>
        <div class="dashboard__item" style = "margin-top:34px ;display: flex;box-shadow: 0px 0px 5px 0px rgb(184 184 184); width: 125%;height: 115px;">
            <div class="dab__icon" style = "padding: 15px; margin: 7px 7px 26px 7px;;background-color: #2d47b7;box-shadow: 0px 0px 5px 0px rgb(184 184 184);"><i class="fa fa-edit" style = "font-size: 35px;color: #fff; "></i></div>
            <div class="dab__text">
                <h5 style= "padding: 10px; color: #000;font-size: 15px;">Đơn hàng</h5>
                <span style = " margin-left: 13px;color: #000;font-weight: 700;">
                    <?php echo $conn->query("SELECT * FROM hoadon ")->num_rows; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="" style="margin-right: 64%; position: relative;">
        <div class="dashboard__item" style = "margin-top:13px ;display: flex;box-shadow: 0px 0px 5px 0px rgb(184 184 184); width: 135%;height: 115px;">
             <div class="dab__icon" style = "padding: 15px; margin: 7px 7px 26px 7px;;background-color: #2d47b7;box-shadow: 0px 0px 5px 0px rgb(184 184 184);"><i class="fa fa-table" style = "font-size: 35px;color: #fff; "></i></div>
            <div class="dab__text">
                <h5 style= "padding: 10px 10px 0px 10px; color: #000;font-size: 15px;">Doanh thu</h5>
                <span style = " margin-left: 13px;color: #000;font-weight: 700;">
                    <?php 
                    $now = getdate();
                    $ngay =  $now['mday'];
                    $thang =  $now['mon'];
                    $nam =  $now['year'];
                    $qry = $conn->query("SELECT 
                                                    ((`hoadon`.`ngayhd`)) AS month,
                                                    SUM(`hoadon`.`tongtien`) AS tt
                                                FROM
                                                    `hoadon`
                                                WHERE
                                                    (DAY(`hoadon`.`ngayhd`)) = '$ngay' AND (MONTH(`hoadon`.`ngayhd`)) = '$thang' AND (YEAR(`hoadon`.`ngayhd`)) = '$nam'
                                                GROUP BY month") ;
                        $row= $qry->fetch_assoc();
                        $tongtien = $row['tt'];
                        echo number_format($tongtien,0,',','.').' vnđ';
                    ?>
                </span>
            </div>
        </div>  
        <div class="dashboard__item" style = "margin-top:34px ;display: flex;box-shadow: 0px 0px 5px 0px rgb(184 184 184); width: 125%;height: 115px;display: none;">
            <div class="dab__icon" style = "padding: 15px; margin: 7px 7px 26px 7px;;background-color: #2d47b7;box-shadow: 0px 0px 5px 0px rgb(184 184 184);"><i class="fas fa-check" style = "font-size: 35px;color: #fff; "></i></div>
            <div class="dab__text">
                <h5 style= " padding: 10px 10px 0px 10px; color: #000;font-size: 15px;">Tổng số đơn hàng</h5>
                <span style = " margin-left: 13px;color: #000;font-weight: 700;">
                    <!-- <?php echo $conn->query("SELECT * FROM hoadon WHERE trangthai ='đã giao'")->num_rows; ?> -->
                </span>
            </div> 
        </div>
    </div>
    <div class="col-md-5" style="padding: 0px 15px;width:620px; position: absolute;margin-left: 38.6%;border:1px solid #ccc;box-shadow: 0px 0px 5px 0px rgb(184 184 184);">
        <canvas id="myChart"></canvas>
    </div>
</div>
<?php
    include("thongkeday.php");
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');

   "<?php 
        $qry1 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien1` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 1 GROUP BY month");$row1= $qry1->fetch_assoc();
        $qry2 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien2` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 2 GROUP BY month");$row2= $qry2->fetch_assoc();
        $qry3 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien3` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 3 GROUP BY month");$row3= $qry3->fetch_assoc();
        $qry4 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien4` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 4 GROUP BY month");$row4= $qry4->fetch_assoc();
        $qry5 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien5` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 5 GROUP BY month");$row5= $qry5->fetch_assoc();
        $qry6 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien6` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 6 GROUP BY month");$row6= $qry6->fetch_assoc();
        $qry7 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien7` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 7 GROUP BY month");$row7= $qry7->fetch_assoc();
        $qry8 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien8` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 8 GROUP BY month");$row8= $qry8->fetch_assoc();
        $qry9 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien9` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 9 GROUP BY month");$row9= $qry9->fetch_assoc();
        $qry10 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien10` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 10 GROUP BY month");$row10= $qry10->fetch_assoc();
        $qry11 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien11` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 11 GROUP BY month");$row11= $qry11->fetch_assoc();
        $qry12 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, SUM(`tongtien`) AS `tongtien12` FROM `hoadon`  WHERE MONTH(`hoadon`.`ngayhd`) = 12 GROUP BY month");$row12= $qry12->fetch_assoc();
   ?> ";
    
    var montday1 = "<?php echo $row1['tongtien1'] ?>";
    var montday2 = "<?php echo $row2['tongtien2'] ?>";
    var montday3 = "<?php echo $row3['tongtien3'] ?>";
    var montday4 = "<?php echo $row4['tongtien4'] ?>";
    var montday5 = "<?php echo $row5['tongtien5'] ?>";
    var montday6 = "<?php echo $row6['tongtien6'] ?>";
    var montday7 = "<?php echo $row7['tongtien7'] ?>";
    var montday8 = "<?php echo $row8['tongtien8'] ?>";
    var montday9 = "<?php echo $row9['tongtien9'] ?>";
    var montday10 = "<?php echo $row10['tongtien10'] ?>";
    var montday11 = "<?php echo $row11['tongtien11'] ?>";
    var montday12 = "<?php echo $row12['tongtien12'] ?>";
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12",],
                datasets: [{
                    label: 'Thống kê doanh thu theo tháng',
                    
                    data: [montday1, montday2, montday3, montday4, montday5, montday6, montday7, montday8, montday9, montday10, montday11, montday12],
                    backgroundColor: [
                        'rgba(30,144,255, 0.2)',

                    ],
                    borderColor: [
                        'rgba(30,144,255,1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
       
</script>

