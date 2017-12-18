<?php include "admins/config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");

$obj = new Db();//tu dong load file classes/Db.class.php
  $thanhvien = new Thanhvien();
  if(isset($_POST['ktemail']))
  {
    $k=0;
     $email=$_POST['email'];
       $rows =$thanhvien->showallemail();
        if($email=="")
        {
            echo "<SCRIPT type='text/javascript'>  alert('Bạn chưa nhập Email, xin vui lòng kiểm tra lại'); window.location.replace(\"quenmatkhau.php\");
             </SCRIPT>";
        }
       foreach ($rows as $row )
       {
          if($email==$row["email"])
           {  
            $k=1;
            function getKeyRandom($n = 5) //Độ dài password
            {
                 $s="ABCDEFGHIJKMLNOPRESTUVXYZabcdefghijkmlnopqrstuvxyz0123456789";
                 return substr(str_shuffle ($s), 0, $n);
             }
            $username=$row['username'];
            $check=getKeyRandom(50);
            $arrayName = array(':username' => $username,':code' => $check );
           $thanhvien->codemk($arrayName);
            include ("admins/module/sendmail.php");
            echo "<SCRIPT type='text/javascript'>  alert('Link đổi mật khẩu đã được gửi về email của bạn xin vui lòng kiểm tra'); window.location.replace(\"index.php\");
             </SCRIPT>";
            }
        }
        if($k==0)
        {
             echo "<SCRIPT type='text/javascript'>  alert('Email đăng ký không tồn tại, xin vui lòng kiểm tra lại'); window.location.replace(\"quenmatkhau.php\");
             </SCRIPT>";
        }    
  }
 ?>