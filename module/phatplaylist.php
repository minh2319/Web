
      <?php //tu dong load file classes/Db.class.php
      $tonghop = new Tonghop();
      $chitietbaihat=new Chitietbaihat();

//khoi tao ban dau
       ?>
       <style>
        #playlist{
            list-style: none;
        }
        #playlist li a{
            color:black;
            text-decoration: none;
        }
        #playlist .current-song a{
            color:blue;
        }
    </style>
    <?php
       if(isset($_GET['mapl']) && !isset($_GET['stt'])) //có mã và chưa có stt
  {
    $mapl=$_GET['mapl'];
     $arr = array(":ma_playlist"=>$mapl);
     $rows=$tonghop->thongtinplaylist($arr);
  }?>
 <div class="col-md-8" >
<?php
  //tang luot nghe
         $arrk = array(":ma_chi_tiet_bh"=>$rows[0]['ma_chi_tiet_bh']);
    $rowsk=$tonghop->thongtinbh($arrk);
  $i=$rowsk[0]['luot_nghe'];
  $i++;
  $arr = array(":ma_chi_tiet_bh"=>$rows[0]['ma_chi_tiet_bh'],":luot_nghe"=>$i);
  $chitietbaihat->luot_nghe($arr);
//luot nghe
 ?>


    <!-- Source Code From YouTube.com/MicroTechTutorials  you may remove this message on your webpage but please do not redistribtue -->
  <div id="ablum" class="row col-md-7 offset-1 " style="position: relative;
        font-size: 20px;
        margin-top: 0;
        font-family: 'Lobster', helvetica, arial;">

  <p style="font-size: 30px;color: #7E8F7C">  <?php echo 'Tên Playlist:'. $rows[0]['ten_playlist']; ?></p> 
  <?php 
  echo $rows[0]["ten_bai_hat"]." - ".$rows[0]["nghe_danh"];
   ?>
</div>

<div class="row">
  <div class="col-11 ">
    <audio src="" controls style="width: 552px;margin-left: 35px;" id="audioPlayer">
        Sorry, your browser doesn't support html5!
    </audio>
    <ul id="playlist" style="margin-right: 30px;">
         <?php   $err = array(":ma_playlist"=>$mapl);
      $exs=$tonghop->thongtinplaylist($err);    
      $k=0;
      //hien list abum
     foreach ($exs as $ex ) { ?> 
        <li class="<?php 
        if($k==0){
          echo 'current-song';
        }
        ?> list-group-item list-group-item-action list-group-item-info">
         <a href="<?php echo 'admins/'.$ex['duong_dan']; ?>" onclick="load_ajax_chon_pl('<?php echo $mapl ?>','<?php echo $k ?>',<?php echo $ex['luot_nghe'];?>);" >  <?php
          $n=$k+1;
                echo $n.'.'.$ex['ten_bai_hat'];
                echo '</a>';
                ?> <p style="color: red;cursor: pointer;display: inline;" onclick="window.location='casyct?macasy=<?php echo $ex['ma_ca_sy'] ?>';" > <?php
                echo ' - '.$ex['nghe_danh'];
                echo '</p>';
                    # code... ?>   
          <img src="admins/image/trangchu/logo/headphones-50.png" style="width: 18px;height: 20px;">
              <?php
              echo ' - ';?> <div style="display: inline;" id="luotnghe<?php echo $k ?>"> <?php echo $ex['luot_nghe'];
              $k++;?></div>
      </li>  
<?php
     }
?>
    </ul>
 </div>
</div>
<div id="result" >
<div class="row"> 
  <div class="col-5 offset-1" style="color: #DB0606"><img src="admins/image/trangchu/logo/phanloai.png" style="width: 30px;height: 30px;">Thể Loại:<?php echo "   ".$rows[0]["the_loai"];?></div>
  </div>

<div class="row">
  <div class="col-11 offset-1" style="color: #4A96AD"><img src="admins/image/trangchu/logo/loibaihat.png" style="width: 25px;height: 25px;">Lời Bài Hát:</div>
    <div class="col-11 offset-1">
    <?php 
$tach = explode("-----", $rows[0]["loi_bai_hat"]);
echo nl2br($tach[0]); ?>
<span class="collapse" id="more">  <?php echo nl2br($tach[1]); ?> </span>
<span><a href="#more" data-toggle="collapse" class="SeeMore2">Xem Thêm <i class="fa fa-caret-down"></i> </a></span>
</div>
</div>


</div>
</div>

<script language="javascript">
  
            function load_ajax_chon_pl(mapl,stt,luotnghe){

             $('#luotnghe'+stt).html(luotnghe+1);
                $.ajax({
                    url : "playlistresult.php?mapl="+ mapl+"&stt="+stt ,
                    type : "get",
                    dataType:"text",
                    success : function (result){
                        $('#result').html(result);
                    }
                });
            }
 </script> <script src="js/jquery-2.2.0.js"></script>

    <script src="audioPlayer.js"></script>
    <script>
        // loads the audio player
        audioPlayer();
    </script>