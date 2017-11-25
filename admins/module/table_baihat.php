

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $baihat = new Baihat();

//Thêm SQL
  if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  {
    $ma_bai_hat = $_POST["mabaihat"];
    $ten_bai_hat =$_POST["tenbaihat"];
    $nhac_sy =$_POST["nhacsy"];
    $loi_bai_hat =$_POST["loibaihat"];
    $ma_quoc_gia =$_POST["maquocgia"];


   $arr = array(":ma_bai_hat"=>$ma_bai_hat,":ten_bai_hat"=>$ten_bai_hat,":nhac_sy"=>$nhac_sy,":loi_bai_hat"=>$loi_bai_hat,":ma_quoc_gia"=>$ma_quoc_gia);
  $baihat->them($arr);
  }
 }
//Kết thúc thêm SQL
?>
<?php  
//Xóa SQL
if(isset($_GET["thaotac"]) && isset($_GET["ma_bai_hat"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_bai_hat = $_GET["ma_bai_hat"];
   $arr = array(":ma_bai_hat"=>$ma_bai_hat);
  $baihat->xoa($arr);}
}

//Kết thúc Xóa SQL


//Sửa SQL
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="suasql")
  {
    $ma_bai_hat= $_POST["mabaihat"];
    $ten_bai_hat =$_POST["tenbaihat"];
     $nhac_sy =$_POST["nhacsy"];
      $loi_bai_hat =$_POST["loibaihat"];
       $ma_quoc_gia =$_POST["maquocgia"];
    $arr = array(":ma_bai_hat"=>$ma_bai_hat,":ten_bai_hat"=>$ten_bai_hat,":nhac_sy"=>$nhac_sy,":loi_bai_hat"=>$loi_bai_hat,":ma_quoc_gia"=>$ma_quoc_gia);
  $baihat->sua($arr);
}
  }
 
//Kết thúc sửa SQL

//Sửa Form 
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['ma_bai_hat']))
  {
?>
<?php 
      $arr = array(":ma_bai_hat"=>$_GET['ma_bai_hat']);
       $rows = $obj->select1("select * from baihat where ma_bai_hat=:ma_bai_hat",$arr);
?>
      <form action="index.php?table=baihat&thaotac=suasql" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã Bài Hát:</td><td><input type="text" name="mabaihat" value="<?php echo $_GET['ma_bai_hat'] ?>" readonly="true"></td></tr>
    <tr><td>Tên Bài Hát:</td><td><input type="text" name="tenbaihat" value="<?php echo $rows['ten_bai_hat'] ?>" ></td></tr>
     <tr><td>Nhạc sỹ:</td><td><input type="text" name="nhacsy" value="<?php echo $rows['nhac_sy'] ?>" ></td></tr>
    <?php $rowsquocgia = $obj->select("select * from quocgia ");
      ?>
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

     <tr><td>Lời bài hát</td><td><textarea rows="5" cols="30" name="loibaihat" > <?php echo $rows['loi_bai_hat'] ?></textarea></td></tr>
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
<div class="card-body">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Thêm Bài Hát
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Điền Thông Tin</h4>
      </div>
      <form action="index.php?table=baihat&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã Bài Hát:</td><td><input type="text" name="mabaihat"  ></td></tr>
    <tr><td>Tên Bài Hát:</td><td><input type="text" name="tenbaihat"  ></td></tr>
        <tr><td>Nhạc sỹ:</td><td><input type="text" name="nhacsy"  ></td></tr>
    <tr>
      <td>Mã Quốc gia:</td>
      <td><select name="maquocgia" id="nmTinh">
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
     <tr><td>Lời Bài Hát:</td><td><textarea rows="5" cols="30" name="loibaihat"></textarea></td></tr>


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
                   <th>Mã Bài Hát</th>
                  <th>Tên Bài Hát</th>
                  <th>Nhạc Sỹ</th>
                  <th>Quốc Gia</th>
                  <th>Lời bài hát</th>
                   <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
              <th>Mã Bài Hát</th>
                  <th>Tên Bài Hát</th>
                  <th>Nhạc Sỹ</th>
                  <th>Quốc Gia</th>
                  <th>Lời bài hát</th>
                   <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

 

  $rows = $obj->select("select * from baihat ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_bai_hat"];?></td>
      <td><?php echo $row["ten_bai_hat"];?></td>
            <td><?php echo $row["nhac_sy"];?></td>
                  <td><?php echo $row["ma_quoc_gia"];?></td>
                         <td>
                          <textarea rows="6" cols="35" name="loibaihat" readonly="true"> <?php echo $row["loi_bai_hat"];?></textarea> 
                          </td>

      <td>
          <table>
        <tr><td>
          <a class="btn btn-danger" href="index.php?table=baihat&thaotac=xoa&ma_bai_hat=<?php echo $row["ma_bai_hat"];?>" role="button" style="margin-top: -15px;" >Xóa</a>
        </td>
       <td>
          <a class="btn btn-primary" href="index.php?table=baihat&thaotac=sua&ma_bai_hat=<?php echo $row["ma_bai_hat"];?>" role="button" style="margin-top: -15px;">Sửa</a>

        </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>
<!--Kết thúc Tự động load SQL vào Table -->
