
<?php 
session_start();
include "../admins/config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$chitietplaylist=new Chitietplaylist();

$mapl="";
$mabh="";
if(isset($_GET['mapl']))
{
  $mapl=$_GET['mapl'];
}
if(isset($_GET['mabh']))
{
  $mabh=$_GET['mabh'];
}
 $arr = array(':ma_chi_tiet_bh'=>$mabh);
$chitietplaylist->them($mapl,$arr);
if(isset($_GET['thaotac']) && isset($_GET['mactpl']))
{
	if($_GET['thaotac']=='xoa')
	{
		$arr = array(':ma_chi_tiet_playlist'=>$_GET['mactpl']);
		$chitietplaylist->xoa($arr);
	}
}