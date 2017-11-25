

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $thanhvien = new Thanhvien();
//Thêm sql
 //  if(isset($_GET["thaotac"]))
 // { 
 //  if($_GET["thaotac"]=="them")
 //  {
 //    $ma_ca_sy = $_POST["macasy"];
 //    $ten_ca_sy =$_POST["tencasy"];
 //    $nghe_danh = $_POST["nghedanh"];
 //     $gioi_tinh = $_POST["gioitinh"];
 //    $ma_quoc_gia = $_POST["maquocgia"];
 //    $gioi_thieu = $_POST["gioithieu"];
 //     $ngay_sinh = $_POST["ngaysinh"];

 //    if($_FILES["hinh"]['name']!="")
 //     { 
 //        $h= $_FILES["hinh"];
 //        $ten = $h["name"];
 //        $tam = $h["tmp_name"];
 //        move_uploaded_file($tam,"image/trangchu/casy/".$ten);
 //        $link="image/trangchu/casy/".$ten;
 //     }
 //   $arr = array(":ma_ca_sy"=>$ma_ca_sy,":ten_ca_sy"=>$ten_ca_sy,":nghe_danh"=>$nghe_danh,":hinh_anh"=>$link,":gioi_tinh"=>$gioi_tinh,":ma_quoc_gia"=>$ma_quoc_gia,":gioi_thieu"=>$gioi_thieu,":ngay_sinh"=>$ngay_sinh);
 //  $casy->them($arr);
 //  }
 // }
//Kết thúc Thêm sql

//Xóa sql
// if(isset($_GET["thaotac"]) &&isset($_GET["ma_ca_sy"]) )
//  { 
//   if($_GET["thaotac"]=="xoa")
//   {$ma_ca_sy = $_GET["ma_ca_sy"];
//    $arr = array(":ma_ca_sy"=>$ma_ca_sy);
//   $casy->xoa($arr);}
// }
//Kết thúc Xóa sql


//Sửa nội dung sql
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="suasql")
  {
    $id = $_POST["mathanhvien"];
    $quan_tri = $_POST["quantri"];
     $tinh_trang = $_POST["tinhtrang"];
   $arr = array(":id"=>$id,":quan_tri"=>$quan_tri,":tinh_trang"=>$tinh_trang);
  $thanhvien->sua($arr);
  }
 }
 //Kết thúc Sửa sql
?>
<!-- Nút button và From popup Thêm-->

<!-- Kết thúc Nút button và From popup Thêm-->

<?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['id']))
  {
?>
    <form action="index.php?table=thanhvien&thaotac=suasql" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
    <table  align="center">
    <tr><td>Mã thành viên:</td><td><input type="text" name="mathanhvien" value="<?php echo $_GET['id'] ?>" readonly="true"></td></tr>
      <?php
      $arr = array(":id"=>$_GET['id']);
       $rows = $obj->select1("select * from thanhvien where id=:id",$arr);
    
      ?>

 <tr><td>Username:</td><td><input type="text" name="username" value="<?php echo $rows['username'] ?>" readonly="true"></td></tr>

<tr><td>Quyền Quản Trị:</td><td><input type="radio" name="quantri" <?php 
  if($rows['quan_tri']==1)
  {
    ?>
checked="checked";
    <?php
  }
?> value="1"  >Có 
    <input type="radio" name="quantri" <?php 
  if($rows['quan_tri']==0)
  {
    ?>
  checked="checked";
    <?php
  }
?> value="0" >Không</td></tr>
   
   <tr><td>Tình trạng:</td><td><input type="radio" name="tinhtrang" <?php 
  if($rows['tinh_trang']==1)
  {
    ?>
checked="checked";
    <?php
  }
?> value="1"  >Kích Hoạt
    <input type="radio" name="tinhtrang" <?php 
  if($rows['tinh_trang']==0)
  {
    ?>
  checked="checked";
    <?php
  }
?> value="0" >Khóa</td></tr>

 </td></tr>

</table>
      </div><div style="margin-left: 350px;">
        <a class="btn btn-danger" href="index.php?table=thanhvien" role="button" >Hủy</a>
       <input class="btn btn-success" type="submit" value="Cập Nhật" name="submit">
     </div>
       </form>
       <?php
  }
}
//Kết thúc Form sửa

//Hiện Table tự động load sql
  ?>          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                 <th>id</th>
                <th>Username</th>
                <th>Mật khẩu</th>
                  <th>Giới tính</th>
                 <th>Họ tên</th>
                  <th>Ngày sinh</th>
                 <th>Số điện thoại</th>
                  <th>Email</th>
                 <th>Quản trị</th>
                 <th>Tình trạng</th>
               <th>Thao tác</th>

                </tr>
              </thead>
              <tfoot>
                   <tr>
                     <th>id</th>
                <th>Username</th>
                <th>Mật khẩu</th>
                  <th>Giới tính</th>
                 <th>Họ tên</th>
                  <th>Ngày sinh</th>
                 <th>Số điện thoại</th>
                  <th>Email</th>
                 <th>Quản trị</th>
                 <th>Tình trạng</th>
               <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

  $rows = $obj->select("select * from thanhvien ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["id"];?></td>
      <td><?php echo $row["username"];?></td>
      <td><?php echo $row["mat_khau"];?></td>
      <td><?php  
      if($row["gioi_tinh"]==1)
      {
        echo "Nam";
      }
      else
        echo "Nữ";

      ?></td>
        <td><?php echo $row["ho_ten"];?></td>
       <td><?php echo $row["nam_sinh"];?></td>
       <td><?php echo $row["so_dien_thoai"];?></td>
       <td><?php echo $row["email"];?></td>
       <td><?php 

      if($row["quan_tri"]==0)
      {
        echo "Không";
      }
      else
        echo "Có"
       ?>
       </td>
       <td><?php 

       if($row["tinh_trang"]==0)
       {
        echo "Bị khóa";
       }
      else  echo "Kích Hoạt";
       ?></td>
      <td>
          <table>
        <tr><td>
<a class="btn btn-primary" href="index.php?table=thanhvien&thaotac=sua&id=<?php echo $row["id"];?>" role="button" style="margin-top: -15px;" >Sửa</a>
         </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>

<!--//Kết thúc Hiện Table tự động load sql -->