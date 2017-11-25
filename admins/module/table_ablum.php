

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $ablum = new ablum();
  $link="";

//Thêm sql
  if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  {
    $ma_ablum = $_POST["maablum"];
    $ma_the_loai =$_POST["matheloai"];
    $ten_ablum = $_POST["tenablum"];
    if($_FILES["hinh"]['name']!="")
     { 
        $h= $_FILES["hinh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"image/trangchu/ablum_hot/".$ten);
        $link="image/trangchu/ablum_hot/".$ten;
     }
   $arr = array(":ma_ablum"=>$ma_ablum,":ma_the_loai"=>$ma_the_loai,":ten_ablum"=>$ten_ablum,":hinh_anh"=>$link);
  $ablum->them($arr);
  }
 }
//Kết thúc Thêm sql

//Xóa sql
if(isset($_GET["thaotac"]) &&isset($_GET["ma_ablum"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_ablum = $_GET["ma_ablum"];
   $arr = array(":ma_ablum"=>$ma_ablum);
  $ablum->xoa($arr);}
}
//Kết thúc Xóa sql


//Sửa nội dung sql
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="suasql")
  {
    $ma_ablum = $_POST["maablum"];
    $ma_the_loai =$_POST["matheloai"];
    $ten_ablum = $_POST["tenablum"];
    if(isset($_FILES["hinh"]) && $_FILES["hinh"]['name']!="")
     { 
        $h= $_FILES["hinh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"image/trangchu/ablum_hot/".$ten);
        $link="image/trangchu/ablum_hot/".$ten;
          $arr = array(":ma_ablum"=>$ma_ablum,":ma_the_loai"=>$ma_the_loai,":ten_ablum"=>$ten_ablum,":hinh_anh"=>$link);
        $ablum->sua_picture($arr);
     }
     else
   {
    $arr = array(":ma_ablum"=>$ma_ablum,":ma_the_loai"=>$ma_the_loai,":ten_ablum"=>$ten_ablum);
  $ablum->sua_khong_picture($arr);
}
  }
 }
 //Kết thúc Sửa sql
?>
<!-- Nút button và From popup Thêm-->
<div class="card-body">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Thêm Ablum
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Ablum</h4>
      </div>
      <form action="index.php?table=ablum&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã Ablum:</td><td><input type="text" name="maablum"></td></tr>
    <tr>
      <td>Mã thể loại:</td>
      <td><select name="matheloai" id="nmTinh">
      <?php 
       $rows = $obj->select("select * from theloai ");
       foreach($rows as $row)
               { ?>
       <option value="<?php echo $row["ma_the_loai"]; ?>"> <?php echo $row["ten_the_loai"];?>
      </option>
   <?php   } ?>
  
  </select>
</td>
</tr>

    <tr><td>Tên Ablum:</td><td><input type="text" name="tenablum"  ></td></tr>

    <tr><td>Hình:</td><td><input type="file" name="hinh" /></td></tr>
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

  if($_GET['thaotac']=="sua" &&isset($_GET['ma_ablum']))
  {
?>
    <form action="index.php?table=ablum&thaotac=suasql" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
    <table  align="center">
    <tr><td>Mã Ablum:</td><td><input type="text" name="maablum" value="<?php echo $_GET['ma_ablum'] ?>" readonly="true"></td></tr>
    
      <?php 
      $arr = array(":ma_ablum"=>$_GET['ma_ablum']);
       $rows = $obj->select1("select * from ablum where ma_ablum=:ma_ablum",$arr);
      $rowstheloai = $obj->select("select * from theloai ");
      ?>
      
<tr><td>Mã thể loại:</td>
  <td><select name="matheloai" id="nmTinh">
     <?php foreach($rowstheloai as $rowstheloai)
               { ?>
       <option value="<?php echo $rowstheloai["ma_the_loai"]; ?>"   
        <?php 
        if($rowstheloai["ma_the_loai"]==$rows["ma_the_loai"])
        echo "selected='selected'";
?>
        > <?php echo $rowstheloai["ma_the_loai"];?>
      </option>
   <?php   } ?>
   </select>
</td>
</tr>

    <tr><td>Tên Ablum:</td><td><input type="text" name="tenablum" value="<?php echo $rows['ten_ablum'] ?>"></td></tr>
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
                   <th>Mã ablum</th>
                  <th>Mã thể loại</th>
                  <th>Tên ablum</th>
                  <th>Lượt nghe</th>
                  <th>Hình Ảnh</th>
                     <th>Ngày Tạo</th>
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
                   <th>Ngày Tạo</th>
                  <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

  $rows = $obj->select("select * from ablum ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_ablum"];?></td>
      <td><?php echo $row["ma_the_loai"];?></td>
      <td><?php echo $row["ten_ablum"];?></td>
      <td><?php echo $row["luot_nghe"];?></td>
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
         <td><?php echo $row["ngay_tao"];?></td>
      <td>
          <table>
        <tr><td><a class="btn btn-danger" href="index.php?table=ablum&thaotac=xoa&ma_ablum=<?php echo $row["ma_ablum"];?>" role="button" style="margin-top: -15px;" >Xóa</a>
        </td></tr>
        <tr><td>
<a class="btn btn-primary" href="index.php?table=ablum&thaotac=sua&ma_ablum=<?php echo $row["ma_ablum"];?>" role="button" style="margin-top: -15px;" >Sửa</a>
         </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>

<!--//Kết thúc Hiện Table tự động load sql -->