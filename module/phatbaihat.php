
 <div class="col-md-8" >
 <?php //tu dong load file classes/Db.class.php
  $tonghop = new Tonghop();
  $chitietbaihat=new Chitietbaihat();
if(isset($_GET['mabh']))
  {

  	$mabh=$_GET['mabh'];
      $arr = array(":ma_chi_tiet_bh"=>$mabh);
    $rows=$tonghop->thongtinbh($arr);
;

  ?>

 <?php   foreach($rows as $row)
 {

 	$i=$row['luot_nghe'];
 	$i++;
 	$arr = array(":ma_chi_tiet_bh"=>$mabh,":luot_nghe"=>$i);
 	$chitietbaihat->luot_nghe($arr);
 	?>
 	<div class="row col-md-7 offset-1 " style="position: relative;
        font-size: 20px;
        margin-top: 0;
        font-family: 'Lobster', helvetica, arial;">
 	<?php echo $row["ten_bai_hat"]." - ".$row["nghe_danh"]; ?>

</div>

<div class="row col-10 offset-1">

   
    <!-- Insert to your webpage where you want to display the audio player -->
    <div id="amazingaudioplayer-1" style="display:block;position:relative;width:150%;max-width:500px;height:auto;margin: 5px;">
        <ul class="amazingaudioplayer-audios" style="display:none;">
            <li data-artist="" data-title="<?php echo $row["ten_bai_hat"]." - ".$row["nghe_danh"]; ?> " data-album="" data-info="" data-image="<?php echo $row["hinh_anh"];?>" data-duration="0">
                <div class="amazingaudioplayer-source" data-src="admins/<?php echo $row["duong_dan"];?>" data-type="audio/mpeg" />
            </li>
        </ul>
    </div>
    <!-- End of body section HTML codes -->

</div>

<div class="row">	
	<div class="col-5 offset-1" style="color: #DB0606"><img src="admins/image/trangchu/logo/phanloai.png" style="width: 20px;height: 20px;">Thể Loại:<?php echo "   ".$row["ten_the_loai"];?></div>
		<div class="col-5 offset-1" style="color: #19949F">  <img src="admins/image/trangchu/logo/headphones-50.png" style="width: 30px;height: 30px;">
Lượt nghe: <?php echo $row["luot_nghe"];?></div>
</div>

<div class="row">
	
	<div class="col-11 offset-1" style="color: #4A96AD"><img src="admins/image/trangchu/logo/loibaihat.png" style="width: 25px;height: 25px;">Lời Bài Hát:</div>
		<div class="col-11 offset-1">
		<?php	
$tach = explode("-----", $row["loi_bai_hat"]);
echo nl2br($tach[0]); ?>
<span class="collapse" id="more">  <?php echo nl2br($tach[1]); ?> </span>
<span><a href="#more" data-toggle="collapse" class="SeeMore2">Xem Thêm <i class="fa fa-caret-down"></i>   </a></span>

</div>
</div>
  <?php  }?>
</div>

<?php
}
    ?>
 
 

   
 
