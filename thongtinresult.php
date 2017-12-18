
<?php 
session_start();
include "admins/config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$obj = new Db();
 $thanhvien = new Thanhvien();
   $username=$_SESSION['username'];
   $arr = array(":username"=>$username);
  $rows=$thanhvien->showtv($arr);
if(isset($_GET['stt']))
{
	$stt=$_GET['stt'];
	if($stt==1)
	{?>
		<h2 style="color: black"> Thông tin cá nhân</h2>
			<div class="row col-9" style="margin-left: -50px;" >
             <table  align="center">
    <tr><td style="width: 200px"></td><td><img src="admins\<?php echo $rows[0]['hinh_anh']; ?>" style="width: 130px;height: 130px"></td></tr>  
              <tr><td><h5> Tên tài khoản: </h5></td><td><h5><?php echo $username; ?>  </h5> </td></tr>
              <tr><td><h5>Họ Và Tên</h5></td><td> <h5><?php echo $rows[0]["ho_ten"]; ?></h5></td></tr>
              <tr><td> <h5> Giới Tính:</h5></td><td><h5>  <?php 
              if($rows[0]["gioi_tinh"]==1)
               {
                  echo "Nam";
               }
                else
                  echo "Nữ";
                ?> </h5></td></tr>
                <tr><td><h5>Năm Sinh:</h5></td><td> <h5> <?php echo $rows[0]["nam_sinh"]; ?></h5></td></tr>
                <tr><td><h5>Email:</h5></td><td> <h5><?php echo $rows[0]["email"]; ?></h5></td></tr>
                 <tr><td><h5>Số Điện Thoại:</h5></td><td><h5><?php echo " +84".$rows[0]["so_dien_thoai"]; ?></h5></td></tr>
            </table>
        </div>
        <?php
	}
	else if($stt==2)
	{
		?>

		<h2 style="color: black"> Thông tin cá nhân</h2>
		 <form action="taikhoan.php?username=<?php echo $rows[0]['username']; ?>" method="post" enctype="multipart/form-data">
	<table>
        <tr><td>Hình&nbsp;ảnh:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><img id="hinhhienthi" style="width: 130px;height: 130px;" src="admins/<?php echo $rows[0]["hinh_anh"];?>"></td><td>
          <input type="file" onchange="loadFile(event)" accept="image/*" name="hinh" id="picture" /></td></tr>
    <tr height="40px;"><td width="100px">Họ Và Tên: </td><td><input type="text" name="hoten" value="<?php echo $rows[0]['ho_ten']; ?>"></td></tr> 
    <tr height="40px;"><td>Ngày Sinh:</td><td><input type="date" name="ngaysinh" value="<?php echo $rows[0]['nam_sinh']; ?>">
    <tr height="40px;"><td>Sổ Điện Thoại:</td><td><input type="text" name="sodienthoai"  value="<?php echo $rows[0]['so_dien_thoai']; ?>"></td></tr>
    <tr height="40px;"><td>Email:</td><td><input type="text" name="email" value="<?php echo $rows[0]['email']; ?>"  ></td></tr>
    
       

    <tr><td>Giới tính:</td><td><input type="radio" name="gioitinh" <?php 
  if($rows[0]['gioi_tinh']==1)
  {
    ?>
checked="checked";
    <?php
  }
?> value="1">Nam 
    <input type="radio" name="gioitinh" <?php 
  if($rows[0]['gioi_tinh']==0)
  {
    ?>
  checked="checked";
    <?php
  }
?> value="0" >Nữ</td></tr>
 </td></tr>
</table>
<input class="btn-outline-info" type="submit" value="Cập Nhật" name="submit">
 </form>
<?php
	}
	else if($stt==3)
	{ 
		?>    <h2 style="color: black"> Đổi mật khẩu</h2>

 <form action="thongtinresult.php" method="post" enctype="multipart/form-data">
	<table>
    <tr><td>Mật khẩu cũ:</td><td><input type="password" name="mkc" ></td></tr> 
    <tr><td>Mật khẩu mới:</td><td><input type="password" name="mkm1"></td></tr>
    <tr><td>Mật khẩu mới:</td><td><input type="password" name="mkm2"></td></tr>
</table>
<input class="btn-outline-info" type="submit" value="Cập Nhật" name="doimk">
       </form>
<?php
	}
    else if($stt==4)
  { 
    ?>    <h2 style="color: black"> Playlist cá nhân</h2>
<div class="card-body">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
 Thêm Playlist
</button>
<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Playlist</h4>
      </div>
      <form action="index.php?table=casy&thaotac=them" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">
    <tr><td>Tên Playlist:</td><td><input type="text" name="tenplaylist"></td></tr>
    <tr><td>Mô tả Playlist:</td><td><input type="text" name="mota"  ></td></tr>
    <tr><td>Thể loại:</td><td><input type="text" name="theloai"  ></td></tr>
   


</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <input type="submit" value="Thêm" name="submit">
       </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
 

<?php
  }
}
if(isset($_POST['doimk']))
    {
      $mk=$rows[0]["mat_khau"];
      $mkc=$_POST['mkc'];
      $mkm1=$_POST['mkm1'];
      $mkm2=$_POST['mkm2'];
      if($mkc!=$mk)
     {  echo "<SCRIPT type='text/javascript'> 
       alert('Sai Mật khẩu.Đổi mật khẩu tHất bại');
  window.location.replace(\"taikhoan.php\");
     </SCRIPT>";
   }
   else{
      if($mkm1!=$mkm2)
      {
        echo "<SCRIPT type='text/javascript'> 
       alert('Mật khẩu không khớp nhau. Vui lòng thử lại');
  window.location.replace(\"taikhoan.php\");
     </SCRIPT>";
      }
      else{
         $arr = array(":mat_khau"=>$mkm2,":username"=>$username);
  $thanhvien->doimk($arr);
        echo "<SCRIPT type='text/javascript'> 
       alert('Đổi thành công');
  window.location.replace(\"taikhoan.php\");
     </SCRIPT>";
      }
   }
    }
?>
  <script language="javascript">
           var loadFile = function(event) {
    var output = document.getElementById('hinhhienthi');
    output.src = URL.createObjectURL(event.target.files[0]);
  };</script>