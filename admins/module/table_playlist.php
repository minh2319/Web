

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $quocgia = new Quocgia();

//Thêm SQL
  if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  {
    $ma_quoc_gia = $_POST["maquocgia"];
    $ten_quoc_gia =$_POST["tenquocgia"];

   $arr = array(":ma_quoc_gia"=>$ma_quoc_gia,":ten_quoc_gia"=>$ten_quoc_gia);
  $quocgia->them($arr);
  }
 }
//Kết thúc thêm SQL
?>
<?php  
//Xóa SQL
if(isset($_GET["thaotac"]) && isset($_GET["ma_quoc_gia"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_quoc_gia = $_GET["ma_quoc_gia"];
   $arr = array(":ma_quoc_gia"=>$ma_quoc_gia);
  $quocgia->xoa($arr);}
}

//Kết thúc Xóa SQL


//Sửa SQL
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="suasql")
  {
    $ma_quoc_gia= $_POST["maquocgia"];
    $ten_quoc_gia =$_POST["tenquocgia"];
    $arr = array(":ma_quoc_gia"=>$ma_quoc_gia,":ten_quoc_gia"=>$ten_quoc_gia);
  $quocgia->sua($arr);
}
  }
 
//Kết thúc sửa SQL

//Sửa Form 
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['ma_quoc_gia']))
  {
?>
<?php 
      $arr = array(":ma_quoc_gia"=>$_GET['ma_quoc_gia']);
       $rows = $obj->select1("select * from quocgia where ma_quoc_gia=:ma_quoc_gia",$arr);
?>
      <form action="index.php?table=quocgia&thaotac=suasql" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã quốc gia:</td><td><input type="text" name="maquocgia" value="<?php echo $_GET['ma_quoc_gia'] ?>" readonly="true"></td></tr>
    <tr><td>Tên quốc gia:</td><td><input type="text" name="tenquocgia" value="<?php echo $rows['ten_quoc_gia'] ?>" ></td></tr>
</table>

      </div><div style="margin-left: 350px;">
  
       <a class="btn btn-danger" href="index.php?table=quocgia" role="button" >Hủy</a>
      <input class="btn btn-success" type="submit" value="Cập Nhật" name="submit">
     </div>
       </form>
       <?php
  }
}
//Kết thúc sửa Form
  ?>  
<!--Button Thêm và popup thêm -->

<!--Kết Thúc Button Thêm và popup thêm -->

<!--Tự động load SQL vào Table -->
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th>Mã  playlist</th>
                  <th>Tên playlist</th>
                   <th>Mã thành viên</th>
                   <th>Mô tả</th>
                   <th>Thể loại</th>
                   <th>Ngày tạo</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>Mã  playlist</th>
                  <th>Tên playlist</th>
                   <th>Mã thành viên</th>
                   <th>Mô tả</th>
                   <th>Thể loại</th>
                   <th>Ngày tạo</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

 

  $rows = $obj->select("select * from playlist ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_playlist"];?></td>
      <td><?php echo $row["ten_playlist"];?></td>
      <td><?php echo $row["ma_thanh_vien"];?> </td>
            <td><?php echo $row["mo_ta"];?> </td>

      <td><?php echo $row["the_loai"];?> </td>

      <td><?php echo $row["ngay_tao"];?> </td>

        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>
<!--Kết thúc Tự động load SQL vào Table -->
