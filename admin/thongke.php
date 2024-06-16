<?php
    include("./config/config.php")
?>
<div class="x_panel">
  <div class="x_title">
    <h2>Thống kê sản phẩm <small></small></h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Settings 1</a>
            <a class="dropdown-item" href="#">Settings 2</a>
          </div>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
        <div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"><label> <class="form-control" input-sm placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
        <thead>
          <tr style= "background-color: #2a3f54;color: #fff;" role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">Loại sản phẩm</th>
            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Số lượng mặt hàng</th>
            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Tổng số sản phẩm</th>
            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150px;">Giá cao nhất</th>
            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 150px;">Giá thấp nhất</th>
            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 150px;">Giá trung bình</th>
    
          </tr>
        </thead>
        <tbody>
          <?php
           
            $qry = $conn->query("select LoaiSP.tenloai, COUNT(*) as 'soluong',SUM(soluong) as 'soluong1', MAX(sanpham.gia) as 'giacao', MIN(sanpham.gia) as 'giathap',  AVG(sanpham.gia) as 'giatb' from LoaiSP JOIN sanpham ON LoaiSP.maloai = sanpham.maloai GROUP BY loaiSP.maloai");
            while($row= $qry->fetch_assoc()):
          ?>
          <tr>
            <td><b><?php echo $row['tenloai'] ?></b></td>
            <td><b><?php echo $row['soluong'] ?></b></td>
            <td><b><?php echo $row['soluong1'] ?></b></td>
            <td><b><?php echo ($row['giacao'])?></b></td>
            <td><b><?php echo $row['giathap'] ?></b></td>
            <td><b><?php echo ($row['giatb']) ?></b></td>
            
            
              </div>
            
          </tr>	
          <?php endwhile; ?>
        </tbody>
        </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
      </div>
    </div>
    <div class="bdthongke">
          <form action="" method="POST" >
            <div class="input_tk">
                <p>Thống kê trong 7 ngày qua</p>
                <input style="    width: 15%;font-size: 14px; padding: 5px;outline: none;"  type="date" name="thongke1" id="dateInputtk1">
                <button style="padding: 5px;" name="sbmtk" type="submit">submit</button>
                
            </div>
            <div class="" style="width: 2000px;">
              <div class="col-md-5" >
                <canvas id="myChart"></canvas>
              </div>
            </div>
          </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    


   "<?php 
        if(isset($_POST['sbmtk'])) 
        {
          $thongke1d = date('d', strtotime($_POST['thongke1']));
          $thongke1m = date('m', strtotime($_POST['thongke1']));
          $thongke1y = date('Y', strtotime($_POST['thongke1']));
          
          $qry1 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, (DAY(`hoadon`.`ngayhd`)) AS day,SUM(`tongtien`) AS `tongtien1` FROM `hoadon`  
          WHERE MONTH(`hoadon`.`ngayhd`) =  $thongke1m AND (DAY(`hoadon`.`ngayhd`)) =$thongke1d GROUP BY month,day");$row1= $qry1->fetch_assoc();
          $qry2 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, (DAY(`hoadon`.`ngayhd`)) AS day,SUM(`tongtien`) AS `tongtien2` FROM `hoadon`  
          WHERE MONTH(`hoadon`.`ngayhd`) =  $thongke1m AND (DAY(`hoadon`.`ngayhd`)) =$thongke1d +1 GROUP BY month,day");$row2= $qry2->fetch_assoc();
          $qry3 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, (DAY(`hoadon`.`ngayhd`)) AS day,SUM(`tongtien`) AS `tongtien3` FROM `hoadon`  
          WHERE MONTH(`hoadon`.`ngayhd`) =  $thongke1m AND (DAY(`hoadon`.`ngayhd`)) =$thongke1d +2 GROUP BY month,day");$row3= $qry3->fetch_assoc();
          $qry4 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, (DAY(`hoadon`.`ngayhd`)) AS day,SUM(`tongtien`) AS `tongtien4` FROM `hoadon`  
          WHERE MONTH(`hoadon`.`ngayhd`) =  $thongke1m AND (DAY(`hoadon`.`ngayhd`)) =$thongke1d +3 GROUP BY month,day");$row4= $qry4->fetch_assoc();
          $qry5 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, (DAY(`hoadon`.`ngayhd`)) AS day,SUM(`tongtien`) AS `tongtien5` FROM `hoadon`  
          WHERE MONTH(`hoadon`.`ngayhd`) =  $thongke1m AND (DAY(`hoadon`.`ngayhd`)) =$thongke1d +4 GROUP BY month,day");$row5= $qry5->fetch_assoc();
          $qry6 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, (DAY(`hoadon`.`ngayhd`)) AS day,SUM(`tongtien`) AS `tongtien6` FROM `hoadon`  
          WHERE MONTH(`hoadon`.`ngayhd`) =  $thongke1m AND (DAY(`hoadon`.`ngayhd`)) =$thongke1d +5 GROUP BY month,day");$row6= $qry6->fetch_assoc();
          $qry7 = $conn->query("SELECT (MONTH(`hoadon`.`ngayhd`)) AS month, (DAY(`hoadon`.`ngayhd`)) AS day,SUM(`tongtien`) AS `tongtien7` FROM `hoadon`  
          WHERE MONTH(`hoadon`.`ngayhd`) =  $thongke1m AND (DAY(`hoadon`.`ngayhd`)) =$thongke1d +6 GROUP BY month,day");$row7= $qry7->fetch_assoc();
        }
        
   ?> ";
    
    var montday1 = "<?php echo $row1['tongtien1'] ?>";
    var montday2 = "<?php echo $row2['tongtien2'] ?>";
    var montday3 = "<?php echo $row3['tongtien3'] ?>";
    var montday4 = "<?php echo $row4['tongtien4'] ?>";
    var montday5 = "<?php echo $row5['tongtien5'] ?>";
    var montday6 = "<?php echo $row6['tongtien6'] ?>";
    var montday7 = "<?php echo $row7['tongtien7'] ?>";
    var chu1 = "<?php echo $thongke1d ."/". $thongke1m ."/". $thongke1y ?>";
    var chu2 = "<?php echo $thongke1d + 1 ."/". $thongke1m ."/". $thongke1y ?>";
    var chu3 = "<?php echo $thongke1d + 2 ."/". $thongke1m ."/". $thongke1y ?>";
    var chu4 = "<?php echo $thongke1d + 3 ."/". $thongke1m ."/". $thongke1y ?>";
    var chu5 = "<?php echo $thongke1d + 4 ."/". $thongke1m ."/". $thongke1y ?>";
    var chu6 = "<?php echo $thongke1d + 5 ."/". $thongke1m ."/". $thongke1y ?>";
    var chu7 = "<?php echo $thongke1d + 6 ."/". $thongke1m ."/". $thongke1y ?>";
    
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [chu1, chu2, chu3, chu4, chu5, chu6, chu7],
                datasets: [{
                    label: 'Thống kê doanh thu trong 7 ngày qua',
                    
                    data: [montday1, montday2, montday3, montday4, montday5, montday6, montday7],
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

</div>