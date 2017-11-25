<div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th>Mã ablum</th>
                  <th>Mã thể loại</th>
                  <th>Tên ablum</th>
                  <th>Lượt nghe</th>
                  <th>Hình Ảnh</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>Mã ablum</th>
                  <th>Mã thể loại</th>
                  <th>Tên ablum</th>
                  <th>Lượt nghe</th>
                  <th>Hình Ảnh</th>
                  <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

  $obj = new Db();//tu dong load file classes/Db.class.php
  $ablum = new ablum();
if(isset($_GET["thaotac"]) &&isset($_GET["ma_ablum"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_ablum = $_GET["ma_ablum"];
   $arr = array(":ma_ablum"=>$ma_ablum);
  $ablum->xoa($arr);}
}
  $rows = $obj->select("select * from ablum ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_ablum"];?></td>
      <td><?php echo $row["ma_the_loai"];?></td>
      <td><?php echo $row["ten_ablum"];?></td>
      <td><?php echo $row["luot_nghe"];?></td>
      <td><img style="width: 150px;height: 100px;" src="<?php echo $row["hinh_anh"];?>"></td>
      <td>
          <table>
        <tr><td><a href='index.php?thaotac=xoa&ma_ablum=<?php echo $row["ma_ablum"];?>'>Xóa</a></td></tr>
        <tr><td><a href='index.php?thaotac=sua&ma_ablum=<?php echo $row["ma_ablum"];?>'>Sửa</a></td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>
</div>
