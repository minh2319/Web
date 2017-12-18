

<?php 
$obj = new Db();//tu dong load file classes/Db.class.php
  $thanhvien = new Thanhvien();
   $username=$_SESSION['username'];
  

if(isset($_POST['submit']))
{
  //khởi tạo
  $hoten="";
  $sdt=0;
  $email="";
  $gioitinh=0;
    $link="";
  //

  //lấy giá trị
   
      $hoten=$_POST['hoten'];
    
   
      $sdt=$_POST['sodienthoai'];
    
   
        $namsinh=$_POST['ngaysinh'];

    
     $email=$_POST['email'];

   
        $gioitinh=$_POST['gioitinh'];

  

   if($_FILES["hinh"]['name']!="")
     { 
        $h= $_FILES["hinh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"admins/image/trangchu/avatar/". $username.".jpg");
        $link="image/trangchu/avatar/". $username.".jpg";
        
   $arr = array(":ho_ten"=>$hoten,":nam_sinh"=>$namsinh,":email"=>$email,":gioi_tinh"=>$gioitinh,":hinh_anh"=>$link,":so_dien_thoai"=>$sdt,":username"=>$username);
 
  $thanhvien->suathongtin_co_hinh($arr);
    }
    else if($namsinh==""){
  $arr = array(":ho_ten"=>$hoten,":email"=>$email,":gioi_tinh"=>$gioitinh,":so_dien_thoai"=>$sdt,":username"=>$username);
      $thanhvien->suathongtin_khong_ngay($arr);
    }
    else{
  $arr = array(":ho_ten"=>$hoten,":nam_sinh"=>$namsinh,":email"=>$email,":gioi_tinh"=>$gioitinh,":so_dien_thoai"=>$sdt,":username"=>$username);
     
      $thanhvien->suathongtin_khong_hinh($arr);
    }
}
 $arr = array(":username"=>$username);
  $rows=$thanhvien->showtv($arr);
?>
<div class="row col-12"   >  
    <div class="col-3 vertical-menu" style="margin-top: -10px;">
        <a href="#" onclick="load_ajax(1,<?php $username ?>);" >Thông Tin cá nhân</a>        
        <a href="#" onclick="load_ajax(2,<?php $username ?>);">Thay đổi thông tin </a>
        <a href="#"onclick="load_ajax(3,<?php $username ?>);">Đổi mật khẩu</a>
        <a href="#"onclick="load_ajax(4,<?php $username ?>);">Quản lý playlist</a>
     </div>
      <div class="col-6 offset-1" id='result'>
        <h2 style="color: black"> Thông tin cá nhân</h2>
          <div class="row col-9" style="
          margin-left: -50px;" >
             <table  align="center">
               <tr><td></td><td><img src="admins\<?php echo $rows[0]['hinh_anh']; ?>" style="width: 140px;height: 140px"></td></tr>  
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
                <tr><td><h5>Năm Sinh:</h5></td><td> <h5><?php echo $rows[0]["nam_sinh"]; ?></h5></td></tr>
                <tr><td><h5>Email:</h5></td><td> <h5><?php echo $rows[0]["email"]; ?></h5></td></tr>
                 <tr><td><h5>Số Điện Thoại:</h5></td><td><h5><?php echo " +84".$rows[0]["so_dien_thoai"]; ?></h5></td></tr>
            </table>
        </div>
   </div>    
</div>
 
 <script language="javascript">
            function load_ajax(stt,username){
                $.ajax({
                    url : "thongtinresult.php?stt="+ stt+"&username="+username ,
                    type : "get",
                    dataType:"text",
                    success : function (result){
                        $('#result').html(result);
                    }
                });
            }
 </script>

<style type="text/css">.vertical-menu {
    width: 200px; /* Set a width if you like */
}

.vertical-menu a {
    background-color: #6DBDD6; /* Grey background color */
    color: black; /* Black text color */
    display: block; /* Make the links appear below each other */
    padding: 30px; /* Add some padding */
    text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
    background-color: #DF3D82
; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
    background-color: #4CAF50; /* Add a green color to the "active/current" link */
    color: white;
}</style>