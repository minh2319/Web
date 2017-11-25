

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $casy = new Casy();
  $link="";

//Thêm sql
  if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  {
    $ma_ca_sy = $_POST["macasy"];
    $ten_ca_sy =$_POST["tencasy"];
    $nghe_danh = $_POST["nghedanh"];
     $gioi_tinh = $_POST["gioitinh"];
    $ma_quoc_gia = $_POST["maquocgia"];
    $gioi_thieu = $_POST["gioithieu"];
     $ngay_sinh = $_POST["ngaysinh"];

    if($_FILES["hinh"]['name']!="")
     { 
        $h= $_FILES["hinh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"image/trangchu/casy/".$ten);
        $link="image/trangchu/casy/".$ten;
     }
   $arr = array(":ma_ca_sy"=>$ma_ca_sy,":ten_ca_sy"=>$ten_ca_sy,":nghe_danh"=>$nghe_danh,":hinh_anh"=>$link,":gioi_tinh"=>$gioi_tinh,":ma_quoc_gia"=>$ma_quoc_gia,":gioi_thieu"=>$gioi_thieu,":ngay_sinh"=>$ngay_sinh);
  $casy->them($arr);
  }
 }
//Kết thúc Thêm sql

//Xóa sql
if(isset($_GET["thaotac"]) &&isset($_GET["ma_ca_sy"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_ca_sy = $_GET["ma_ca_sy"];
   $arr = array(":ma_ca_sy"=>$ma_ca_sy);
  $casy->xoa($arr);}
}
//Kết thúc Xóa sql


//Sửa nội dung sql
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="suasql")
  {
    $ma_ca_sy = $_POST["macasy"];
    $ten_ca_sy =$_POST["tencasy"];
    $nghe_danh = $_POST["nghedanh"];
     $gioi_tinh = $_POST["gioitinh"];
    $ma_quoc_gia = $_POST["maquocgia"];
    $gioi_thieu = $_POST["gioithieu"];
     $ngay_sinh = $_POST["ngaysinh"];

    if($_FILES["hinh"]['name']!="")
     { 
        $h= $_FILES["hinh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"image/trangchu/casy/".$ten);
        $link="image/trangchu/casy/".$ten;

  $arr = array(":ma_ca_sy"=>$ma_ca_sy,":ten_ca_sy"=>$ten_ca_sy,":nghe_danh"=>$nghe_danh,":hinh_anh"=>$link,":gioi_tinh"=>$gioi_tinh,":ma_quoc_gia"=>$ma_quoc_gia,":gioi_thieu"=>$gioi_thieu,":ngay_sinh"=>$ngay_sinh);
  $casy->sua_picture($arr);

     }
   $arr = array(":ma_ca_sy"=>$ma_ca_sy,":ten_ca_sy"=>$ten_ca_sy,":nghe_danh"=>$nghe_danh,":gioi_tinh"=>$gioi_tinh,":ma_quoc_gia"=>$ma_quoc_gia,":gioi_thieu"=>$gioi_thieu,":ngay_sinh"=>$ngay_sinh);
  $casy->sua_khong_picture($arr);
  }
 }
 //Kết thúc Sửa sql
?>
<!-- Nút button và From popup Thêm-->
<div class="card-body">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Thêm Ca Sỹ
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Ca Sỹ</h4>
      </div>
      <form action="index.php?table=casy&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã Ca sỹ:</td><td><input type="text" name="macasy"></td></tr>
    <tr><td>Tên Ca sỹ:</td><td><input type="text" name="tencasy"  ></td></tr>
    <tr><td>Nghệ Danh:</td><td><input type="text" name="nghedanh"  ></td></tr>
    <tr><td>Giới tính:</td><td><input type="radio" name="gioitinh" value="1" id="nmNam" >Nam
    <input type="radio" name="gioitinh" value="0" id="nmNu">Nữ</td></tr>
    <tr><td>Giới Thiệu:</td><td><textarea rows="5" cols="30" name="gioithieu"></textarea></td></tr>
    <tr><td>Hình:</td><td><input type="file" name="hinh" /></td></tr>
 <tr><td>Ngày Sinh:</td><td><input type="date" name="ngaysinh">
</td></tr>
    <tr>
      <td>Mã Quốc gia:</td>
      <td><select name="maquocgia">
      <?php 
       $rows = $obj->select("select * from quocgia ");
       foreach($rows as $row)
               { ?>
       <option value="<?php echo $row["ma_quoc_gia"]; ?>"> <?php echo $row["ma_quoc_gia"];?>
      </option>
   <?php   } ?>
  </select>
</td>
</tr>


</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <input type="submit" value="Thêm" name="submit">
       </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Kết thúc Nút button và From popup Thêm-->

<?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['ma_ca_sy']))
  {
?>
    <form action="index.php?table=casy&thaotac=suasql" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
    <table  align="center">
    <tr><td>Mã Ca Sỹ:</td><td><input type="text" name="macasy" value="<?php echo $_GET['ma_ca_sy'] ?>" readonly="true"></td></tr>

      <?php
      $arr = array(":ma_ca_sy"=>$_GET['ma_ca_sy']);
       $rows = $obj->select1("select * from casy where ma_ca_sy=:ma_ca_sy",$arr);
      $rowsquocgia = $obj->select("select * from quocgia ");
      ?>

 <tr><td>Tên Ca Sỹ:</td><td><input type="text" name="tencasy" value="<?php echo $rows['ten_ca_sy'] ?>"></td></tr>
 <tr><td>Nghệ Danh:</td><td><input type="text" name="nghedanh" value="<?php echo $rows['nghe_danh'] ?>"></td></tr>
<tr><td>Giới tính:</td><td><input type="radio" name="gioitinh" <?php 
  if($rows['gioi_tinh']==1)
  {
    ?>
checked="checked";
    <?php
  }
?> value="1"  >Nam 
    <input type="radio" name="gioitinh" <?php 
  if($rows['gioi_tinh']==0)
  {
    ?>
  checked="checked";
    <?php
  }
?> value="0" >Nữ</td></tr>
   

 </td></tr>

 <tr><td>Giới thiệu</td><td><textarea rows="5" cols="30" name="gioithieu" > <?php echo $rows['gioi_thieu'] ?></textarea></td></tr>
  <tr><td>Ngày Sinh:</td><td><input type="date" name="ngaysinh" value="<?php echo $rows['ngay_sinh']  ?>">
</td></tr>
<tr><td>Mã quốc gia:</td>
  <td><select name="maquocgia" id="nmTinh">
     <?php foreach($rowsquocgia as $rowsquocgia)
               { ?>
       <option value="<?php echo $rowsquocgia["ma_quoc_gia"]; ?>"   
        <?php 
        if($rowsquocgia["ma_quoc_gia"]==$rows["ma_quoc_gia"])
        echo "selected='selected'";
?>
        > <?php echo $rowsquocgia["ten_quoc_gia"];?>
      </option>
   <?php   } ?>
   </select>
</td>
</tr>

   
    <tr><td>Hình:</td><td><img style="width: 150px;height: 100px;" src="<?php echo $rows["hinh_anh"];?>"></td><td><input type="file" name="hinh" /></td></tr>
</table>
      </div><div style="margin-left: 350px;">
        <a class="btn btn-danger" href="index.php?table=ablum" role="button" >Hủy</a>
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
                 <th>Mã Ca sỹ</th>
                <th>Tên Ca Sỹ</th>
                <th>Nghệ Danh</th>
                  <th>Giới tính</th>
                 <th>Ngày Sinh</th>
                  <th>Giới thiệu </th>
                 <th>Hình Ảnh</th>
                  <th>Quốc Gia</th>
               <th>Thao tác</th>

                </tr>
              </thead>
              <tfoot>
                   <tr>
                 <th>Mã Ca sỹ</th>
                <th>Tên Ca Sỹ</th>
                <th>Nghệ Danh</th>
                  <th>Giới tính</th>
                 <th>Ngày Sinh</th>
                  <th>Giới thiệu </th>
                 <th>Hình Ảnh</th>
                  <th>Quốc Gia</th>
                  <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

  $rows = $obj->select("select * from casy ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_ca_sy"];?></td>
      <td><?php echo $row["ten_ca_sy"];?></td>
      <td><?php echo $row["nghe_danh"];?></td>
      <td><?php  
      if($row["gioi_tinh"]==1)
      {
        echo "Nam";
      }
      else
        echo "Nữ";

      ?></td>
       <td><?php echo $row["ngay_sinh"];?></td>
      <td>   <textarea rows="4" cols="30" name="loibaihat" readonly="true"> <?php echo $row["gioi_thieu"];?></textarea>       </td>
<td>
        <?php
        if( $row["hinh_anh"]==null)
        {
          echo "<span style=\" color: #E13C3C\">Ablum này không có hình </span>";
        } 
        else
        {
        ?>
        <img style="width: 150px;height: 100px;" src="<?php echo $row["hinh_anh"];?>">
<?php  } ?>
      </td>
       <td><?php echo $row["ma_quoc_gia"];?></td>
      <td>
          <table>
        <tr><td><a class="btn btn-danger" href="index.php?table=casy&thaotac=xoa&ma_ca_sy=<?php echo $row["ma_ca_sy"];?>" role="button" style="margin-top: -15px;" >Xóa</a>
        </td></tr>
        <tr><td>
<a class="btn btn-primary" href="index.php?table=casy&thaotac=sua&ma_ca_sy=<?php echo $row["ma_ca_sy"];?>" role="button" style="margin-top: -15px;" >Sửa</a>
         </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>

<!--//Kết thúc Hiện Table tự động load sql -->