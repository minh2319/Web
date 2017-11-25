

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $chitietbaihat = new Chitietbaihat();
  $link="";

//Thêm sql
  if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  {
    $ma_chi_tiet_bh = $_POST["machitietbaihat"];
    $ma_bai_hat =$_POST["mabaihat"];
    $ma_ca_sy = $_POST["macasy"];
    if($_FILES["hinh"]['name']!="")
     { 
        $h= $_FILES["hinh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"image/trangchu/baihathot/".$ten);
        $link="image/trangchu/baihathot/".$ten;
     }
      $ma_the_loai = $_POST["matheloai"];
      $duong_dan = $_POST["duongdan"];
      $chat_luong = $_POST["chatluong"];
   $arr = array(":ma_chi_tiet_bh"=>$ma_chi_tiet_bh,":ma_bai_hat"=>$ma_bai_hat,":ma_ca_sy"=>$ma_ca_sy,":ma_the_loai"=>$ma_the_loai,":duong_dan"=>$duong_dan,":chat_luong"=>$chat_luong,":hinh_anh"=>$link);
  $chitietbaihat->them($arr);
  }
 }
//Kết thúc Thêm sql

//Xóa sql
if(isset($_GET["thaotac"]) &&isset($_GET["ma_chi_tiet_bh"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_chi_tiet_bh = $_GET["ma_chi_tiet_bh"];
   $arr = array(":ma_chi_tiet_bh"=>$ma_chi_tiet_bh);
  $chitietbaihat->xoa($arr);}
}
//Kết thúc Xóa sql


//Sửa nội dung sql
 if(isset($_GET["thaotac"]))
 { 
   if($_GET["thaotac"]=="suasql")
  {
    $ma_chi_tiet_bh = $_POST["machitietbaihat"];
    $ma_bai_hat =$_POST["mabaihat"];
    $ma_ca_sy = $_POST["macasy"];
     $ma_the_loai = $_POST["matheloai"];
      $duong_dan = $_POST["duongdan"];
      $chat_luong = $_POST["chatluong"];
    if($_FILES["hinh"]['name']!="")
     { 
        $h= $_FILES["hinh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"image/trangchu/baihathot/".$ten);
        $link="image/trangchu/baihathot/".$ten;
        $arr = array(":ma_chi_tiet_bh"=>$ma_chi_tiet_bh,":ma_bai_hat"=>$ma_bai_hat,":ma_ca_sy"=>$ma_ca_sy,":ma_the_loai"=>$ma_the_loai,":duong_dan"=>$duong_dan,":chat_luong"=>$chat_luong,":hinh_anh"=>$link);
  $chitietbaihat->sua_picture($arr);
     }
   $arr = array(":ma_chi_tiet_bh"=>$ma_chi_tiet_bh,":ma_bai_hat"=>$ma_bai_hat,":ma_ca_sy"=>$ma_ca_sy,":ma_the_loai"=>$ma_the_loai,":duong_dan"=>$duong_dan,":chat_luong"=>$chat_luong);
  $chitietbaihat->sua_khong_picture($arr);
  }
 }
 //Kết thúc Sửa sql
?>
<!-- Nút button và From popup Thêm-->
<div class="card-body">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Thêm Chi tiết bài hát
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Chi tiết bài hát</h4>
      </div>
      <form action="index.php?table=chitietbaihat&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã Chi tiết bài hát:</td><td><input type="text" name="machitietbaihat"></td></tr>
    <tr>
      <td>Mã Bài Hát:</td>
      <td><select name="mabaihat" >
      <?php 
       $rows = $obj->select("select * from baihat ");
       foreach($rows as $row)
               { ?>
       <option value="<?php echo $row["ma_bai_hat"]; ?>"> <?php echo $row["ma_bai_hat"]."-".$row["ten_bai_hat"];?>
      </option>
   <?php   } ?>
  
  </select>
</td>
</tr>
<tr>
      <td>Mã Ca Sỹ:</td>
      <td><select name="macasy" >
      <?php 
       $rows = $obj->select("select * from casy ");
       foreach($rows as $row)
               { ?>
       <option value="<?php echo $row["ma_ca_sy"]; ?>"> <?php echo $row["ma_ca_sy"]."-".$row["nghe_danh"];?>
      </option>
   <?php   } ?>
  
  </select>
</td>
</tr>
    `
    <tr>
      <td>Mã thể loại:</td>
      <td><select name="matheloai">
      <?php 
       $rows = $obj->select("select * from theloai ");
       foreach($rows as $row)
               { ?>
       <option value="<?php echo $row["ma_the_loai"]; ?>"> <?php echo $row["ma_the_loai"]."-".$row["ten_the_loai"];?>
      </option>
   <?php   } ?>
  </select>
</td>
</tr>

    <tr><td>Đường dẫn:</td><td><input type="text" name="duongdan"  ></td></tr>

    <td>Chất lượng:</td>
      <td><select name="chatluong" >
       <option value="128kbs">128kbs
      </option>
       <option value="256kbs">256kbs
      </option>
       <option value="320kbs">320kbs
      </option>
   
  </select>
</td>
</tr>
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

  if($_GET['thaotac']=="sua" &&isset($_GET['ma_chi_tiet_bh']))
  {
?>
    <form action="index.php?table=chitietbaihat&thaotac=suasql" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã Chi tiết bài hát:</td><td><input type="text" name="machitietbaihat" value="<?php echo $_GET['ma_chi_tiet_bh'] ?>" readonly="true" >
</td></tr>

 <?php
      $arr = array(":ma_chi_tiet_bh"=>$_GET['ma_chi_tiet_bh']);
       $rows = $obj->select1("select * from chitietbaihat where ma_chi_tiet_bh=:ma_chi_tiet_bh",$arr);
      ?>
    <tr>
      <td>Mã Bài Hát:</td>
      <td><select name="mabaihat" >
      <?php 
       $rowsbaihat = $obj->select("select * from baihat ");
       foreach($rowsbaihat as $row)
               { ?>
       <option value="<?php echo $row["ma_bai_hat"]; ?>"
<?php 
if($rows['ma_bai_hat']==$row["ma_bai_hat"])
  echo "selected='selected'";
  ?>
        > <?php echo $row["ma_bai_hat"]."-".$row["ten_bai_hat"];?>
      </option>
   <?php   } ?>
  </select>
</td>
</tr>
<tr>
      <td>Mã Ca Sỹ:</td>
      <td><select name="macasy" >
      <?php 
       $rowscasy = $obj->select("select * from casy ");
       foreach($rowscasy as $row)
               { ?>
       <option value="<?php echo $row["ma_ca_sy"]; ?>"
<?php 
if($rows['ma_ca_sy']==$row["ma_ca_sy"])
  echo "selected='selected'";
  ?>
        > <?php echo $row["ma_ca_sy"]."-".$row["nghe_danh"];?>
      </option>
   <?php   } ?>
  </select>
</td>
</tr>
    `
    <tr>
      <td>Mã thể loại:</td>
      <td><select name="matheloai">
      <?php 
       $rowstheloai = $obj->select("select * from theloai ");
       foreach($rowstheloai as $row)
               { ?>
       <option value="<?php echo $row["ma_the_loai"]; ?>" 
<?php 
if($rows['ma_the_loai']==$row["ma_the_loai"])
  echo "selected='selected'";
  ?>
        > <?php echo $row["ma_the_loai"]."-".$row["ten_the_loai"];?>
      </option>
   <?php   } ?>
  </select>
</td>
</tr>
    <tr><td>Đường dẫn:</td><td><input type="text" name="duongdan" value="<?php echo $rows["duong_dan"]; ?>"  ></td></tr>
    <td>Chất lượng:</td>
      <td><select name="chatluong" >
       <option value="128kbs"
        <?php 
if($rows['chat_luong']=="128kbs")
  echo "selected='selected'";
  ?>
       >128kbs
      </option>
       <option value="256kbs"
        <?php 
if($rows['chat_luong']=="256kbs")
  echo "selected='selected'";
  ?>
       >256kbs
      </option>
       <option value="320kbs"
        <?php 
if($rows['chat_luong']=="320kbs")
  echo "selected='selected'";
  ?>
       >320kbs
      </option>
   
  </select>
</td>
</tr>
    <tr><td>Hình:</td><td><input type="file" name="hinh" /></td></tr>
</table>
      </div><div style="margin-left: 350px;">
        <a class="btn btn-danger" href="index.php?table=chitietbaihat" role="button" >Hủy</a>
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
                   <th>Mã chi tiết bh</th>
                  <th>Mã bài hát</th>
                  <th>Mã ca sỹ</th>
                  <th>Mã thể loại</th>
                  <th>Đường dẫn</th>
                  <th>chất lượng </th>
                  <th>Lượt nghe</th>
                  <th>Hình ảnh</th>
                  <th>Ngày tạo</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>Mã chi tiết bh</th>
                  <th>Mã bài hát</th>
                  <th>Mã ca sỹ</th>
                  <th>Mã thể loại</th>
                  <th>Đường dẫn</th>
                  <th>chất lượng </th>
                  <th>Lượt nghe</th>
                  <th>Hình ảnh</th>
                  <th>Ngày tạo</th>
                  <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

  $rows = $obj->select("select * from chitietbaihat ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_chi_tiet_bh"];?></td>
      <td><?php echo $row["ma_bai_hat"];?></td>
      <td><?php echo $row["ma_ca_sy"];?></td>
      <td><?php echo $row["ma_the_loai"];?></td>
      <td><?php echo $row["duong_dan"];?>
        <audio controls>
  <source src="<?php echo $row["duong_dan"];?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
      </td>
      <td><?php echo $row["chat_luong"];?></td>
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
        <tr><td><a class="btn btn-danger" href="index.php?table=chitietbaihat&thaotac=xoa&ma_chi_tiet_bh=<?php echo $row["ma_chi_tiet_bh"];?>" role="button" style="margin-top: -15px;" >Xóa</a>
        </td></tr>
        <tr><td>
<a class="btn btn-primary" href="index.php?table=chitietbaihat&thaotac=sua&ma_chi_tiet_bh=<?php echo $row["ma_chi_tiet_bh"];?>" role="button" style="margin-top: -15px;" >Sửa</a>
         </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>

<!--//Kết thúc Hiện Table tự động load sql -->