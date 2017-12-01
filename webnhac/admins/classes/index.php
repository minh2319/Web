<?php
//Load cac file can thiet cho ung dung
include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database!</title>
<style>
.book{width:250px; height:300px; margin:3px; background:#FCC; float:left}
div.book img{height:200px; margin:0 10px}
</style>
</head>

<body>
	<div id="container">
<form action="index.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>ma_ablum:</td><td><input type="text" name="ma_ablum" /></td></tr>
<tr><td>ma_the_loai:</td><td><input type="text" name="ma_the_loai" /></td></tr>
<tr><td>ten_ablum:</td><td><input type="text" name="ten_ablum" /></td></tr>
<tr><td>luot_nghe:</td><td><input type="text" name="price" /></td></tr>
<tr><td>hinh_anh:</td><td><input type="file" name="hinh_anh" /></td></tr>
<tr><td colspan="2"> <input type="submit" name="sm" value="Insert" /></td></tr>
</table>
</form>
<?php

	$obj = new Db();//tu dong load file classes/Db.class.php
	
	?>
	<table border="1"><tr><td>ma_ablum</td><td>ma_the_loai</td><td>description</td><td>price</td><td>ten_ablum</td><td>luot_nghe</td><td>hinh_anh</td><td>Thao tác</td></tr>
		<?php
	
		$ablum = new ablum();
	if (isset($_POST["sm"]))
	{
		$arr = array(":ma_ablum"=>$_POST["ma_ablum"], ":ma_the_loai"=>$_POST["ma_the_loai"],":ten_ablum"=>$_POST["ten_ablum"],":luot_nghe"=>$_POST["price"],":img"=>$_FILES["img"]["luot_nghe"],":hinh_anh"=>$_POST["hinh_anh"]);
		$ablum->them($arr);
		$_POST["sm"]=null;

	}	
	if(isset($_GET["ma_ablum"]))
	{
		$ma_ablum = $_GET["ma_ablum"];
		$arr = array(":ma_ablum"=>$ma_ablum);
		$ablum->xoa($arr);

	}
	$rows = $obj->select("select * from ablum ");
	foreach($rows as $row)
	{
		?>
        <tr><td><?php echo $row["ma_ablum"];?></td>
    	<td><?php echo $row["ma_the_loai"];?></td>
    	<td><?php echo $row["ten_ablum"];?></td>
    	<td><?php echo $row["luot_nghe"];?></td>
    	<td><?php echo $row["hinh_anh"];?></td>

    	<td><a href='index.php?book_id=<?php echo $row["ma_ablum"];?>'>Xóa</a></td>
        </tr>
        </div>
        <?php		
	}
?>
</table>
</body>
</html>