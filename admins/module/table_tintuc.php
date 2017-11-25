
 
<script src="editor/ckeditor/ckeditor.js" ></script>
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
                  <th>thao tác </th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
               <th style="width: 50px;">Mã bình luận</th>
                  <th>Thành viên ID </th>
                 
                </tr>
              </tfoot>
              <tbody>
            <tr>
              <td> ID</td>  
               <td>

              	<form action="index.php?table=tintuc" method="post" enctype="multipart/form-data">
              	<textarea id="content" name=noidung>Nội dung TextArea</textarea>
 <input type="submit" value="Thêm" name="submit">
          </form>
</td>
             
</td>
<td><?php 
	if(isset($_POST['noidung']))
	{
		echo $_POST['noidung'];
	}
?></td>
</tr>
            </tbody>
          </table>
        </div>
        <script type="text/javascript">CKEDITOR.replace( 'content'); </script>


<!--Kết thúc Tự động load SQL vào Table -->
