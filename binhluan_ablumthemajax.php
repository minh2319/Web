
<?php 
session_start();
include "admins/config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");

  $binhluan = new Binhluan();
  $maab="";
  $mabl="";
if(isset($_GET['maab']) && isset($_GET['id']) && !isset($_GET['bl_cha']))
{
  //echo $_POST['noidung'].$_POST['username'].$_POST['maab'];
  $maab=$_GET['maab'];
  $id=$_GET['id'];
    $noidung=$_POST['noidung'];
$arr = array(":noi_dung"=>$noidung,":ma_ablum"=>$maab,":thanh_vien_id"=>$id);
  $binhluan->them_bl_ab($arr);
}

if(isset($_GET['maab']) && isset($_GET['id'])&& isset($_GET['bl_cha']) )
{
  $maab=$_GET['maab'];
  $id=$_GET['id'];
  $bl_cha=$_GET['bl_cha']; 
   $noidung=$_POST['noidung'];
 $arr = array(":noi_dung"=>$noidung,":ma_ablum"=>$maab,":thanh_vien_id"=>$id,":binh_luan_cha"=>$bl_cha);
  $binhluan->them_tl_ab($arr);
}

if(isset($_GET['thaotac']) && isset($_GET['mabl']))
{
  $mabl=$_GET['mabl']; 
 $arr = array(":mabl"=>$mabl);
  $binhluan->xoa($arr);
}

