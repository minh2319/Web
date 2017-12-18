<?php 
$obj = new Db();//tu dong load file classes/Db.class.php
  $thanhvien = new Thanhvien();
  if(isset($_GET['uname']))
   { 
    $username=$_GET['uname'];
  $arr = array(":username"=>$username);
  $rows=$thanhvien->showtv($arr);
  
  }
if(isset($_GET['uname']) && isset($_GET['token'])&& $_GET['token']==$rows[0]["code"])
{
  if(isset($_POST['doimk']))
    {
      $mkm1=$_POST['mkm1'];
      $mkm2=$_POST['mkm2'];
      if($mkm1!=$mkm2)
      {
          echo "<SCRIPT type='text/javascript'>
                                        alert('Mật khẩu không khớp, hãy nhập lại');                                     
                                    </SCRIPT>";
                                    ?>
      <div class="row col-12">  
        <div class="col-8 offset-4 vertical-menu">
           <h2 style="color: black"> Đổi Mật Khẩu</h2>
          <form action="quenmk.php?uname=<?php echo $_GET['uname']; ?>&token=<?php echo $_GET['token']; ?>" method="post" enctype="multipart/form-data">
        <table>
          <tr ><td>Mật khẩu mới<input type="password" name="mkm1" style="height: 35px;"></td></tr> 
          <tr><td>Xác nhận mật khẩu mới:<input type="password" name="mkm2"  style="height: 35px;"></td></tr>
        </table>
          <input class="btn-outline-info" type="submit" value="Cập Nhật" name="doimk">
           </form>
       </div>    
     </div>
     <?php
      }
      else
      {
          $s="ABCDEFGHIJKMLNOPRESTUVXYZabcdefghijkmlnopqrstuvxyz0123456789";
         $check= substr(str_shuffle ($s), 0, 50);
         $arr = array(":mat_khau"=>$mkm1,":username"=>$username,":code"=>$check);
        $thanhvien->doimkcode($arr);
       echo "<SCRIPT type='text/javascript'>
                                        alert('Đổi thành công');
                                        window.location.replace(\"http://localhost/webnhac\");
                                    </SCRIPT>";
       }
  }
  else
   { ?>
      <div class="row col-12">  
        <div class="col-8 offset-4 vertical-menu">
           <h2 style="color: black"> Đổi Mật Khẩu</h2>
          <form action="quenmk.php?uname=<?php echo $_GET['uname']; ?>&token=<?php echo $_GET['token']; ?>" method="post" enctype="multipart/form-data">
        <table>
          <tr ><td>Mật khẩu mới<input type="password" name="mkm1" style="height: 35px;"></td></tr> 
          <tr><td>Xác nhận mật khẩu mới:<input type="password" name="mkm2"  style="height: 35px;"></td></tr>
        </table>
          <input class="btn-outline-info" type="submit" value="Cập Nhật" name="doimk">
           </form>
       </div>    
     </div>
     <?php
   }
}
else 
{ ?>
      <div class="row col-12">  
        <div class="col-8 offset-3 vertical-menu">
           <h2 style="color: black">Link đổi mật khẩu đã hết hạn hoặc sai </h2>
       </div>    
    </div>
    <?php
  }
 ?>
