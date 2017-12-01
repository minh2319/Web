
 <div class="col-md-8" >
      <?php //tu dong load file classes/Db.class.php
      $tonghop = new Tonghop();
      $ablum=new Ablum();
      $chitietbaihat=new Chitietbaihat();

//khoi tao ban dau
  if(isset($_GET['maab']) && !isset($_GET['stt']))
  {
    $maab=$_GET['maab'];
     $arr = array(":ma_ablum"=>$maab);
     $rows=$tonghop->thongtinablum($arr);
     $i=$rows[0]['luot_nghe'];
     $i++;
    $arr = array(":ma_ablum"=>$maab,":luot_nghe"=>$i);
    $ablum->luot_nghe($arr);
  }

//duyet theo stt
   if(isset($_GET['stt']))
  { $maab=$_GET['maab'];
     $arr = array(":ma_ablum"=>$maab);
     $rows=$tonghop->thongtinablum($arr);
   $stt=$_GET['stt']; 
//tang luot nghe
         $arrk = array(":ma_chi_tiet_bh"=>$rows[$stt]['ma_chi_tiet_bh']);
    $rowsk=$tonghop->thongtinbh($arrk);
  $i=$rowsk[0]['luot_nghe'];
  $i++;
  $arr = array(":ma_chi_tiet_bh"=>$rows[$stt]['ma_chi_tiet_bh'],":luot_nghe"=>$i);
  $chitietbaihat->luot_nghe($arr);
//luot nghe
   ?>

  <div class="row col-md-7 offset-1 " style="position: relative;
        font-size: 20px;
        margin-top: 0;
        font-family: 'Lobster', helvetica, arial;">

  <p style="font-size: 30px;color: #7E8F7C">  <?php echo 'ABLUM:'. $rows[$stt]['ten_ablum']; ?></p> 
  <?php 
  echo $rows[$stt]["ten_bai_hat"]." - ".$rows[$stt]["nghe_danh"];
   ?>
</div>
<div class="row col-10 offset-1">
    <!-- Insert to your webpage where you want to display the audio player -->
    <div id="amazingaudioplayer-1" style="display:block;position:relative;width:150%;max-width:500px;height:auto;margin: 5px;">
        <ul class="amazingaudioplayer-audios" style="display:none;">
            <li data-artist="" data-title="<?php echo $rows[$stt]["ten_bai_hat"]." - ".$rows[$stt]["nghe_danh"]; ?> " data-album="" data-info="" data-image="<?php echo $rows[$stt]["hinh_anh"];?>" data-duration="0">
                <div class="amazingaudioplayer-source" data-src="admins/<?php echo $rows[$stt]["duong_dan"];?>" data-type="audio/mpeg" />
            </li>
        </ul>
    </div>
    <!-- End of body section HTML codes -->
</div>

<div class="row"> 
  <div class="col-5 offset-1" style="color: #DB0606"><img src="admins/image/trangchu/logo/phanloai.png" style="width: 30px;height: 30px;">Thể Loại:<?php echo "   ".$rows[$stt]["ten_the_loai"];?></div>

    <div class="col-5 offset-1" style="color: #19949F"><img src="admins/image/trangchu/logo/headphones-50.png" style="width: 30px;height: 30px;">Lượt nghe: <?php echo $rows[$stt]["luot_nghe"];?></div>
</div>
<div class="row">
  <div class="col-11 offset-1">
    <ul class="list-group">
       <?php   $err = array(":ma_ablum"=>$maab);
      $exs=$tonghop->dsbh($err);    
      $k=0;
     foreach ($exs as $ex ) { ?> 
  <li class="list-group-item list-group-item-action list-group-item-info">
<a href="ablum.php?maab=<?php echo $maab.'&stt='.$k;?>"> <?php
$n=$k+1;
      echo $n.'.'.$ex['ten_bai_hat'];
      echo ' - '.$ex['nghe_danh'];
      $k++;    # code... ?>   
</a>
<img src="admins/image/trangchu/logo/headphones-50.png" style="width: 18px;height: 20px;">
<?php
echo ' - '.$ex['luot_nghe'];
?>
</li>
<?php
     }
?>
</ul> 
 </div>
</div>
<div class="row">
  <div class="col-11 offset-1" style="color: #4A96AD"><img src="admins/image/trangchu/logo/loibaihat.png" style="width: 25px;height: 25px;">Lời Bài Hát:</div>
    <div class="col-11 offset-1">
    <?php 
$tach = explode("-----", $rows[$stt]["loi_bai_hat"]);
echo nl2br($tach[0]); ?>
<span class="collapse" id="more">  <?php echo nl2br($tach[1]); ?> </span>
<span><a href="#more" data-toggle="collapse" class="SeeMore2">Xem Thêm <i class="fa fa-caret-down"></i>   </a></span>
</div>
</div>
  <?php  }
  //duyet theo mac dinh 0
else{ 


  //tang luot nghe
         $arrk = array(":ma_chi_tiet_bh"=>$rows[0]['ma_chi_tiet_bh']);
    $rowsk=$tonghop->thongtinbh($arrk);
  $i=$rowsk[0]['luot_nghe'];
  $i++;
  $arr = array(":ma_chi_tiet_bh"=>$rows[0]['ma_chi_tiet_bh'],":luot_nghe"=>$i);
  $chitietbaihat->luot_nghe($arr);
//luot nghe
 ?>
  <div class="row col-md-7 offset-1 " style="position: relative;
        font-size: 20px;
        margin-top: 0;
        font-family: 'Lobster', helvetica, arial;">

  <p style="font-size: 30px;color: #7E8F7C">  <?php echo 'ABLUM:'. $rows[0]['ten_ablum']; ?></p> 
  <?php 
  echo $rows[0]["ten_bai_hat"]." - ".$rows[0]["nghe_danh"];
   ?>
</div>
<div class="row col-10 offset-1">
    <!-- Insert to your webpage where you want to display the audio player -->
    <div id="amazingaudioplayer-1" style="display:block;position:relative;width:150%;max-width:500px;height:auto;margin: 5px;">
        <ul class="amazingaudioplayer-audios" style="display:none;">
            <li data-artist="" data-title="<?php echo $rows[0]["ten_bai_hat"]." - ".$rows[0]["nghe_danh"]; ?> " data-album="" data-info="" data-image="<?php echo $rows[0]["hinh_anh"];?>" data-duration="0">
                <div class="amazingaudioplayer-source" data-src="admins/<?php echo $rows[0]["duong_dan"];?>" data-type="audio/mpeg" />
            </li>
        </ul>
    </div>
    <!-- End of body section HTML codes -->
</div>

<div class="row"> 
  <div class="col-5 offset-1" style="color: #DB0606"><img src="admins/image/trangchu/logo/phanloai.png" style="width: 30px;height: 30px;">Thể Loại:<?php echo "   ".$rows[0]["ten_the_loai"];?></div>

    <div class="col-5 offset-1" style="color: #19949F"><img src="admins/image/trangchu/logo/headphones-50.png" style="width: 30px;height: 30px;">Lượt nghe: <?php echo $rows[0]["luot_nghe"];?></div>
</div>
<div class="row">
  <div class="col-11 offset-1">
    <ul class="list-group">
       <?php   $err = array(":ma_ablum"=>$maab);
      $exs=$tonghop->dsbh($err);    
      $k=0;
     foreach ($exs as $ex ) { ?> 
  <li class="list-group-item list-group-item-action list-group-item-info">
<a href="ablum.php?maab=<?php echo $maab.'&stt='.$k;?>"> <?php
$n=$k+1;
      echo $n.'.'.$ex['ten_bai_hat'];
      echo ' - '.$ex['nghe_danh'];
      $k++;    # code... ?>   
</a>
<img src="admins/image/trangchu/logo/headphones-50.png" style="width: 18px;height: 20px;">
<?php
echo ' - '.$ex['luot_nghe'];
?>
</li>
<?php
     }
?>
</ul> 
 </div>
</div>
<div class="row">
  <div class="col-11 offset-1" style="color: #4A96AD"><img src="admins/image/trangchu/logo/loibaihat.png" style="width: 25px;height: 25px;">Lời Bài Hát:</div>
    <div class="col-11 offset-1">
    <?php 
$tach = explode("-----", $rows[0]["loi_bai_hat"]);
echo nl2br($tach[0]); ?>
<span class="collapse" id="more">  <?php echo nl2br($tach[1]); ?> </span>
<span><a href="#more" data-toggle="collapse" class="SeeMore2">Xem Thêm <i class="fa fa-caret-down"></i>   </a></span>
</div>
</div>
  <?php  }?>



</div>

 
 

   
 
