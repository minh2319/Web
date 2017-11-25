

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $chitietablum = new Chitietablum();

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
  {$ma_chi_tiet_ablum = $_POST["machitietablum"];
    $ma_chi_tiet_bh =$_POST["machitietbaihat"];
    $ma_ablum=$_POST["maablum"];
   $arr = array(":ma_chi_tiet_ablum"=>$ma_chi_tiet_ablum,":ma_chi_tiet_bh"=>$ma_chi_tiet_bh,":ma_ablum"=>$ma_ablum);
  $chitietablum->sua($arr);
}
  }
 
//Kết thúc sửa SQL

//Sửa Form 
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['ma_chi_tiet_ablum']))
  {
?>
<?php 
      $arr = array(":ma_chi_tiet_ablum"=>$_GET['ma_chi_tiet_ablum']);
       $rows = $obj->select1("select * from chitietablum where ma_chi_tiet_ablum=:ma_chi_tiet_ablum",$arr);
?>
      <form action="index.php?table=chitietablum&thaotac=suasql" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã chi tiết ablum:</td><td><input type="text" name="machitietablum"  value="<?php echo $_GET['ma_chi_tiet_ablum'] ?>" readonly="true"></td></tr>

  <tr>
      <td>Mã chi tiết bài hát:</td>
      <td><select name="machitietbaihat">
      <?php 
       $rowschitietbaihat = $obj->select("select * from chitietbaihat ");
       foreach($rowschitietbaihat as $row)
               { ?>
       <option value="<?php echo $row["ma_chi_tiet_bh"]; ?>"
        <?php 
if($rows['ma_chi_tiet_bh']==$row["ma_chi_tiet_bh"])
  echo "selected='selected'";
  ?>>
    <?php 
    $arr = array(":ma_chi_tiet_bh"=>$row["ma_chi_tiet_bh"]);
     $ten = $obj->select1("select ma_bai_hat from chitietbaihat where ma_chi_tiet_bh=:ma_chi_tiet_bh" ,$arr);
     $arra = array(':ma_bai_hat'=>$ten["ma_bai_hat"]);
         $tenbh = $obj->select1("select ten_bai_hat
from baihat where ma_bai_hat=:ma_bai_hat" ,$arra);
    echo $row["ma_chi_tiet_bh"]."-".$tenbh['ten_bai_hat'];

    ?>
      </option>
   <?php   } ?>
  
  </select>
</td>
</tr>
     <tr>
      <td>Mã ablum :</td>
      <td><select name="maablum" >
      <?php 
       $rowsablum = $obj->select("select * from ablum ");
       foreach($rowsablum as $row)
               { ?>
       <option value="<?php echo $row["ma_ablum"]; ?>"

       <?php 
if($rows['ma_ablum']==$row["ma_ablum"])
  echo "selected='selected'";
  ?>
        > <?php echo $row["ma_ablum"]."-".$row["ten_ablum"];?>
      </option>
   <?php   } ?>
  
  </select>
</td>
</tr>

</table>
      </div><div style="margin-left: 350px;">
        <a class="btn btn-danger" href="index.php?table=chitietablum" role="button" >Hủy</a>
       <input class="btn btn-success" type="submit" value="Cập Nhật" name="submit">
     </div>
       </form>
       <?php
  }
}
//Kết thúc sửa Form
  ?>  
<!--Button Thêm và popup thêm -->
<div class="card-body">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Thêm Chi tiết ablum
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Điền Thông Tin</h4>
      </div>
      <form action="index.php?table=chitietablum&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã chi tiết ablum:</td><td><input type="text" name="machitietablum"  ></td></tr>

  <tr>
      <td>Mã chi tiết bài hát:</td>
      <td><select name="machitietbaihat">
      <?php 
       $rows = $obj->select("select * from chitietbaihat ");
       foreach($rows as $row)
               { ?>
       <option value="<?php echo $row["ma_chi_tiet_bh"]; ?>">
    <?php 
    $arr = array(":ma_chi_tiet_bh"=>$row["ma_chi_tiet_bh"]);
     $ten = $obj->select1("select ma_bai_hat from chitietbaihat where ma_chi_tiet_bh=:ma_chi_tiet_bh" ,$arr);

     $arra = array(':ma_bai_hat'=>$ten["ma_bai_hat"]);
     
//      $tenbh = $obj->select1("select ten_bai_hat
// from chitietbaihat inner join baihat on chitietbaihat.ma_bai_hat = baihat.ma_bai_hat
// where baihat.ma_bai_hat=:ma_bai_hat" ,$arra);

          $tenbh = $obj->select1("select ten_bai_hat
from baihat where ma_bai_hat=:ma_bai_hat" ,$arra);

    echo $row["ma_chi_tiet_bh"]."-".$tenbh['ten_bai_hat'];

    ?>
      </option>
   <?php   } ?>
  
  </select>
</td>
</tr>
     <tr>
      <td>Mã ablum :</td>
      <td><select name="maablum" >
      <?php 
       $rows = $obj->select("select * from ablum ");
       foreach($rows as $row)
               { ?>
       <option value="<?php echo $row["ma_ablum"]; ?>"> <?php echo $row["ma_ablum"]."-".$row["ten_ablum"];?>
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
<!--Kết Thúc Button Thêm và popup thêm -->

<!--Tự động load SQL vào Table -->
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th>Mã chi tiết ablum</th>
                  <th>Mã chi tiết bài hát</th>
                  <th>Mã ablum</th>
                   <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Mã chi tiết ablum</th>
                  <th>Mã chi tiết bài hát</th>
                  <th>Mã ablum</th>
                   <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  
  $rows = $obj->select("select * from chitietablum ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_chi_tiet_ablum"];?></td>
      <td><?php echo $row["ma_chi_tiet_bh"];?></td>
            <td><?php echo $row["ma_ablum"];?></td>
      <td>
          <table>
        <tr><td>
          <a class="btn btn-danger" href="index.php?table=chitietablum&thaotac=xoa&ma_chi_tiet_ablum=<?php echo $row["ma_chi_tiet_ablum"];?>" role="button" style="margin-top: -15px;" >Xóa</a>
        </td>
       <td>
          <a class="btn btn-primary" href="index.php?table=chitietablum&thaotac=sua&ma_chi_tiet_ablum=<?php echo $row["ma_chi_tiet_ablum"];?>" role="button" style="margin-top: -15px;">Sửa</a>

        </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>
<!--Kết thúc Tự động load SQL vào Table -->
