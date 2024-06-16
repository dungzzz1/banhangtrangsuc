<div class="x_panel">
  <div class="x_title">
    <h2>Danh Sách Loại Sản Phẩm <small></small></h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Settings 1</a>
          <a class="dropdown-item" href="#">Settings 2</a>
        </div>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
    </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
        <div class="btn__add" style = " margin-top: 15px; border-radius:3px">
          <a href="./index.php?page=addloaisp" style = "padding: 9px 28px; border: 1px solid;border-radius:3px"><i class="fa fa-plus"></i>Thêm loại sản phẩm</a>
        </div>
        <div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"><label> <class="form-control input-sm placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
          <thead>
            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 109px;">Mã loại</th>
              <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 171px;">Tên loại</th>
              <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Mô tả </th>
            </tr>
          </thead>
          <tbody>
            <?php
              $qry = $conn->query("SELECT * FROM LoaiSP ORDER BY maloai ASC");
              while($row= $qry->fetch_assoc()):
            ?>
            <tr>
              <td><b><?php echo $row['maloai'] ?></b></td>
              <td><b><?php echo ($row['tenloai']) ?></b></td>
              <td><b><?php echo $row['Mota'] ?></b></td>
              <td class="text-center">
                <div class="btn-group">
                  <form action="./index.php?page=sualoaisp" method = "POST">
                      <input type="hidden" name="edit_maloai" value = "<?php echo $row['maloai'] ?>">
                      <button type = "submit" name = "edit_data_btn" class="btn btn-primary btn-flat">
                      <i class="fas fa-edit"></i>
                    </button>
                  </form>
                  <a href="./index.php?page=view_product&maloai=<?php echo $row['maloai'] ?>" class="btn btn-info btn-flat">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="./index.php?page=xoaloaisp&maloai=<?php echo $row['maloai'] ?>" class="btn-infos btn  btn-flat">
                <i class="fas fa-trash"></i>
                <style>
                  .btn-infos{
                    background-color:#dc3545;
                    border-color:#dc3545;
                    color:#fff;
                  }
                  .btn-infos:hover{
                    color:#fff;
                    box-shadow: inset 0 0 0 100px rgb(0 0 0 / 20%);
                  }
                </style>
                </a>
                </div>
              </td>
            </tr>	
            <?php endwhile; ?>
          </tbody>
          </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
        </div>
      </div>
    </div>
  </div>
</div>