 <div class="col-md-8" >
 <?php //tu dong load file classes/Db.class.php
   $tonghop = new Tonghop();
  $chitietbaihat=new Chitietbaihat();
  $id=1;

  if(isset($_SESSION['tv_id']))
  {
    $id=$_SESSION['tv_id'];
  }

    
  $playlist= new Playlist();
if(isset($_GET['mabh']))
  {
  	$mabh=$_GET['mabh'];
    $arr = array(":ma_chi_tiet_bh"=>$mabh);
    $rows=$tonghop->thongtinbh($arr);
  
      $arr = array(":ma_thanh_vien"=>$id);
    
  $dsplaylists=$playlist->show_pl($arr);
  ?>
 <?php foreach($rows as $row)
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
 	<?php echo $row["ten_bai_hat"]." - ";
 ?>     <p style="color: red;cursor: pointer;display: inline;" onclick="window.location='casyct?macasy=<?php echo $row['ma_ca_sy'] ?>';" ><?php echo $row['nghe_danh'] ?></p>
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
	<div class="col-7 offset-1" style="color: #DB0606"><img src="admins/image/trangchu/logo/phanloai.png" style="width: 20px;height: 20px;">Thể Loại:<?php echo "   ".$row["ten_the_loai"];?>
<button type="button" class="btn btn-outline-info btn-sm" onclick="showhidea()" style="margin-left: 20px;font-size: 13px;">Thêm vào</button><img src="admins/image/trangchu/playlist/icons8-playlist-50.png" style="width: 40px;height: 40px;">
  </div>
		<div class="col-4 " style="color: #19949F">  <img src="admins/image/trangchu/logo/headphones-50.png" style="width: 30px;height: 30px;">
Lượt nghe: <?php echo $row["luot_nghe"];?>
</div>
</div>
<div class="row" id="dsplaylist" style="display: none;" >
  <div class="col-11 offset-1">
<?php 
  foreach ($dsplaylists as $dsplaylist ) {?>
<div class="row" style="margin-top: 15px;" >
  <div class="col-10">
    <?php echo $dsplaylist['ten_playlist']; ?>

  </div>
<div class="col-2">
  <button type="button" onclick="load_ajax_playlist(<?php echo $dsplaylist['ma_playlist']; ?>,'<?php echo $mabh; ?>')" class="btn btn-primary btn-sm">Thêm</button>
</div>
</div>
  <?php
  } 
?>
  </div>
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
 <script language="javascript">
    function showhidea()
    {
      var div = document.getElementById('dsplaylist');
     if (div.style.display !== "none") 
     {
     div.style.display = "none";
     }
     else {
     div.style.display = "block";
      }
    }

    function load_ajax_playlist(mapl,mabh)
   {
      $.ajax({
          url : "module/thembhplaylist.php?mapl="+mapl+"&mabh="+mabh, // gửi ajax đến file result.php
          type : "post", // chọn phương thức gửi là post
          dataType:"text", // dữ liệu trả về dạng text
          data : { // Danh sách các thuộc tính sẽ gửi đi
               
          },
          success : function (result){
              // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
              // đó vào thẻ div có id = result
             alert("Thêm thành công");
           
          }
      });
    }
 </script>
 

   
 
