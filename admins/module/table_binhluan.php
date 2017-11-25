

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $binhluan = new Binhluan();

//Thêm SQL
  if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  {
    $ma_chi_tiet_ablum = $_POST["machitietablum"];
    $ma_chi_tiet_bh =$_POST["machitietbaihat"];
    $ma_ablum=$_POST["maablum"];
   $arr = array(":ma_chi_tiet_ablum"=>$ma_chi_tiet_ablum,":ma_chi_tiet_bh"=>$ma_chi_tiet_bh,":ma_ablum"=>$ma_ablum);
  $chitietablum->them($arr);
  }
 }
//Kết thúc thêm SQL
?>
<?php  
//Xóa SQL
if(isset($_GET["thaotac"]) && isset($_GET["ma_chi_tiet_ablum"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_chi_tiet_ablum = $_GET["ma_chi_tiet_ablum"];
   $arr = array(":ma_chi_tiet_ablum"=>$ma_chi_tiet_ablum);
  $chitietablum->xoa($arr);}
}
//Kết thúc Xóa SQL

//Sửa SQL
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="suasql")
  {$ma_binh_luan = $_POST["mabinhluan"];
    $tinh_trang =$_POST["tinhtrang"];
   $arr = array(":ma_binh_luan"=>$ma_binh_luan,":tinh_trang"=>$tinh_trang);
  $binhluan->sua($arr);
}
  }
 
//Kết thúc sửa SQL

//Sửa Form 
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['ma_binh_luan']))
  {
?>
<?php 
      $arr = array(":ma_binh_luan"=>$_GET['ma_binh_luan']);
       $rows = $obj->select1("select * from binhluan where ma_binh_luan=:ma_binh_luan",$arr);
?>
      <form action="index.php?table=binhluan&thaotac=suasql" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã Bình luận:</td><td><input type="text" name="mabinhluan"  value="<?php echo $_GET['ma_binh_luan'] ?>" readonly="true"></td></tr>

  <tr>
      <td>Nội dung:</td>
      <td> <textarea rows="3" cols="25" name="noidung" readonly="true"> <?php echo $rows["noi_dung"];?></textarea>
</td>
</tr>
     <tr><td>Tình trạng:</td><td><input type="radio" name="tinhtrang" <?php 
  if($rows['tinh_trang']==1)
  {
    ?>
checked="checked";
    <?php
  }
?> value="1"  >Hiển Thị 
    <input type="radio" name="tinhtrang" <?php 
  if($rows['tinh_trang']==0)
  {
    ?>
  checked="checked";
    <?php
  }
?> value="0" >Ẩn</td></tr>

</table>
      </div><div style="margin-left: 350px;">
        <a class="btn btn-danger" href="index.php?table=binhluan" role="button" >Hủy</a>
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
                   <th>Mã bình luận</th>
                  <th>Thành viên ID </th>
                  <th>Nội dung</th>
                  <th>Thời gian</th>
                   <th>Mã chi tiết bh</th>
                   <th>Mã ablum</th>
                   <th>Mã tin tức</th>
                   <th>Tình trạng</th>
                   <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
               <th>Mã bình luận</th>
                  <th>Thành viên ID </th>
                  <th>Nội dung</th>
                  <th>Thời gian</th>
                   <th>Mã chi tiết bh</th>
                   <th>Mã ablum</th>
                   <th>Mã tin tức</th>
                   <th>Tình trạng</th>
                   <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  
  $rows = $obj->select("select * from binhluan ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_binh_luan"];?></td>
      <td><?php echo $row["thanh_vien_id"];?></td> 
      <td>  <textarea rows="3" cols="25" name="noidung" readonly="true"> <?php echo $row["noi_dung"];?></textarea></td>
      <td><?php echo $row["thoi_gian"];?></td>
            <td><?php echo $row["ma_chi_tiet_bh"];?></td>
             <td><?php echo $row["ma_ablum"];?></td>


      <td><?php echo $row["ma_tin_tuc"];?></td>
<td><?php 

       if($row["tinh_trang"]==0)
       {
        echo "Ẩn";
       }
      else  echo "Hiển thị";
       ?></td>
          <td><table>
        <tr><td>
<a class="btn btn-primary" href="index.php?table=binhluan&thaotac=sua&ma_binh_luan=<?php echo $row["ma_binh_luan"];?>" role="button" style="margin-top: -15px;" >Sửa</a>
         </td></tr>
      </table></td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>
<!--Kết thúc Tự động load SQL vào Table -->
