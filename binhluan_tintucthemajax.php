
<?php 
session_start();
include "admins/config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");

  $binhluan = new Binhluan();
  $matt="";
  $mabl="";
if(isset($_GET['matintuc']) && isset($_GET['id']) && !isset($_GET['bl_cha']))
{
  //echo $_POST['noidung'].$_POST['username'].$_POST['mabh'];
  $matt=$_GET['matintuc'];
  $id=$_GET['id'];
    $noidung=$_POST['noidung'];
$arr = array(":noi_dung"=>$noidung,":ma_tin_tuc"=>$matt,":thanh_vien_id"=>$id);
  $binhluan->them_bl_tt($arr);
}

if(isset($_GET['matintuc']) && isset($_GET['id'])&& isset($_GET['bl_cha']) )
{
  $matt=$_GET['matintuc'];
  $id=$_GET['id'];
  $bl_cha=$_GET['bl_cha']; 
   $noidung=$_POST['noidung'];
 $arr = array(":noi_dung"=>$noidung,":ma_tin_tuc"=>$matt,":thanh_vien_id"=>$id,":binh_luan_cha"=>$bl_cha);
  $binhluan->them_tl_tt($arr);
}

if(isset($_GET['thaotac']) && isset($_GET['mabl']))
{
  $mabl=$_GET['mabl']; 
 $arr = array(":mabl"=>$mabl);
  $binhluan->xoa($arr);
}

