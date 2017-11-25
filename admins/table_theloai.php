

 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $theloai = new Theloai();

//Thêm SQL
  if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  {
    $ma_the_loai = $_POST["matheloai"];
    $ten_the_loai =$_POST["tentheloai"];

   $arr = array(":ma_the_loai"=>$ma_the_loai,":ten_the_loai"=>$ten_the_loai);
  $theloai->them($arr);
  }
 }
//Kết thúc thêm SQL
?>
<?php  
//Xóa SQL
if(isset($_GET["thaotac"]) && isset($_GET["ma_the_loai"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {$ma_the_loai = $_GET["ma_the_loai"];
   $arr = array(":ma_the_loai"=>$ma_the_loai);
  $theloai->xoa($arr);}
}

//Kết thúc Xóa SQL


//Sửa Form 
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['ma_the_loai']))
  {
?>
<?php 
      $arr = array(":ma_the_loai"=>$_GET['ma_the_loai']);
       $rows = $obj->select1("select * from theloai where ma_the_loai=:ma_the_loai",$arr);
?>
      <form action="index.php?table=theloai&thaotac=suasql" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã thể loại:</td><td><input type="text" name="matheloai" value="<?php echo $_GET['ma_the_loai'] ?>" readonly="true"></td></tr>
    <tr><td>Tên thể loại:</td><td><input type="text" name="tentheloai" value="<?php echo $rows['ten_the_loai'] ?>" ></td></tr>
</table>

      </div><div style="margin-left: 350px;">
  
        <button type="button" class="btn btn-danger" href="index.php?table=theloai" role="button" >Hủy</button>
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
  Thêm Thể Loại
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Điền Thông Tin</h4>
      </div>
      <form action="index.php?table=theloai&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã thể loại:</td><td><input type="text" name="matheloai"  ></td></tr>
    <tr><td>Tên thể loại:</td><td><input type="text" name="tentheloai"  ></td></tr>
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
                   <th>Mã thể loại</th>
                  <th>Tên thể loại</th>
                   <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Mã thể loại</th>
                  <th>Tên thể loại</th>
                   <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

 

  $rows = $obj->select("select * from theloai ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_the_loai"];?></td>
      <td><?php echo $row["ten_the_loai"];?></td>
      <td>
          <table>
        <tr><td>
          <a class="btn btn-danger" href="index.php?table=theloai&thaotac=xoa&ma_the_loai=<?php echo $row["ma_the_loai"];?>" role="button" style="margin-top: -15px;" >Xóa</a>
        </td>
       <td>
          <a class="btn btn-primary" href="index.php?table=theloai&thaotac=sua&ma_the_loai=<?php echo $row["ma_the_loai"];?>" role="button" style="margin-top: -15px;">Sửa</a>

        </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>
<!--Kết thúc Tự động load SQL vào Table -->
