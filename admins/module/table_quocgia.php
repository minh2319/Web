

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
<div class="card-body">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Thêm Quốc Gia
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Điền Thông Tin</h4>
      </div>
      <form action="index.php?table=quocgia&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Mã quốc gia:</td><td><input type="text" name="maquocgia"  ></td></tr>
    <tr><td>Tên quốc gia:</td><td><input type="text" name="tenquocgia"  ></td></tr>
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
                   <th>Mã quốc gia</th>
                  <th>Tên quốc gia</th>
                   <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Mã quốc gia</th>
                  <th>Tên quốc gia</th>
                   <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              <?php  

 

  $rows = $obj->select("select * from quocgia ");
                foreach($rows as $row)
               { ?>
        <tr><td><?php echo $row["ma_quoc_gia"];?></td>
      <td><?php echo $row["ten_quoc_gia"];?></td>
      <td>
          <table>
        <tr><td>
          <a class="btn btn-danger" href="index.php?table=quocgia&thaotac=xoa&ma_quoc_gia=<?php echo $row["ma_quoc_gia"];?>" role="button" style="margin-top: -15px;" >Xóa</a>
        </td>
       <td>
          <a class="btn btn-primary" href="index.php?table=quocgia&thaotac=sua&ma_quoc_gia=<?php echo $row["ma_quoc_gia"];?>" role="button" style="margin-top: -15px;">Sửa</a>

        </td></tr>
      </table>
      </td>
        </tr> 
 <?php } ?>
            </tbody>
          </table>
        </div>
<!--Kết thúc Tự động load SQL vào Table -->
