
<?php 
session_start();
include "admins/config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");

  $binhluan = new Binhluan();
if(isset($_GET['mabh']) && isset($_GET['id']) && !isset($_GET['bl_cha']))
{
  //echo $_POST['noidung'].$_POST['username'].$_POST['mabh'];
  $mabh=$_GET['mabh'];
  $id=$_GET['id'];
    $noidung=$_POST['noidung'];
$arr = array(":noi_dung"=>$noidung,":ma_chi_tiet_bh"=>$mabh,":thanh_vien_id"=>$id);
  $binhluan->them_bl_bh($arr);
}

if(isset($_GET['mabh']) && isset($_GET['id'])&& isset($_GET['bl_cha']) )
{
  $mabh=$_GET['mabh'];
  $id=$_GET['id'];
  $bl_cha=$_GET['bl_cha']; 
   $noidung=$_POST['noidung'];
 $arr = array(":noi_dung"=>$noidung,":ma_chi_tiet_bh"=>$mabh,":thanh_vien_id"=>$id,":binh_luan_cha"=>$bl_cha);
  $binhluan->them_tl_bh($arr);
}

